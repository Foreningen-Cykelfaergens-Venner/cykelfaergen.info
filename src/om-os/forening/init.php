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

    $root = str_replace("forening", "public_html", $_SERVER["DOCUMENT_ROOT"]);

    require($root."/om-os/forening/cykelfaergens-venner/stoet-os/lib/stripe/init.php");
    require($root."/om-os/forening/cykelfaergens-venner/stoet-os/lib/classes/customer.php");
?>