<?
    header("Access-Control-Allow-Origin", "*");
    header("Access-Control-Allow-Credentials", "true");
    header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
    /* ini_set('display_errors', 1);
    error_reporting(E_ALL); */
    
    require($_SERVER["DOCUMENT_ROOT"]. "/db.php");

    $incoming = json_decode(file_get_contents("php://input"));
    $data = json_decode(json_encode($incoming), True);
    $harbor = $data["harbor"];

    $from = $harbor["from"]["id"];
    $to = $harbor["to"]["id"];

    $cycle = +$data["bicycle"]["trueFalse"];
    $cycleType = $data["bicycle"]["type"];
    $passangerCount = (int)$data["passangerCount"];

    $orderPassengerCount = (int)$data["passangerCount"];

    $time = $data["orderDateTime"];
    $timeq = date("Y-m-d H:i:s", strtotime($time));

    $cycleTypeFE = "Cykel";

    if($cycleType == "cycleWithThreeWheel"){
        $cycleTypeFE = "Cykel med 3 hjul";
    } else if($cycleType == "cycleWithTrailer"){
        $cycleTypeFE = "Cykel med Trailer";
    }

    $sql = "SELECT * FROM bookings WHERE fromHarborId = $from AND toHarborId = $to AND departure = '$timeq'";

    $query = mysqli_query($db, $sql);

    $num = mysqli_num_rows($query);
    
    if($num == 0){
        while($row = $query->fetch_assoc()){
            $toHarbor = utf8_encode($row["toHarbor"]);
            $fromHarbor = utf8_encode($row["fromHarbor"]);
            $cycle = $row["cycle"];
            $dep = $row["departure"];
            
            $passangerCount += (int)$row["passenger"];

            /* echo $passangerCount; */
        }
        $price = 100;
        if($cycle){
            $price = $price + 20;
        }
        $price = $price * $orderPassengerCount;
        $orderResults = [];
        if($passangerCount <= 12){
            array_push($orderResults, json_encode(array(
                "toharbor" => [
                    "id" =>  $to,
                    "harborName" => $harbor["to"]["harbor"],
                    "long" => "",
                    "lat" => ""
                ],
                "fromharbor" => [
                    "id" =>  $from,
                    "harborName" => $harbor["from"]["harbor"],
                    "long" => "",
                    "lat" => ""
                ],
                "bicycle" => [
                    "yesNo" => $cycle,
                    "type" => $cycleTypeFE
                ],
                "dep" => $time,
                "passangerCount" => $passangerCount,
                "price" => $price
            )));

            echo json_encode($orderResults);
        }else{
            echo json_encode("No results") + $passangerCount;
        }
    }else{
        echo json_encode("No results");
    }




?>