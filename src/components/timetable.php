<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
		setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));
	}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/"){
		setlocale(LC_TIME, array('de_DE.UTF-8','de_DE@euro','de_DE','german'));
        echo "<script>console.log('de-DE');</script>";
	}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER['HTTP_HOST'] == "www.bicycleferry.com"){
		setlocale(LC_TIME, array('en_GB.UTF-8','en_GB@euro','en_GB','english'));
	}

    
    function createTimetable($route){
        $root = $_SERVER["DOCUMENT_ROOT"]."/src";
        $fbClId = "";
        if(isset($_GET["fbclid"])){
            $fbClId = "&fbclid=" . $_GET["fbclid"];
        }
        require($root. "/db.php");
        $currentDate = date("Y-m-d");
        $bookingLang = "&lang=da-dk";
        if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"]) && isset($_SERVER["HTTP_HOST"]) && $_SERVER['HTTP_HOST'] !== "www.fahrradfaehre.info" && $_SERVER['HTTP_HOST'] !== "www.bicycleferry.com"){
            $bookingLang = "&lang=da-dk";
            $title = "Sejlplan";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" ||  isset($_SERVER["HTTP_HOST"]) && $_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info"){
            $bookingLang = "&lang=de-de";
            $title = "Fahrplan";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" ||  isset($_SERVER["HTTP_HOST"]) && $_SERVER['HTTP_HOST'] == "www.bicycleferry.com"){
            $bookingLang = "&lang=en-en";
            $title = "Timetable";
        }
        /* Getting the route & the stops */
        $sql = "SELECT 
            fs.route_id,
            fn.ferry_name,
            ferry_route.days,
            fs.departure_harbor, 
            fs.arrival_harbor,
            ferry_route.id AS ferryRouteId,
            ferry_route.active_from AS active_from,
            ferry_route.active_to AS active_to,
            ferry_route.name AS routeName,
            departure_harbor.name AS departure_harborName,
            arrival_harbor.name AS arrival_harborName,
            fs.id AS fs_id,
            GROUP_CONCAT(fs.departure_time ORDER BY fs.departure_time SEPARATOR ', ') AS departure_times,
            GROUP_CONCAT(fs.arrival_time ORDER BY fs.arrival_time SEPARATOR ', ') AS arrival_times,
            GROUP_CONCAT(route_active_date.active_from ORDER BY route_active_date.active_from SEPARATOR ', ') AS active_date_from,
            GROUP_CONCAT(route_active_date.active_to ORDER BY route_active_date.active_to SEPARATOR ', ') AS active_date_to,
            price.price_dkk AS price_dkk,
            price.price_euro AS price_euro
        FROM 
            timetable fs
        INNER JOIN
            routes ferry_route ON fs.route_id = ferry_route.id
        INNER JOIN
            ferries fn ON ferry_route.ferry = fn.id
        INNER JOIN
            harbor departure_harbor ON (fs.departure_harbor = departure_harbor.id)
        INNER JOIN
            harbor arrival_harbor ON (fs.arrival_harbor = arrival_harbor.id)
        INNER JOIN 
            route_active_date ON ferry_route.id = route_active_date.route_id
        INNER JOIN
            ticket_prices price ON ferry_route.id = price.route_id
        WHERE
            ferry_route.display_to >= '$currentDate'
        AND
            ferry_route.display_from <= '$currentDate'
        AND
            ferry_route.name = '$route'
        OR
            ferry_route.id = '$route'
        AND
            ferry_route.display_to >= '$currentDate'
        AND
            ferry_route.display_from <= '$currentDate'
        GROUP BY
            fs.departure_harbor, 
            fs.arrival_harbor
        ORDER BY
            departure_times,
            departure_harborName
        DESC";

        $query = mysqli_query($db, $sql);
        $num = mysqli_num_rows($query);

        if($num <= 0){
            
            if($route == "Egernsund - Langballigau"){
                include($root . "/components/forening.php");
            }

            return;
        }
        echo '
        <section class="bg" style="background-image: url('.$root.'/assets/dji_fly_20230225_121352_579_1677777125170_photo_optimized.JPG), linear-gradient(to right, #046c6d, rgba(0,0,0, 0)), linear-gradient(to left, #fff, transparent); background-size: cover; width: 100%; color: #fff; background-blend-mode: screen; background-position: center; padding: 0 15px;">
            <h2 class="timetable-heading">'. $title .'</h2>
        </section>
        ';
        echo "<div class='flex-flip'>";
        echo "<div>";
        while($row = $query->fetch_assoc()){

            $route = $row["ferryRouteId"];
            $id = $row["fs_id"];
            
            $viaSQL = "SELECT DISTINCT *, harbor.name AS harborname FROM `stop` INNER JOIN harbor ON stop.name = harbor.id WHERE `route` = $route ORDER BY stop_order";
            $viaQuery = mysqli_query($db, $viaSQL);
            $viaRoute = [];
            while($viaRow = $viaQuery->fetch_assoc()){
                array_push($viaRoute, $viaRow["harborname"]);
            }

            
            $activeToDate = $row["active_date_to"];
            $activeFromDate = $row["active_date_from"];
            $ferry = $row["ferry_name"];
            $routename = $row["routeName"];
            $activeFrom = $row["active_from"];
            $activeTo = $row["active_to"];

            $departureHarbor = $row["departure_harborName"];
            $departureTime = $row["departure_times"];
            $arrivalHarbor = $row["arrival_harborName"];
            $arrivalTime = $row["arrival_times"];
            $singleDays = $row["days"];

            $depart = $departureHarbor;
            $arrive = $arrivalHarbor;

            echo '<article class="stop flex">';
            echo "<button class='harbor schedule-flex'><span class=''>". mb_convert_encoding($departureHarbor, "utf-8", "HTML-ENTITIES") . "</span><span class='route-line'></span><span style='font-weight: lighter;'>" . mb_convert_encoding($arrivalHarbor, "utf-8", "HTML-ENTITIES") . "</span> <span class='arrow arrowDown'></span></button>";

            $departureTime = explode(",", $departureTime);
            $arrivalTime = explode(",", $arrivalTime);

            /* $times = array_map(null, $departureTime, $arrivalTime); */
            $times = array_combine($departureTime, $arrivalTime);
            $times = array_map("trim",$times);
            $times = array_unique($times);

            echo '<section class="departureTime">';
            echo '<section class="departureTime-container">';
            
            if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info" && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
                $ctaText = "Check ledige pladser";
                $category2 = "Danish";
                echo '
                    <section class="schedule-flex">
                        <p>AFGANG</p>
                        <p>ANKOMST</p>
                    </section>
                ';
                $færgeName = "Færge";
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com"){
                $ctaText = "Check available seats";
                $category2 = "English";
                echo '
                    <section class="schedule-flex">
                        <p>DEPART</p>
                        <p>ARRIVE</p>
                    </section>
                ';
                $færgeName = "Ferry";
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info"){
                $ctaText = "Verfügbare Plätze prüfen";
                $færgeName = "Fähre";
                $category2 = "German";
                echo '
                <section class="schedule-flex">
                    <p>ABFAHRT</p>
                    <p>ANKUNFT</p>
                </section>
            ';
            }
            
            if($singleDays == "daily"){
                $days = array(
                    "Mon",
                    "Tue",
                    "Wed",
                    "Thu",
                    "Fri",
                    "Sat",
                    "Sun"
                );
            }else{
                $days = explode(",", $singleDays);
            }

            foreach($times as $departureTime => $arrivalTime){
                $currentClass = "";
                if(new DateTime() >= new DateTime($activeFrom . " 23:59:59", new DateTimeZone("Europe/Copenhagen"))
                    && new DateTime() <= new DateTime($activeTo . " 23:59:59", new DateTimeZone("Europe/Copenhagen"))){
                    if(strtotime($time[0]) < time()
                        && time() < strtotime($time[1])
                            && in_array(date("D"), $days)){
                        $currentClass = " current";
                    }
                }

                echo "<div class='schedule-time".$currentClass."'>
                        <section>
                            <time>".date("H:i",strtotime($departureTime))."</time>
                        </section>
                        <span class='route-line'></span>
                        <section>
                            <time>". date("H:i",strtotime($arrivalTime)) ."</time>
                        </section>
                    </div>";
            }

            $bookingL = strtolower(substr(str_replace("ø", "o",mb_convert_encoding($departureHarbor, "utf-8", "HTML-ENTITIES")), 0,3));

            $firstDate = explode(",", $activeFromDate)[0];
            if($row["route_id"] == 2){
                $bboking = "sprit";
            }else{
                $bboking = "cyklen";
            }

            $campaign = "Booking".date("Y", strtotime($activeFrom));
            
            if(!isset($_COOKIE["region"]) || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
                $priceNormal = $row["price_dkk"];
                $valuta2 = "DKK";
            }else{
                $priceNormal = $row["price_euro"];
                $valuta2 = "EUR";
            }
            $productName = mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES")."-".mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES");
            ?>
                <a class="cta" href="https://alsturbaade.teambooking.dk/new-booking/0/departure-date?booking=JTdCJTIydGlja2V0cyUyMiUzQSU1QiU3QiU3RCU1RCUyQyUyMmFza0ZvckZsb3clMjIlM0F0cnVlJTdE&flowGroup=<?php echo $bboking.'-'.$bookingL.$bookingLang?>&firstDate=<?php echo $firstDate; ?>&utm_source=Cykelfærgen+Ticket+Prices&utm_medium=cta+timetable&utm_campaign=<?php echo $campaign?>&utm_content=<?php echo str_replace(" ", "+", $ctaText)?><?php echo $fbClId; ?>" rel="noopener nofollow external" target="_blank" class="cta" onclick='gtag("event", "add_to_cart", {
                    "value": <?php echo $priceNormal?>,
                    "currency": "<?php echo $valuta2 ?>",
                    "event_category": "Cykelfærgen - Bookig",
                    "event_label": "<?php echo $ctaText?>",
                    "items": [{
                        "item_id":"SKU_<?php echo $id ?>",
                        "item_name": "<?php echo $productName;?>",
                        "affiliation": "Team Booking - Alsturbåde",
                        "item_brand": "Cykelfærgen",
                        "item_category": "Cykelfærgen - Bookig",
                        "item_category2": "<?php  echo $category2; ?>",
                        "quantity": 1,
                        "price": <?php echo $priceNormal;?>
                    }]
                }),fbq("track","AddToCart", {
                    "content_name": "<?php echo $productName?>",
                    "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                    "content_type": "product",
                    "value": <?php echo $priceNormal;?>,
                    "currency": "<?php echo $valuta2 ?>"
                }),fbq("track","ViewContent", {
                    "content_name": "<?php echo $productName?>",
                    "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                    "content_type": "product",
                    "value": <?php echo $priceNormal;?>,
                    "currency": "<?php echo $valuta2 ?>"
                })'><?php echo $ctaText?></a>
            <?php
            echo "</section>";
            echo "</section>";
            echo '</article>';
        }
        echo "</div>";

        if($singleDays != "daily"){
            if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com" && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
                $type = "Afgang hver";
            }else if($_SERVER['HTTP_HOST'] == "www.bicycleferry.com" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
                $type = "Departure every";
            }else if($_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
                $type = "Abfahrt jeden";
            }


            $daysArray = explode(",",$singleDays);
            $daysArray = array_filter($daysArray);
            $lastWord = array_pop($daysArray);

            $firstDays = $daysArray;
            $newDays = "";
            foreach($firstDays as $types => $day){
                /* echo $day; */
                $newDays .= strftime("%A",strtotime($day)) . ",";
                $newDays = explode(",", $newDays);
                $newDays = implode(", ", $newDays);
            }
            $newDays = substr($newDays, 0, -2);
            $singleDays = $newDays  . " & " . strftime("%A",strtotime($lastWord));

            $singleDays = $type. " " .mb_convert_encoding($singleDays, "utf-8", "HTML-ENTITIES");
        }else{
            if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com" && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
                $singleDays = "Daglig afgang";
            }else if($_SERVER['HTTP_HOST'] == "www.bicycleferry.com" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
                $singleDays = "Daily departures";
            }else if($_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
                $singleDays = "Tägliche abfahrten";
            }
        }

        $viaArray = $viaRoute;
        $viaArray  = array_filter($viaArray);
        $lastVia = array_pop($viaArray);

        $firstDays = $viaArray;
        $newVia = "";
        foreach($firstDays as $types => $day){
            /* echo $day; */
            $newVia .= $day . ",";
            $newVia = explode(",", $newVia);
            $newVia = implode(", ", $newVia);
        }
        if($newVia != ""){
            $newVia = substr($newVia, 0, -2);
            $newVia .= " & ";
        }
        if(!empty($viaRoute)){
            foreach($viaRoute as $via){
                $viaRoute = " <span class='route-line'></span> ". mb_convert_encoding($newVia, "utf-8", "HTML-ENTITIES") . mb_convert_encoding($lastVia, "utf-8", "HTML-ENTITIES") . " <span class='route-line'></span> ";
            }
        }else {
            $viaRoute = " - ";
        }

        echo "<h4 class='ferry'>".$færgeName." ".mb_convert_encoding($ferry, "utf-8", "HTML-ENTITIES")." | ". $singleDays ."</h4>";
        if(!isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] != "www.bicycleferry.com" && $_SERVER["HTTP_HOST"] != "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
            $activeFromDate = explode(",", $activeFromDate);
            $activeToDate = explode(",", $activeToDate);

            $activeDate = array_combine($activeFromDate, $activeToDate);
            $activeDate = array_map("trim",$activeDate);
            $activeDate = array_unique($activeDate);

            echo "<p class='timetable-active'>Gyldig fra";
            echo "<span class='timetable-dates'>";
            foreach($activeDate as $fromDate => $toDate){
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($fromDate)) ."'>". date("d.m Y", strtotime($fromDate)). "</time> - ";
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($toDate)) ."'>". date("d.m Y", strtotime($toDate)). "</time><br>";
            }
            echo "</span>";
            echo "</p>";
            
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER['HTTP_HOST'] == "www.bicycleferry.com"){
            $activeFromDate = explode(",", $activeFromDate);
            $activeToDate = explode(",", $activeToDate);

            $activeDate = array_combine($activeFromDate, $activeToDate);
            $activeDate = array_map("trim",$activeDate);
            $activeDate = array_unique($activeDate);

            echo "<p class='timetable-active'>Valid from";
            echo "<span class='timetable-dates'>";
            foreach($activeDate as $fromDate => $toDate){
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($fromDate)) ."'>". date("d.m Y", strtotime($fromDate)). "</time> - ";
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($toDate)) ."'>". date("d.m Y", strtotime($toDate)). "</time><br>";
            }
            echo "</span>";
            echo "</p>";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info") {
            $activeFromDate = explode(",", $activeFromDate);
            $activeToDate = explode(",", $activeToDate);

            $activeDate = array_combine($activeFromDate, $activeToDate);
            $activeDate = array_map("trim",$activeDate);
            $activeDate = array_unique($activeDate);

            echo "<p class='timetable-active'>Gültig ab";
            echo "<span class='timetable-dates'>";
            foreach($activeDate as $fromDate => $toDate){
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($fromDate)) ."'>". date("d.m Y", strtotime($fromDate)). "</time> - ";
                echo "<time datetime='". date("Y-m-d H:i:s", strtotime($toDate)) ."'>". date("d.m Y", strtotime($toDate)). "</time><br>";
            }
            echo "</span>";
            echo "</p>";
        }
        echo "<h3 class='route' id='".str_replace("-", "",str_replace(" ", "",$routename))."'>".explode("-",mb_convert_encoding($routename, "utf-8", "HTML-ENTITIES"))[0]. $viaRoute . explode("-",mb_convert_encoding($routename, "utf-8", "HTML-ENTITIES"))[1] ."</h3>";
        echo "</div>";
    }
?>