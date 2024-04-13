<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET["page_id"]) || $_SERVER["HTTP_HOST"] == "de.cykelfaergen.info" || $_SERVER["HTTP_HOST"] == "uk.cykelfaergen.info") {
    header("HTTP/1.1 410 Gone");
    $_GET['error'] = "410";
    include($_SERVER["DOCUMENT_ROOT"] . "/error.php");
    die();
}

function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip = getUserIpAddr();

//echo $ip;
include($_SERVER["DOCUMENT_ROOT"] . "/db.php");

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
{
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), "", strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

$img = "";

if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK") {
    $title = "Sejl med os langs den dansk-tyske kyste | Cykelfærgen Flensborg fjord";
    $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Erlebt die Flensburger förde mit der Fahrradfähre Flensburger förde";
    $description = "Herzlich Willkommen an bord der Fahrradfähre MS Rødsand. Geniesst eine fahrt auf der Flensburger förde von Egernsund(DK) - Langballigau(DE)";
    $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
    $btn_info = "Akzeptiren und fortfahren";
    $close_btn = "Schließen";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Discover the Flensborg fjord with Bicycle ferry Flensborg Fjord";
    $description = "";
    $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accept and continue";
    $close_btn = "Close";
} else {
    $title = "Sejl med os langs den dansk-tyske kyste | Cykelfærgen Flensborg fjord";
    $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
}

if (!isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info") {
    $lang = "de-DE";
} else if (isset($_COOKIE["region"])) {
    $lang = $_COOKIE["region"];
} else {
    $lang = "da-DK";
}



?>
<?

include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    include($root . "/language/dk-DK/stauts.php");
    include($root . "/language/dk-DK/footer.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    include($root . "/language/de-DE/stauts.php");
    include($root . "/language/de-DE/footer.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    include($root . "/language/en-GB/stauts.php");
    include($root . "/language/en-GB/footer.php");
    $link = "/https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
} else {
    include($root . "/language/dk-DK/stauts.php");
    include($root . "/language/dk-DK/footer.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
}
include($root . "/scripts/script.php");
?>