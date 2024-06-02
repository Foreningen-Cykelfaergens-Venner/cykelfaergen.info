<?php
    include_once("db.php");
    $q = mysqli_escape_string($db, $_GET["q"]);
    $arrive = mysqli_escape_string($db, $_GET["a"]);
    $time = mysqli_escape_string($db, $_GET["t"] . ":00");

    $sql = "SELECT 
        fs.route_id,
        fs.days,
        ferry_route.name AS routeName,
        fn.ferry_name,
        fs.departure_harbor, 
        fs.arrival_harbor, 
        GROUP_CONCAT(fs.departure_time ORDER BY fs.departure_time SEPARATOR ', ') AS departure_times,
        GROUP_CONCAT(fs.arrival_time ORDER BY fs.arrival_time SEPARATOR ', ') AS arrival_times
    FROM 
        timetable fs
    INNER JOIN
        routes ferry_route ON fs.route_id = ferry_route.id
    INNER JOIN
        ferries fn ON ferry_route.ferry = fn.id
    WHERE
        fs.departure_harbor LIKE '${$q}' 
        OR fs.arrival_harbor LIKE '${$arrive}' 
        AND fs.departure_time LIKE '${$time}' 
        OR fs.arrival_time LIKE '${$time}'
    GROUP BY
        fs.departure_harbor, 
        fs.arrival_harbor
    ORDER BY fs.departure_time, fs.departure_harbor DESC";

    $searchQuery = mysqli_query($db, $sql);
    $num = mysqli_num_rows($searchQuery);

    echo $num;

    if($num <= 0){
        return;
    }
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    /* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <section class="content">
        <form action="search" method="get">
            <label for="">Fra:</label>
            <input type="search" name="q" placeholder="Start" value="<?php echo mysqli_escape_string($db, $_GET["q"]);?>">
            <label for="">Til:</label>
            <input type="search" name="a" placeholder="Slut" value="<?php echo mysqli_escape_string($db, $_GET["a"]);?>">
            <label for="">Kl.</label>
            <input type="time" name="t" value="<?php echo mysqli_escape_string($db, $_GET["t"]);?>">
            <button type="submit">Search</button>
        </form>
        <p>We found: <?php echo $num;?> results</p>
        <?php
            while($row = $searchQuery->fetch_assoc()){
                $departureHarbor = $row["departure_harbor"];
                $departureTime = $row["departure_times"];
                $arrivalHarbor = $row["arrival_harbor"];
                $arrivalTime = $row["arrival_times"];
                $days = $row["days"];
                $ferry = $row["ferry_name"];
        
                $departureTime = explode(",", $departureTime);
                $arrivalTime = explode(",", $arrivalTime);
                $days = explode(",", $days);
        
                $times = array_map(NULL, $departureTime, $arrivalTime);
                foreach($times as $time){
                    $departureTime = $time[0];
                    $arrivalTime = $time[1];
                    if(strtotime($time[0]) <> time() && time() < strtotime($time[1]) && in_array(date("D"), $days)){
                        $currentClass = " current";
                    }else{
                        $currentClass = "";
                    }
        
                    echo "
                        <p>".$ferry."</p>
                        <h2>".$departureHarbor."<span class='route-line'></span>".$arrivalHarbor."</h2>
                        <div class='schedule-time".$currentClass."'>
                            <section>
                                <time>".date("H:i",strtotime($departureTime))."</time>
                            </section>
                            <span class='route-line'></span>
                            <section>
                                <time>". date("H:i",strtotime($arrivalTime)) ."</time>
                            </section>
                        </div>
                    ";
                }
            }
        ?>
    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/language/dk-DK/footer.php");
include("scripts/script.php");
?>
