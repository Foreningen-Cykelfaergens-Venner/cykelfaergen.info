<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    function tickets($db){
        $fbClId = "";
        if(isset($_GET["fbclid"])){
            $fbClId = "&fbclid=" . $_GET["fbclid"];
        }
        $productToTrack = [];
        $sql = "SELECT 
            *,
            GROUP_CONCAT(price.price_dkk SEPARATOR ', ') AS DKK,
            GROUP_CONCAT(price.price_euro SEPARATOR ', ') AS EURO,
            GROUP_CONCAT(priceType.DKK SEPARATOR ', ') AS TYPE_DKK_PRICE,
            GROUP_CONCAT(priceType.EURO SEPARATOR ', ') AS TYPE_EURO_PRICE,
            GROUP_CONCAT(priceType.type_name SEPARATOR ', ') AS TYPE_NAME,
            GROUP_CONCAT(priceType.language SEPARATOR ', ') AS TYPE_LANGUAGE,
            departure_harbor.name AS departure_harborName,
            arrival_harbor.name AS arrival_harborName,
            ticket.popular AS popular
        FROM 
            tickets ticket
        CROSS JOIN
            ticket_priceType priceType
        INNER JOIN 
            ticket_prices price ON ticket.ticket_id = price.route_id
        INNER JOIN
            harbor departure_harbor ON ticket.depart = departure_harbor.id
        INNER JOIN
            harbor arrival_harbor ON ticket.arrive = arrival_harbor.id
        GROUP BY
            price.route_id
        ORDER BY
            ticket.popular DESC,
            price.price_dkk DESC,
            price.price_euro DESC
        ";

        $query = mysqli_query($db, $sql);
        $num = mysqli_num_rows($query);
        if($num <= 0){
            return;
        }

        $i = 0;
        while($row = $query->fetch_assoc()){
            $depart = $row["departure_harborName"];
            $arrive = $row["arrival_harborName"];

            $priceDKK = $row["DKK"];
            $priceEURO = $row["EURO"];
            $id = $row["ticket_id"];
            

            $TYPE_DKK_PRICE = $row["TYPE_DKK_PRICE"];
            $TYPE_EURO_PRICE = $row["TYPE_EURO_PRICE"];;

            $DKK = explode(",", $priceDKK);
            $EURO = explode(",", $priceEURO);

            $TYPE_DKK_PRICE = explode(",", $TYPE_DKK_PRICE);
            $TYPE_EURO_PRICE = explode(",", $TYPE_EURO_PRICE);

            $TYPE_NAME = explode(",", $row["TYPE_NAME"]);
            $TYPE_LANGUAGE = explode("," , $row["TYPE_LANGUAGE"]);

            if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info" && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com"){
                $bookingLang = "&lang=da-dk";
                $category2 = "Danish";
                $ctaText = "Køb billet";
                $ctaText2 = "Køb billet";
                $or = " eller ";
                $from = "Afgang";
                $trackingValuta = "DKK";
                $popular = $row["popular"] == 1 ? "<p class='highlight --popular'>Populær</p>" : (!empty($row["special"]) ? "<p class='highlight --special'>". mb_convert_encoding($row["special"], "utf-8", "HTML-ENTITIES") ."</p>" : "<p></p>");
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" ||  isset($_SERVER["HTTP_HOST"]) && $_SERVER['HTTP_HOST'] == "www.fahrradfaehre.info"){
                $ctaText = "Tickets kaufen";
                $ctaText2 = "Tickets kaufen";
                $bookingLang = "&lang=de-de";
                $category2 = "German";
                $or = " oder ";
                $from = "Abfahrt";
                $trackingValuta = "EUR";
                $popular = $row["popular"] == 1 ? "<p class='highlight --popular'>Populär</p>" : (!empty($row["special"]) ? "<p class='highlight --special'>". mb_convert_encoding($row["special"], "utf-8", "HTML-ENTITIES") ."</p>" : "<p></p>");
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" ||  $_SERVER["HTTP_HOST"] == "www.bicycleferry.com"){
                $bookingLang = "&lang=en-en";
                $category2 = "English";
                $ctaText = "Buy ticket";
                $ctaText2 = "Buy ticket";
                $from = "Departure";
                $or = " or ";
                $trackingValuta = "EUR";
                $popular = ($row["popular"] == 1) ? "<p class='highlight --popular'>Popular</p>" : (!empty($row["special"]) ? "<p class='highlight --special'>". mb_convert_encoding($row["special"], "utf-8", "HTML-ENTITIES") ."</p>" : "<p></p>");
            }

            $prices = array_map(NULL, $DKK, $EURO, $TYPE_DKK_PRICE, $TYPE_EURO_PRICE, $TYPE_NAME, $TYPE_LANGUAGE);
            $productName1 = mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES")."-".mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES");
            $productName2 = mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES")."-".mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES");
            echo '<article class="ticket">
                <section class="ticket_content">
                    '. $popular .'
                    <h2 class="ticket__destination from">
                        '.mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES").' - '.mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES").' <br>'. $or .'<br>
                        '.mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES").' - '.mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES").'
                    </h2>
            ';
            
            foreach($prices as $ticket){
                $TICKET_EURO = "<small>&#8364;</small> ".$ticket[1];
                $TICKET_DKK = "<small>kr.</small> ".$ticket[0];

                $ticketPriceDKK = $TICKET_DKK;
                $ticketPriceEURO = $TICKET_EURO;
                $euroPrice = $ticket[1];
                $dkk = $ticket[0];
                
                if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info"
                || $_SERVER['HTTP_HOST'] != "www.bicycleferry.com"
                || $_COOKIE["region"] == "da-DK"){
                    $ticketPrice = $ticketPriceDKK;
                    $ticketPriceWithout = $dkk;
                }else{
                    $ticketPrice = $ticketPriceEURO;
                    $ticketPriceWithout = $euroPrice;
                }
                
                $sql2 = "SELECT * FROM ticket_priceType";
                if(
                    !isset($_COOKIE["region"])
                    && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info"
                    && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com"
                    || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"
                ){
                    $ticketPrice = $ticketPriceDKK;
                    $sql2 .= " WHERE language = 'DK'";
                    $extraInfo = "max 2 pr tur";
                    if($row["ticket_id"] == 3 || $row["ticket_id"] == 4 || $row["ticket_id"] == 6){
                        $extraInfo = "kun hvis plads";
                    }
                    
                    
                }else{
                    if(
                        isset($_COOKIE["region"])
                        && $_COOKIE["region"] == "en-GB"
                        || !isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] == "www.bicycleferry.com"
                    ){
                        
                        $extraInfo = "max 2 pr tour";
                        $sql2 .= " WHERE language = 'ENG'";

                        if($row["ticket_id"] == 3 || $row["ticket_id"] == 4 || $row["ticket_id"] == 6){
                            $extraInfo = "If free space";
                        }
                        

                    }else{
                        
                        $extraInfo = "max 2 pro Tour";
                        $sql2 .= " WHERE language = 'DE'";

                        if($row["ticket_id"] == 3 || $row["ticket_id"] == 4 || $row["ticket_id"] == 6){
                            $extraInfo = "Wenn platz frei ist";
                        }
                        

                    }
                    $ticketPrice = $ticketPriceEURO;
                    $ticketPriceWithout = $euroPrice;
                }
                $campaign = "Booking2024";
                $bookingL = strtolower(substr(str_replace("ø", "o",mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES")), 0,3));
                $bookingL2 = strtolower(substr(str_replace("ø", "o",mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES")), 0,3));

                if(mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES") == "Sønderhav" || $arrive == "Flensburg"){
                    $bboking = "sprit";
                    $firstDate = "2024-06-28";
                }else{
                    $bboking = "cyklen";
                    $firstDate = "2024-05-18";
                }


                $query1 = mysqli_query($db, $sql2);
                echo "<ul>";
                echo '<li class="ticket_price">
                            '. $ticketPrice .'
                            <button class="cta" onClick="document.querySelectorAll(\'.ticket-cta\')['.$i.'].classList.toggle(\'active\')">
                                '.$ctaText.'
                            </button>
                       </li>';
                while($row1 = $query1->fetch_assoc()){
                    if(!isset($_COOKIE["region"]) && $_SERVER['HTTP_HOST'] != "www.fahrradfaehre.info"
                        && $_SERVER['HTTP_HOST'] != "www.bicycleferry.com"
                        || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"
                    ){
                        $price =  "<small>kr.</small>" .$row1["DKK"];
                    }else{
                        $price =  "<small>&#8364;</small> " . $row1["EURO"]. ",00";
                    }

                   
                    if($row1["id"] == 3 || $row1["id"] == 6 || $row1["id"] == 6){
                        $extraInfo1 = " (".$extraInfo.")";
                    }else{
                        $extraInfo1 = "";
                    }

                    echo "<li><span class='bold'>".mb_convert_encoding($row1["type_name"], "utf-8", "HTML-ENTITIES") . "</span> " . $price . "".$extraInfo1."</li>";
                }
                break;
            }
            ?>
                    <div class="ticket-cta">
                        <a class="cta" href="https://alsturbaade.teambooking.dk/new-booking/0/departure-date?booking=JTdCJTIydGlja2V0cyUyMiUzQSU1QiU3QiU3RCU1RCUyQyUyMmFza0ZvckZsb3clMjIlM0F0cnVlJTdE&flowGroup=<?php echo $bboking.'-'.$bookingL.$bookingLang?>&firstDate=<?php echo $firstDate; ?>&utm_source=Cykelfærgen+Ticket+Prices&utm_medium=cta+timetable&utm_campaign=<?php echo $campaign?>&utm_content=<?php echo str_replace(" ", "+", $ctaText)?><?php echo $fbClId; ?>" rel="noopener nofollow external" target="_blank" class="cta" onclick='gtag("event", "add_to_cart", {
                            "value": <?php echo $ticketPriceWithout?>,
                            "currency": "<?php echo $trackingValuta ?>",
                            "event_category": "Cykelfærgen - Bookig",
                            "event_label": "<?php echo $ctaText?>",
                            "items": [{
                                "affiliation": "Team Booking - Alsturbåde",
                                "item_id":"SKU_<?php echo $id ?>",
                                "item_name": "<?php echo $productName1?>",
                                "item_brand": "Cykelfærgen",
                                "item_category": "Cykelfærgen - Bookig",
                                "item_category2": "<?php echo $productName1?>",
                                "item_category3": "<?php  echo $category2; ?>",
                                "item_category4": "<?php echo $productName1?>",
                                "item_list_id": "price_list",
                                "item_list_name": "Price List",
                                "quantity": 1,
                                "price": <?php echo $ticketPriceWithout;?>
                            }]
                        }),fbq("track","AddToCart", {
                            "content_name": "<?php echo $productName1?>",
                            "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                            "content_type": "product",
                            "value": <?php echo $ticketPriceWithout;?>,
                            "currency": "<?php echo $trackingValuta ?>"
                        }),fbq("track","ViewContent", {
                        "content_name": "<?php echo $productName2?>",
                        "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                        "content_type": "product",
                        "value": <?php echo $ticketPriceWithout;?>,
                        "currency": "<?php echo $trackingValuta ?>"
                    })'><?php echo $from; ?> <?php echo mb_convert_encoding($depart, "utf-8", "HTML-ENTITIES"); ?></a>
                        <a class="cta" href="https://alsturbaade.teambooking.dk/new-booking/0/departure-date?booking=JTdCJTIydGlja2V0cyUyMiUzQSU1QiU3QiU3RCU1RCUyQyUyMmFza0ZvckZsb3clMjIlM0F0cnVlJTdE&flowGroup=<?php echo $bboking.'-'.$bookingL2.$bookingLang?>&firstDate=<?php echo $firstDate; ?>&utm_source=Cykelfærgen+Ticket+Prices&utm_medium=cta+timetable&utm_campaign=<?php echo $campaign?>&utm_content=<?php echo str_replace(" ", "+", $ctaText)?><?php echo $fbClId; ?>" rel="noopener nofollow external" target="_blank" class="cta" onclick='gtag("event", "add_to_cart", {
                            "value": <?php echo $ticketPriceWithout?>,
                            "currency": "<?php echo $trackingValuta ?>",
                            "event_category": "Cykelfærgen - Bookig",
                            "event_label": "<?php echo $ctaText2?>",
                            "items": [{
                                "item_id":"SKU_<?php echo $id ?>",
                                "item_name": "<?php echo $productName2?>",
                                "affiliation": "Team Booking - Alsturbåde",
                                "item_brand": "Cykelfærgen",
                                "item_category": "Cykelfærgen - Bookig",
                                "item_category2": "<?php  echo $category2; ?>",
                                "item_list_id": "price_list",
                                "item_list_name": "Price List",
                                "quantity": 1,
                                "price": <?php echo $ticketPriceWithout;?>
                            }]
                        }),fbq("track","AddToCart", {
                            "content_name": "<?php echo $productName2;?>",
                            "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                            "content_type": "product",
                            "value": <?php echo $ticketPriceWithout;?>,
                            "currency": "<?php echo $trackingValuta ?>"
                        }),fbq("track","ViewContent", {
                        "content_name": "<?php echo $productName2?>",
                        "content_category": "Cykelfærgen - Bookig > <?php  echo $category2; ?>",
                        "content_type": "product",
                        "value": <?php echo $ticketPriceWithout;?>,
                        "currency": "<?php echo $trackingValuta ?>"
                    })'><?php echo $from; ?> <?php echo mb_convert_encoding($arrive, "utf-8", "HTML-ENTITIES"); ?></a>
                    </div>
            <?
            echo "</ul>";
            echo '</section>';
            echo '</article>';
            $i++;
        }
    }
?>