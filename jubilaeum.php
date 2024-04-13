<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
/* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
if ($_SERVER["HTTP_HOST"] !== "www.fahrradfaehre.info" || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    $title = "Jubilæum 2023 - Cykelfærgen Flensborg Fjord!";
    $description = "Vær med til at fejre vores 5-års jubilæum og stig om bord på vores ny færge Thjalfe.";
}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])){
    $title = "Jubiläum 2023 - Fahrradfähre Flensburger Förde!";
    $description = "Sei mit dabei wenn wir unser 5-jähriges jubiläum feieren & steige an Bord unserer neuen Fähre Thjalfe.";
}else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){

}
$img = "https://".$mainHost . "/images/cykelfaergen-jubilaeum-2023.jpg";
?>
<?

include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    include("language/dk-DK/jubi.php");
    include("language/dk-DK/footer.php");
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    include("language/de-DE/jubi.php");
    include("language/de-DE/footer.php");
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    include("language/en-GB/jubi.php");
    include("language/en-GB/footer.php");
} else {
    include("language/dk-DK/jubi.php");
    include("language/dk-DK/footer.php");
}
include("scripts/script.php");
?>