<?php
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
	session_start();
	
	$pass = "bib6310";

	

	if(isset($_POST["password"])){
      $server = "mysql73.unoeuro.com";
      $user = "cykelfaergen_info";
      $password = "natwh9kp";
      $database = "cykelfaergen_info_db_website";

      $db = mysqli_connect($server, $user, $password,$database);
      
      $passwor = $_POST["email"];
      $sql = "SELECT * FROM frivilige_login WHERE user = '$passwor'";
      $query = mysqli_query($db, $sql);
      
      $pass = strtolower($_POST["password"]);

      while($row = $query->fetch_assoc()){
      	$password = $row["password"];
      
        if(password_verify($pass, $password)){
          $_SESSION["user"] = $row["user"];
          $_SESSION["frivillig_login"] = 1;

          if(isset($_POST["url"])){
            $url = $_POST["url"];
          }else{
            $url = "privat/frivillige/admin";
          }

          header("Location: ". $url);
        }else{
          echo "Wrong password";
        }
      }
    }
?>