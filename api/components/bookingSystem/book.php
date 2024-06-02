<?php
session_start();
?>
<?php
// Captcha
/* if(empty($_SESSION['captcha'] ) ||
	strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0)
	{
		//Note: the captcha code is compared case insensitively.
		//if you want case sensitive match, update the check above to
		// strcmp()
		$errors = "<font color=\"red\">Wrong code!</font>";
		echo $errors;
	} */
	
	if(empty($errors))
	{
		include 'config.php';
		
		// Create connection
		$conn = mysqli_connect($server, $user, $password,$database);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$start_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
		$start_time = (60*60*intval(htmlspecialchars($_POST["start_hour"]))) + (60*intval(htmlspecialchars($_POST["start_minute"])));
		$end_time = (60*60*intval(htmlspecialchars($_POST["end_hour"]))) + (60*intval(htmlspecialchars($_POST["end_minute"])));
		$name = htmlspecialchars($_POST["fullname"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$email = htmlspecialchars($_POST["email"]);
		$item = htmlspecialchars($_POST["item"]);
		$count = htmlspecialchars($_POST["count"]);
		
		$start_epoch = $start_day + $start_time;
		$end_epoch = $start_day + $end_time;
		
		// prevent double booking
		$sql = "SELECT * FROM $tablename WHERE item='$item' AND (start_day>=$start_day) AND canceled=0";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// handle every row
			while($row = mysqli_fetch_assoc($result)) {
				// check overlapping at 10 minutes interval
				for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
					if ($i>($row["start_day"]+$row["start_time"]) && $i<($row["start_day"]+$row["end_time"])) {
						echo 'Unfortunately ' . $item . ' has already been booked for the time requested.';
						goto end;
					}
				}
			}				
		}
				
		$sql = "INSERT INTO $tablename (name, phone, email, item, item__count, start_day, start_time, end_time, canceled)
			VALUES ('$name','$phone', '$email', '$item', '$count', $start_day, $start_time, $end_time, 0)";

		$msg = "<h2>Kære ".$name.",</h2>".
		"<p>vi kvitere hermed dit event sejlads</p>
		<p class='date'>".
		date("l", strtotime(htmlspecialchars($_POST["start_day"]))) . " " .date("d. M Y", strtotime(htmlspecialchars($_POST["start_day"]))) . " kl." . htmlspecialchars($_POST["start_hour"]). "</p>".
		"<p>Vil du anullerer din booking? Så skriv os en mail på booking@cykelfaergen.info med dit bookings dato og navn. Så tager vi os af den.</p>
		<p>Vi sender til dig inden for de næste 5 arbejdsdage en bekræftelses mail, med potentil flere informationer.</p>";

		$body = "--".$separator.$eol;
		$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$separator = md5(time());
		$boundary=md5(uniqid(rand()));;
		// carriage return type (we use a PHP end of line constant)
		$eol = PHP_EOL;
		$to = $email;
		$to2 = "booking@cykelfaergen.info";

		$from = 'Cykelfærgen Flensborg Fjord <booking@cykelfaergen.info>';
		$subject = "Vi kvitere hermed din booking!";
		$subject2 = "NY BOOKING: ". $item;
		$logo = "https://www.cykelfaergen.info/assets/logo/logo.svg";

		$message2 = "<html>
			<head>
				<style>
					.header{
						border-top: 2px solid rgba(0, 35, 104, 1);
						padding: 15px;
						background: #ebebeb;
					}

					.content{
						background: #fff;
					}

					img{
						max-width: 100%;
					}

					.logo{
						width: 20%;
						padding: 10px;
						text-align: center;
					}

					.logo img{
						width: 50%;
					}

					.btn{
						width: max-content;
						padding: 15px 30px;
						background: rgba(0, 51, 153, 1);
						color: #fff;
						margin: 15px auto;
						text-decoration: none;
						font-size: 14px;
					}
				</style>
			</head>
			<body>
				<header class='header'>
					<div class='logo'>
						<img src='".$logo."'>
					</div>
				</header>
				<div class='content'>
					<h2>Ny booking: ".$item.":</h2>
					<p>Navn: ".$name."<br>
					E-Mail: ".$email."<br>
					Tel: ".$phone."<br>
					Dato: ".date("l", strtotime(htmlspecialchars($_POST["start_day"]))) . " " .date("d.M Y", strtotime(htmlspecialchars($_POST["start_day"]))) . " kl. " . htmlspecialchars($_POST["start_hour"])."</p>
					<a class='btn' href='https://www.cykelfaergen.info/privat/frivillige/online-bookinger'>Overblik</a>
				</div>
			</body>
		</html>";

		$message = "<html>
			<head>
				<style>
					.header{
						border-top: 2px solid rgba(0, 35, 104, 1);
						padding: 15px;
						background: #ebebeb;
					}

					.content{
						background: #fff;
					}

					img{
						max-width: 100%;
					}

					.logo{
						width: 20%;
						padding: 10px;
						text-align: center;
					}

					.logo img{
						width: 50%;
					}

					.btn{
						width: max-content;
						padding: 15px 30px;
						background: rgba(0, 51, 153, 1);
						color: #fff;
						margin: 15px auto;
						text-decoration: none;
						font-size: 14px;
					}

					.date{
						font-size: 30px;
						width: max-content;
						margin: auto;
					}
				</style>
			</head>
			<body>
				<header class='header'>
					<div class='logo'>
						<img src='".$logo."'>
					</div>
				</header>
				<div class='content'>
					".$msg."
				</div>
			</body>
		</html>";

		$headers  = "From: ".$from.$eol;
		/* $headers .= "Bcc: intastellarsolutions.com+f48069b26f@invite.trustpilot.com\r\n"; */
		$headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=\"UTF-8\"\r\n";

		$body .= "--".$separator.$eol;
		$body .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
		$body .= $message.$eol;

		$mail = mail($to, $subject, $message.$eol, $headers);
		$mail2 = mail($to2, $subject2, $message2.$eol, $headers);

		if (mysqli_query($conn, $sql) && $mail && $mail2) {
		    echo "Booking succeed";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		end:
		mysqli_close($conn);
	}
?>