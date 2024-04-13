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

            if($response["success"] && isset($_POST['message']) && !empty($_POST['message'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $message_from_user = $_POST['message'];
                $new = explode("\n", $message_from_user);
                $message_from_user = "";
                $phone = "";

                $detection = $_POST["detection"];

                if(!empty($detection)){
                    echo "Nice try bot";
                    return;
                }

                if(isset($phone) && !empty($phone)){
                    $phone = "<p>Telefon: $phone</p>";
                }

                foreach($new as $line){
                    $message_from_user .= "<p>".$line."</p>";
                }
                $message = "
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                font-size: 16px;
                                line-height: 1.6;
                                color: #333;
                                padding: 0;
                                margin: 0;
                            }

                            .header{
                                background-color: #f4f4f4;
                                padding: 20px 10px;
                                text-align: center;
                                display: flex;
                                align-items: center;
                            }
                            
                            .header-heading{
                                margin-left: 20px;
                            }

                            .logo{
                                width: 100px;
                            }

                            .content{
                                padding: 20px;
                            }

                        </style>
                    </head>
                    <body>
                        <header class='header'>
                            <img class='logo' src='https://www.cykelfaergen.info/assets/logo/logo.svg' alt='Cykelfærgen logo'>
                            <h1 class='header-heading'>Automatisk mail fra hjemmesiden</h1>
                        </header>
                        <main class='content'>
                            $message_from_user
                            $phone
                        </main>
                    </body>
                ";
                $subject = "Kontakt fra hjemmesiden: ".$_POST["subject"];
                $to = $_POST["to"];
                $headers = "From: $name <$email>\r\n";
                $headers .= "To: $to\r\n";
                $headers .= "Reply-To: $email\r\n";
                /* $headers .= "bcc: cykelfaergen.info+d77a17e384@invite.trustpilot.com\r\n"; */
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();
                if(mail($to, $subject, $message, $headers)){
                    echo "All files are uploaded successfully!";
                }else{
                    header("HTTP/1.1 401 Mailen kunne ikke sendes");
                }
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