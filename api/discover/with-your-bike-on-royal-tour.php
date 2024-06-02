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

if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" && $_SERVER["REQUEST_URI"] !== "/discover/mit-der-faehre-auf-schloss-tour-gehen") {
    header("Location: /discover/mit-der-faehre-auf-schloss-tour-gehen");
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
    $title = "Go on castle tour with your bike";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien. Genieße die maritime Fahrt mit der Fahrradfähre und verbinde sie mit einer Radtour oder Wanderung zum Schloss. Hier sind die wichtigsten Highlights, um royale Momente zu erleben";
    $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Go on castle tour with your bike";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien. ";
    $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
    $btn_info = "Akzeptiren und fortfahren";
    $close_btn = "Schließen";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Go on castle tour with your bike";
    $description = "";
    $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accept and continue";
    $close_btn = "Close";
} else {
    $title = "Go on castle tour with your bike";
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

$img = "https://" . $_SERVER["HTTP_HOST"] . "https://www.cykelfaergen.info/images/discover/Copright Dagmar Trepins.jpg";

?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <img src="https://www.cykelfaergen.info/images/discover/Copright Dagmar Trepins.jpg" class="banner__image" alt="Die Königlich leibgarde marschiert in Gravenstein / Gråsten - vorbei der Königen">
    <article class="content">
        <h1>On a castle tour by ferry and bike</h1>
        <h2>Royal moments in Gråsten </h2>
        <section>
            <p>One of the most beautiful sights is the castle in Gråsten. Every summer, the royal family spends their summer holidays there. Enjoy the maritime ride on the bicycle ferry and combine it with a bike tour or hike to Gråsten. Here are the main highlights to experience royal moments:</p>
        </section>
        <section class="grid">
            <img src="https://www.cykelfaergen.info/images/discover/Copright Dagmar Trepins.jpg" alt="Die Königlich leibgarde marschiert in Gravenstein / Gråsten - vorbei der Königen">
            <section>
                <p>On her arrival, Queen Margrethe's official reception takes place in the market square (Torvet). It is a festive moment for residents and visitors to welcome the Queen. During the royal visit, you can see the royal bodyguard change shifts every day.</p>
                <p>The changing of the guard starts at Det Gule Palæ, Ahlefeldtvej 5, where the new shift lines up at around 11:30. From here they march through Gråsten via Borggade, Torvet and Slotsgade streets to the castle, where the changing of the guard takes place at 12:00. When Queen Margrethe resides at the castle, the music corps of the royal bodyguard takes part in the changing of the guard on Fridays and then gives a small concert in the castle courtyard. An unforgettable moment to catch a glimpse of the royal family.</p>
            </section>
        </section>
        <section class="grid ppad">
            <p>For royal fans and garden lovers, a stopover at the royal kitchen garden is also worthwhile. Completed in 2020, the 7,500-square-metre kitchen garden is located above the castle grounds of Gråsten Castle and is open daily from 11 a.m. to 5 p.m. during the high season in July and August. The beautiful kitchen garden invites you to linger and relax. Start or end your tour with coffee and cake in the small café in the greenhouse. If you can't get enough of flowers and gardens, you should definitely make a stop at the "story garden" at Gråsten harbour on your way back. Here a beautiful wild and nature garden was created as part of the project "Flowers Build Bridges", funded by the German-Danish Interreg programme. Have a good sniff of the wildflowers and then take a relaxed walk back to the ferry pier.</p>
            <img src="https://www.cykelfaergen.info/images/discover/Copyright BBB Blumen Bauen Brücken.jpg" alt="Der Königliche Schlossgarten in Gravenstein / Gråsten">
        </section>
        <section>
            <p><strong>Our tip:</strong> Start your castle tour from Langballigau with the bicycle ferry to Brunsnæs or continue to Marina Minde / Egernsund. From Egernsund you can cycle for about five minutes to Gråsten, where the royal family's summer residence is located. You can find our summer timetable here <a href="/#rodsand">timetable</a></p>
        </section>
        <section>
            <h4>Links for more information</h4>
            <p>
                Gråsten castle: <a href="https://www.visitsonderborg.com/sonderborg/information/schloss-grasten-gdk611078" target="_blank" rel="noopener">Gråsten castle (visitsonderborg.com)</a><br>
                Royal kitchen garden: <a href="https://www.visitsonderborg.com/sonderborg/information/der-koenigliche-nutzgarten-gdk1119681" target="_blank" rel="noopener">Royal kitchen garden (visitsonderborg.com)</a><br>
                To the story garden: <a href="https://www.bbbprojekt.eu/erzaehlgaerten" target="_blank" rel="noopener">"Flowers Build Bridges" in Gråsten (bbbprojekt.eu)</a>
            </p>
        </section>
        <section>
            <p>Photo credit</p>
            <p>
                Photo: Königlicher Empfang in Gråsten &copy;Dagmar Trepins<br>
                Photo: Wachablösung vor dem Schloss &copy; Dagmar Trepins<br>
                Photo: Schloss Gråsten und königlicher Küchengarten &copy; Destination Sønderjylland<br>
                Photo: Erzählgarten Gråsten &copy; BBB Blumen Bauen Brücken
            </p>
        </section>
    </article>
</main>
<? include($_SERVER["DOCUMENT_ROOT"] . "/language/" . $region . "/footer.php"); ?>
<? include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php"); ?>