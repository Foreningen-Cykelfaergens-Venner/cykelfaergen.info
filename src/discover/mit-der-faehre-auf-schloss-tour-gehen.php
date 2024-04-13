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

if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" && $_SERVER["REQUEST_URI"] !== "/discover/with-your-bike-on-royal-tour"){
    header("Location: /discover/with-your-bike-on-royal-tour");
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

if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    $title = "Mit der Fahrradfähre auf Schlosstour";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien. Genieße die maritime Fahrt mit der Fahrradfähre und verbinde sie mit einer Radtour oder Wanderung zum Schloss. Hier sind die wichtigsten Highlights, um royale Momente zu erleben";
    $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Mit der Fahrradfähre auf Schlosstour";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien. ";
    $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
    $btn_info = "Akzeptiren und fortfahren";
    $close_btn = "Schließen";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Mit der Fahrradfähre auf Schlosstour";
    $description = "";
    $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accept and continue";
    $close_btn = "Close";
} else {
    $title = "Mit der Fahrradfähre auf Schlosstour";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien.";
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

$img = "https://" . $_SERVER["HTTP_HOST"] . "/images/discover/Copright Dagmar Trepins.jpg";

?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <img src="/images/discover/Copright Dagmar Trepins.jpg" class="banner__image" alt="Die Königlich leibgarde marschiert in Gravenstein / Gråsten - vorbei der Königen">
    <article class="content">
        <h1>Mit der Fahrradfähre auf Schlosstour</h1>
        <h2>Royale Momente in Gråsten</h2>
        <section>
            <p>Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt dort die königliche Familie ihre Sommerferien. Genieße die maritime Fahrt mit der Fahrradfähre und verbinde sie mit einer Radtour oder Wanderung zum Schloss. Hier sind die wichtigsten Highlights, um royale Momente zu erleben:</p>
        </section>
        <section class="grid">
            <img src="/images/discover/Copright Dagmar Trepins.jpg" alt="Die Königlich leibgarde marschiert in Gravenstein / Gråsten - vorbei der Königen">
            <p>Wenn die Königin im Sommer in Gråsten eintrifft, findet der offizielle Empfang von Königin Margrethe auf dem Marktplatz (Torvet) statt. Ein festlicher Augenblick für Bewohner und Besucher, die Königin einmal aus direkter Nähe zu sehen. Während des königlichen Besuchs kann man täglich den Schichtwechsel der königlichen Leibgarde erleben.</p>
            <p>Die Wachablösung beginnt am Det Gule Palæ, Ahlefeldtvej 5, wo sich die neue Schicht um etwa 11:30 Uhr aufstellt. Von hier aus marschieren sie durch Gråsten über die Straßen Borggade, Torvet und Slotsgade zum Schloss, wo die Wachablösung um 12:00 Uhr stattfindet. Wenn Königin Margrethe im Schloss residiert, nimmt das Musikkorps der königlichen Leibgarde freitags an der Wachablösung teil und gibt anschließend ein kleines Konzert im Schlosshof. Auch hier kannst du einen Blick auf die königliche Familie werfen.</p>
        </section>
        <section class="grid">
            <p>Für royale Fans und Gartenfreunde lohnt sich auch ein Abstecher zum königlichen Küchengarten. Der 2020 fertig angelegte und 7.500 Quadratmeter große Küchengarten liegt oberhalb vom Schlosspark des Schlosses Gråsten und ist in der Hochsaison im Juli und August täglich von 11:00 Uhr bis 17:00 Uhr geöffnet. Der schöne Küchengarten lädt zum Verweilen ein. Lass den Rundgang gemütlich bei Kaffee und Kuchen im kleinen Café im Gewächshaus ausklingen. Wer von Blumen und Gärten nicht genug bekommen kann, sollte auf der Rückfahrt unbedingt noch einen Zwischenstopp im „Erzählgarten“ am Hafen von Gråsten einlegen. Hier entstand ein wunderschöner Wild- und Naturgarten im Rahmen des Projekts „Blumen Bauen Brücken“, gefördert durch das deutsch-dänische Interreg-Programm. Einmal kräftig Wildblumen schnuppern und dann geht es ganz entspannt zurück zum Fähranleger.</p>
            <img src="/images/discover/Copyright BBB Blumen Bauen Brücken.jpg" alt="Der Königliche Schlossgarten in Gravenstein / Gråsten">
        </section>
        <section>
            <p><strong>Unser Tipp:</strong> Starte deine Schlosstour von Langballigau aus mit der Fahrradfähre nach Brunsnæs oder weiter bis nach Marina Minde / Egernsund. Von Egernsund aus radelst du ungefähr fünf Minuten bis nach Gråsten, wo sich die Sommerresidenz der königlichen Familie befindet.
Unseren Sommerfahrplan findest du hier: <a href="/#rodsand">Fahrplan</a></p>
        </section>
        <section>
            <h4>Links für weitere informationen</h4>
            <p>
                zum Schloss Gråsten: <a href="https://www.visitsonderborg.de/sonderborg/information/schloss-grasten-gdk611078" target="_blank" rel="noopener">Schloss Gråsten (visitsonderborg.de)</a><br>
                zum königlichen Küchengarten: <a href="https://www.visitsonderborg.de/sonderborg/information/der-koenigliche-nutzgarten-gdk1119681" target="_blank" rel="noopener">Der Königliche Nutzgarten (visitsonderborg.de)</a><br>
                zum Gråsten Erzählgarten: <a href="https://www.bbbprojekt.eu/erzaehlgaerten" target="_blank" rel="noopener">BBB Erzählgärten - Blumen Bauen Brücken - Blomster Bygger Broer (bbbprojekt.eu)</a>
            </p>
        </section>
        <section>
           <p>
               Fotohinweise
                Foto: Königlicher Empfang in Gråsten &copy;Dagmar Trepins<br>
                Foto: Wachablösung vor dem Schloss &copy; Dagmar Trepins<br>
                Foto: Schloss Gråsten und königlicher Küchengarten &copy; Destination Sønderjylland<br>
                Foto: Erzählgarten Gråsten &copy; BBB Blumen Bauen Brücken

           </p> 
        </section>
    </article>
</main>
<? include($_SERVER["DOCUMENT_ROOT"] . "/language/".$region."/footer.php");?>
<? include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");?>