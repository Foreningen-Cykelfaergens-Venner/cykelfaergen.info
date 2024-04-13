<?php
    ini_set('session.cookie_domain', '.intastellaraccounts.com');
	session_start([
		'cookie_lifetime' => time() + 83400*360,
		]);
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: GET, POST");
	header("Access-Control-Allow-Headers: Content-Type");
    $mysqli = mysqli_connect("intastellaraccounts.com.mysql", "intastellaraccounts_comuser_accounts_information", "6YZqF23nqpBR4MZBE3GRG", "intastellaraccounts_comuser_accounts_information");

    if(isset($_POST["email"]) && $_POST["email"] !== ""){
		$email = $_POST["email"];
		$result = $mysqli->query("SELECT * FROM users INNER JOIN images ON users.profile_image = images.img LEFT JOIN passkeys ON users.email = passkeys.user WHERE email = '$email' OR recovery_email = '$email'");
	}else if(isset($_COOKIE["c_user"]) && $_COOKIE["c_user"] !== ""){
		$salt = $_COOKIE["c_user"];

		$result = $mysqli->query("SELECT * FROM users INNER JOIN images ON users.profile_image = images.img LEFT JOIN passkeys ON users.email = passkeys.user WHERE salt = '$salt'");
    }else{
        $userid = $_GET["email"];
        $result = $mysqli->query("SELECT * FROM users INNER JOIN images ON users.profile_image = images.img LEFT JOIN passkeys ON users.email = passkeys.user WHERE email = '$userid'");
    }
    $row = $result->fetch_assoc();

    $img = $row['profile_image'];
    $name = $row["first_name"];
    $lname = $row["last_name"];
    $email = $row["email"];
    $passkey = $row["passkey"];

    $name = $name . " " . $lname;
    if(empty($img)){
        $profile = "profile_standard.jpg";
    }else{
        $profile = $email ."/". $row["category"] ."/" .$row["profile_image"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Intastellar Account</title>
	<link rel="stylesheet" href="../../../css/style.css?v=1.1">
    <link rel="apple-touch-icon" sizes="57x57" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.intastellarsolutions.com/assets/icons/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="https://www.intastellarsolutions.com/assets/icons/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.intastellarsolutions.com/assets/icons/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.intastellarsolutions.com/assets/icons/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.intastellarsolutions.com/assets/icons/fav/favicon-16x16.png">
</head>
<body>
<div class="container">
		<div class="form">
			<div id="sl">
				<div class="logo_container">
					<img src="https://www.intastellarsolutions.com/assets/intastellar_solutions.svg" class="logo">
				</div>
				<div class="info_container">
					<div class="title passkey_challenge">
                        <h2>Use your passkey to confirm that it’s really you</h2>
                    </div>
                    <div class="con" id="drpemil" data-ajax="true" data-user="<?= $ciphertext?>">
                        <div class="image">
                            <img src="https://scontent-uc-d2c-7.intastellaraccounts.com/a/s/ul/p/avtr46-img/<?= $profile;?>">
                        </div>
                        <div class="e-mail">
                            <p><?= $name;?> <i class="fas fa-caret-down"></i></p>
                        </div>
                    </div>
                    <img src="https://ssl.gstatic.com/accounts/marc/passkey_challenge.svg" alt="">
                    <p>Your device will ask for your fingerprint, face or screen lock</p>
                    <button class="btn signin-passkey-btn">Continue</button>
                </div>
            </div>
        </div>
</div>
    <script>
    /* console.log(window.atob("<?= $passkey;?>")) */
    if (window.PublicKeyCredential &&  
        PublicKeyCredential.isConditionalMediationAvailable) {  
    // Check if conditional mediation is available.
        document.querySelector(".signin-passkey-btn").addEventListener("click", check)
        async function check(){
            const isCMA = await PublicKeyCredential.isConditionalMediationAvailable();  
            if (isCMA) {  
                // Call WebAuthn authentication
                // To abort a WebAuthn call, instantiate an `AbortController`.  
                const abortController = new AbortController();

                const publicKeyCredentialRequestOptions = {  
                    // Server generated challenge  
                    challenge: new Uint8Array([117, 61, 252, 231, 191, 241]),
                    // The same RP ID as used during registration  
                    rpId: 'intastellaraccounts.com',
                };

                const credential = await navigator.credentials.get({  
                    publicKey: publicKeyCredentialRequestOptions,  
                    signal: abortController.signal,  
                    // Specify 'conditional' to activate conditional UI  
                    userVerification: "required", 
                });

                if(credential.id == "<?= $passkey;?>"){
                    window.location.href = "../passkey-continue?<?= $_SERVER['QUERY_STRING']?>&email=<?= $email;?>";
                }
            } 
        }
    }
</script>
</body>
</html>