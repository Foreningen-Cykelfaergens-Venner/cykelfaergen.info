<?
    /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();
    //echo $ip;
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    $img = "https://".$mainHost."/ images/bg/sonderborg/Byens havn (2).jpg";
    if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
        $title = "Kontakt | Cykelfærgen Flensborg fjord";
        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
        $title = "Kontakt | Fahrradfähre Flensburger Förde";
        $description = "Herzlich Willkommen an bord der Fahrradfähre MS Rødsand. Geniesst eine fahrt auf der Flensburger förde von Egernsund(DK) - Langballigau(DE)";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com" && !isset($_COOKIE["region"])) {
        $title = "Contact | Bicycle ferry Flensborg Fjord";
        $description = "Welcome on the bicycle ferry MS Rødsand. Enjoy a cruise on the fjord from Egernsund(DK) - Langballigau(DE)";
    } else {
        $title = "Kontakt | Cykelfærgen Flensborg fjord";
        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    }
?>
<?
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        include("language/dk-DK/contact.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])){
        include("language/de-DE/contact.php");
        $link = "https://www.booksonderjylland.dk/de/buchen/aktivitat/1776117/erleben-sie-eine-unvergessliche-fahrt-mit-der-fahrradf%c3%a4hre-r/showdetails?page=2&refcur=EUR";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com" && !isset($_COOKIE["region"])){
        include("language/en-GB/contact.php");
        $link = "https://www.booksonderjylland.dk/en/book/to-do/1776117/experience-an-unforgettable-tour-on-the-bicycle-ferry-r%c3%b8dsan/showdetails?filter=t%3D&refcur=EUR";
    }else{
        include("language/dk-DK/contact.php");
    }
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>