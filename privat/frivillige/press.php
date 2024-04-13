<?
    session_start();
    if($_SESSION["frivillig_login"] != 1){
        header("Location: ../../frivillige-login");
    }

	$server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frivillig Panel</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/mobile.css">
    <link rel="stylesheet" href="../../styles/reset.css">
</head>
<body>
<?
    include("../../language/dk-DK/header.php");
  	if(!isset($_GET["utm"]) && $_GET["utm"] !== "login" && isset($_SESSION["press_login"]) && $_SESSION["press_login"] == 1){
?>
    <div class="main-container">
        <div class="content">
            <p>Velkommen <?= $_SESSION["email"];?></p>
            <h2>Upload Pressemitteilung</h2>
            <form action="upload-press.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
<?
    }else{
?>
  <div class="main-container">
    <div class="content">
     	Presse Login
       <form action="press-login" method="POST">
        <input type="email" autocomplete="true" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password">
         <input type="submit" value="login">
      </form>
    </div>
  </div>
<?
    }
    include("../../scripts/script.php");
?>