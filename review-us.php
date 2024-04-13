<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
/* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    $title = "Bedøm os | Cykelfærgen Flensborg fjord";
    $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Bewerten Sie uns | Fahrradfähre Flensburger Förde";
    $description = "Herzlich Willkommen an bord der Fahrradfähre MS Rødsand. Geniesst eine fahrt auf der Flensburger förde von Egernsund(DK) - Langballigau(DE)";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Review us | Bicycle ferry Flensborg Fjord";
    $description = "Welcome on the bicycle ferry MS Rødsand. Enjoy a cruise on the fjord from Egernsund(DK) - Langballigau(DE)";
} else {
    $title = "Bedøm os | Cykelfærgen Flensborg fjord";
    $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
}
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
if($region == "dk-DK" || $region == "da-DK" || $region == ""){
    $pageTitle = "Bedøm os";
    $pageDescription = "Bedøm os på:";
    $trustpilotLocal = "dk";
}else if($region == "de-DE"){
    $pageTitle = "Bewerten Sie uns";
    $pageDescription = "Bewerten Sie uns auf:";
    $trustpilotLocal = "de";
}else if($region == "en-GB"){
    $pageTitle = "Review us";
    $pageDescription = "Review us on:";
    $trustpilotLocal = "www";
}
if(!isset($_GET["review"])){
?>
<section class="content">
    <h1><?php echo $pageTitle;?></h1>
    <p><?php echo $pageDescription;?></p>
    <ul>
        <li><a href="?review=trustpilot" target="_blank" rel="noopener noreferrer">Trustpilot</a></li>
    </ul>
    
</section>
<?
}

if(isset($_GET["review"]) && $_GET["review"] == "trustpilot"){
    echo '<iframe src="https://'.$trustpilotLocal.'.trustpilot.com/evaluate/embed/cykelfaergen.info" width="100%" height="1000px" style="overflow: hidden;" frameborder="0"></iframe>';
}
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include("scripts/script.php");
?>