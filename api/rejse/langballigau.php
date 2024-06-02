<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$title = "Langballigau | Cykelfærgen Flensborg fjord";
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
/* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="content">

</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>