<?php
    function findFerryRoute($db, $afgang, $ankomst){
        $sql = "SELECT 
            fs.route_id,
            fn.ferry_name,
            fs.days,
            fs.departure_harbor, 
            fs.arrival_harbor,
            ferry_route.name AS routeName,
            GROUP_CONCAT(fs.departure_time ORDER BY fs.departure_time SEPARATOR ', ') AS departure_times,
            GROUP_CONCAT(fs.arrival_time ORDER BY fs.arrival_time SEPARATOR ', ') AS arrival_times
        FROM 
            timetable fs
        INNER JOIN
            routes ferry_route ON fs.route_id = ferry_route.id
        INNER JOIN
            ferries fn ON ferry_route.ferry = fn.id
        WHERE 
            fs.departure_harbor LIKE ${$afgang} AND fs.arrival LIKE ${$ankomst} OR fs.departure_harbor LIKE ${$ankomst} AND fs.arrival LIKE ${$afgang} AND ferry_route.active = 1
        GROUP BY
            fs.departure_harbor, 
            fs.arrival_harbor
        ORDER BY fs.departure_time, fs.departure_harbor DESC";

        $query = mysqli_query($db, $sql);
        $num = mysqli_num_rows($query);
        if($num <= 0){
            return;
        }

        echo "<div class='flex-flip'>";
        echo "<div>";
        while($row = $query->fetch_assoc()){

            $routename = $row["routeName"];
            $ferry = $row["ferry_name"];

            $departureHarbor = $row["departure_harbor"];
            $departureTime = $row["departure_times"];
            $arrivalHarbor = $row["arrival_harbor"];
            $arrivalTime = $row["arrival_times"];
            $days = $row["days"];

            echo '<article class="stop flex">';
            echo "<h4 class='harbor schedule-flex'>". mb_convert_encoding($departureHarbor, "utf-8", "HTML-ENTITIES") . "<span class='route-line'></span><span style='font-weight: lighter;'>" . mb_convert_encoding($arrivalHarbor, "utf-8", "HTML-ENTITIES") . "</span> <span class='arrow arrowDown'></span></h4>";

            $departureTime = explode(",", $departureTime);
            $arrivalTime = explode(",", $arrivalTime);

            $times = array_map(NULL, $departureTime, $arrivalTime);
            echo '<section class="departureTime">';
            
            if(!isset($_COOKIE["region"]) || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
                echo '
                    <section class="schedule-flex">
                        <p>AFGANG</p>
                        <p>ANKOMST</p>
                    </section>
                ';
                $færgeName = "Færge";
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
                echo '
                    <section class="schedule-flex">
                        <p>DEPART</p>
                        <p>ARRIVE</p>
                    </section>
                ';
                $færgeName = "Fähre";
            }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
                $færgeName = "Fähre";
                echo '
                <section class="schedule-flex">
                    <p>ABFAHRT</p>
                    <p>ANKUNFT</p>
                </section>
            ';
            }
            
            if($days == "daily"){
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
                $days = explode(",", $days);
            }


            foreach($times as $time){

                if(strtotime($time[0]) < time() && time() < strtotime($time[1]) && in_array(date("D"), $days)){
                    $currentClass = " current";
                    $openClass = " show";
                }else{
                    $currentClass = "";
                    $openClass = "";
                }
                $departureTime = $time[0];
                $arrivalTime = $time[1];
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
            echo "</section>";
            echo '</article>';
        }
        echo "</div>";
        echo "<h4 class='ferry'>".$færgeName." ".mb_convert_encoding($ferry, "utf-8", "HTML-ENTITIES")."</h4>";
        echo "<h3 class='route' id='".str_replace("-", "",str_replace(" ", "",$routename))."'>".mb_convert_encoding($routename, "utf-8", "HTML-ENTITIES")."</h3>";
        echo "</div>";
    }
?>