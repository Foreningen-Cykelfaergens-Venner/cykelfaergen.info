<?php
    ini_set('session.cookie_domain', '.intastellaraccounts.com');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");
	$mysqli = mysqli_connect("intastellaraccounts.com.mysql", "intastellaraccounts_comuser_accounts_information", "6YZqF23nqpBR4MZBE3GRG", "intastellaraccounts_comuser_accounts_information");

    if(isset($_GET["email"]) && $_GET["email"] !=""){
        $email = $_GET["email"];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();

        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['profile_image'] = $row['profile_image'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['active'] = $row['active'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['hash'] = $row['hash'];
        $_SESSION['logged_in'] = 1;
        $_SESSION['2FA'] = $row['2FA'];
        $_SESSION['design'] = $row['design'];
        $_SESSION['costumer_id'] = $row['costumer_id'];

        $profile = $row['profile_image'];
        $name = $row["first_name"];
        $lname = $row["last_name"];
        $email = $row["email"];
        $a = $_GET["continue"];
        $secret = "123";
        $token = array(
            "session" => session_id(),
            "timestamp" => time(),
            "profile" => array(
                "clientID" => $row["id"],
                "email" => $_SESSION["email"],
                "name" => $_SESSION["first_name"] ." ".  $_SESSION["last_name"],
                "image" => "https://scontent-uc-d2c-7.intastellar.com/a/s/ul/p/avtr46-img/". $_SESSION["email"] ."/". $_SESSION["profile_image"],
                "status" => $_SESSION["status"],
                "hash" => $_SESSION["hash"]
            )
        );

        http_response_code(200);
        $jwt = json_encode($token);

        header("Location: auth?". $_SERVER["QUERY_STRING"] . "&identifier=". $_SESSION["email"]);
    }