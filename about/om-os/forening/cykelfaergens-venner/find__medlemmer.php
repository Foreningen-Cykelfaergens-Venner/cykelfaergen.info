<?
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    $server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);

    if(!$db){
        echo "Not Connect!";
        die();
    }

    if(isset($_POST["email"])){
        $email = mysqli_escape_string($db, base64_encode($_POST["email"]));

        $sql = "SELECT * FROM medlemmer WHERE email = '$email'";

        $query = mysqli_query($db, $sql);
        $num = mysqli_num_rows($query);

        if($num == 1){
            while($row = $query->fetch_assoc()){
                echo json_encode([
                    "exists" => true,
                    "name" => $row["name"],
                    "stripeCustomerId" => $row["stripe__id"],
                    "cardId" => $row["card_id"],
                    "subscriptionID" => $row["stripe_subs_id"]
                ]);
            };
        }else{
            echo json_encode([
                "exists" => false,
            ]);
        }
    }
?>