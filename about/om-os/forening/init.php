<?
    /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */

    $server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);

    if(!$db){
        echo "Not Connect!";
        die();
    }
    require("lib/stripe/init.php");
    require("lib/classes/customer.php");
?>