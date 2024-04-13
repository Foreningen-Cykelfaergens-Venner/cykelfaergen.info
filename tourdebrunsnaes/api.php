<?
    $instaCode = $_GET["code"];

    if(isset($_GET["code"])){
        $authUrl = "https://api.instagram.com/oauth/access_token";
        $ch = curl_init($authUrl);

        $params = array(
            'client_id' => "674848530232782",
            "client_secret" => "7c4049a793217e09c1e221c7344cd00d",
            "grant_type" => "authorization_code",
            "redirect_uri" => "https://www.cykelfaergen.info/tourdebrunsnaes/auth.php",
            "code" => $instaCode
        );

        $payload = json_encode( $params );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $msg = curl_exec($ch);
        curl_close($ch);

        $string = json_decode($msg ,true);

        print_r($string);
    }
?>