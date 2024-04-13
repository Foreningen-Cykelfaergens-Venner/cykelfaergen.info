<?php
    $gcapthcaKEY = "6LfG_e8lAAAAAApS7I3Gk1wcet2uPh6tpQpuh1SW";
    if(isset($_POST)){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, [
            "response" => $_POST["g-recaptcha-response"],
            "secret" => $gcapthcaKEY
        ]);
        $response = json_decode(curl_exec($ch), true);

        if($response["success"]){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $files = $_FILES["file"];
            $subject = $_POST["subject"];

            

        }else{
            $httpStatusCode = 900;
            $httpStatusMsg  = $response["error-codes"][0];
            $phpSapiName    = substr(php_sapi_name(), 0, 3);
            if ($phpSapiName == 'cgi' || $phpSapiName == 'fpm') {
                header('Status: '.$httpStatusCode.' '.$httpStatusMsg);
            } else {
                $protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
                header($protocol.' '.$httpStatusCode.' '.$httpStatusMsg);
            }
        }
    }else{
        header("HTTP/1.1 403 Vi mangler som infos");
    }