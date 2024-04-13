<?php
    date_default_timezone_set('Europe/Copenhagen');
    if(isset($_POST)){
        
        $gcapthcaKEY = "6LfG_e8lAAAAAApS7I3Gk1wcet2uPh6tpQpuh1SW";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, [
            "response" => $_POST["g-recaptcha-response"],
            "secret" => $gcapthcaKEY
        ]);
        $response = json_decode(curl_exec($ch), true);
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $email = $_POST["email"];

        if($response["success"] && isset($_POST['quantity']) && !empty($_POST['quantity'])
            && isset($_POST['name']) && !empty($_POST['name']
            && isset($_POST['email']) && !empty($_POST['email']))){
            $to = "Foreningen Cykelfærgen´s Venner <felix.schultz@cykelfaergen.info>";
            $subject = "(Test - Hjemmeside) Ny tilmelding til generalforsamling";

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
                        <h1 class='header-heading'>Generalforsamling tilmelding</h1>
                    </header>
                    <main class='content'>
                        <h1>Ny tilmelding</h1>
                        <p>Der er en ny tilmelding til generalforsamlingen</p>
                        <section>
                            <h2>Tilmelders informationer</h2>
                            <p>Navn: $name</p>
                            <p>Antal personer: $quantity</p>
                            <p>Email: $email</p>
                        </section>
                    </main>
                </body>
            ";

            $headers = "From: $name <$email>\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            $headers2 = "From: Foreningen Cykelfaergens Venner <info@cykelfaergen.dk>\r\n";
            $headers2 .= "Reply-To: info@cykelfaergen.dk \r\n";
            $headers2 .= "MIME-Version: 1.0\r\n";
            $headers2 .= "Content-type: text/html\r\n";
            $headers2 .= "X-Mailer: PHP/" . phpversion();

            $subject2 = "Bekræftelse: Tak for din tilmelding til generalforsamlingen";

            $message2 = "
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
                            padding: 20px 10;
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
                        <h1 class='header-heading'>Generalforsamling tilmelding</h1>
                    </header>
                    <main class='content'>
                        <h1>Tak for din tilmelding</h1>
                        <p>Vi glæder os til at se dig til generalforsamlingen.</p>
                        <p>Vi har sendt dig en mail med detaljerne</p>
                        <section>
                            <h2>Foranstaltnings informationer</h2>
                            <p>Dato: 26 marts 2024</p>
                            <p>Sted: Den Gamle Skole - Egernsund (DGS)</p>
                            <p>Adresse: Sundgade 100, DK - 6320 Egernsund</p>
                            <p>Pris (ikke medlemmer): 100 DKK</p>
                        </section>
                        <p>Vh bestyrelsen</p>
                    </main>
                </body>
            ";

            $recipients = $email;

            if(mail($to, $subject, $message, $headers) && mail($recipients, $subject2, $message2, $headers2)){
                echo "Tak for din tilmelding!";
            }else{
                header("HTTP/1.1 401 Mailen kunne ikke sendes");
            }

        } else {
            header("HTTP/1.1 403 Vi mangler som infos");
        }
        
    }
?>