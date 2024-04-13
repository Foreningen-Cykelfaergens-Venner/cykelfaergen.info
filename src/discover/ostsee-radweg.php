<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

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

if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    $title = "Ostsee Radweg | Cykelfærgen Flensborg fjord";
    $description = "Fra Flensborg over Langballigau til Lübeck. Nyd den smukke natur på cykel langs Østersøen.";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Ostsee Radweg | Fahrradfähre Flensburger Förde";
    $description = "Eine der schönsten Sehenswürdigkeiten in Gråsten ist das Schloss. Jedes Jahr im Sommer verbringt hier die königliche Familie ihre Sommerferien. ";
    $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
    $btn_info = "Akzeptiren und fortfahren";
    $close_btn = "Schließen";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Baltic Sea Cycle Route | Bike ferry Flensburg Fjord";
    $description = "From Flensburg over Langballigau to Lübeck. Enjoy the beautiful nature by bike along the Baltic Sea.";
} else {
    $title = "Ostsee Radweg | Cykelfærgen Flensborg fjord";
    $description = "Fra Flensborg over Langballigau til Lübeck. Nyd den smukke natur på cykel langs Østersøen.";
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
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container content">
    <section>
        <h1>Østersøen - En Cykelrejse gennem Skønhed, Historie og Kultur</h1>   
        <p>Med en af de smukkeste cykelstier i hele Tyskland lokker Østersøen hvert år mange besøgende og turister. Den maritime atmosfære kan naturligvis bedst nydes på en rejsecykel. Der er mange rejser, der tilbyder muligheden for at udforske Østersøen selvstændigt.</p>
        <p>Hvis du er interesseret i Østersø-cykelrejser, kan du finde masser af information på denne side. Alt fra forskellige rejseruter, natur, hoteller til litteratur og rejsearrangører.</p>
        <p>Østersøen byder på en interessant blanding af en forfriskende salt havbrise og krydret skovluft. På din cykeltur kan du se frem til kulinariske højdepunkter, især de velsmagende fiskeretter.</p>
    </section>
    <section>
        <h2>Historie og Kultur</h2>

        <p>Langs Østersøen ligger Tysklands smukkeste hansestæder som på en perlekæde. Lübeck er kendt for sin historiske gamle bydel og den lækre Lübecker marcipan. Wismar imponerer med sine smukke seværdigheder, såsom havnen og torvet. Hansestaden Rostock blev berømt gennem Hanse Sail, og Stralsund imponerer med rigdommen af historisk bygningsarv.</p>

        <p>En rejse langs Østersøen er ikke blot en tur gennem skønhed, men også gennem historie og kultur. Her er en verden af historiske begivenheder, der har formet regionens karakter gennem århundreder. Fra vikingernes rejser til hansaforbundets handel og konflikter har Østersøen været vidne til et væld af begivenheder, der har efterladt deres præg på landskabet og kulturen.</p>
    </section>
    <section>
        <h2>Seværdigheder og Attraktioner</h2>

        <p>Undervejs på din cykeltur langs Østersøen vil du støde på en række seværdigheder og attraktioner, der fortæller historien om regionen og dens folk. Besøg de gamle fiskerlandsbyer, der stadig bærer præg af deres maritime fortid, eller udforsk de historiske slotte og herregårde, der engang tilhørte adelen.</p>

        <p>Tag dig tid til at besøge de lokale museer og udstillinger, der fortæller historien om Østersøens kultur og traditioner. Gå på opdagelse i de gamle kirker og klostre, der vidner om regionens religiøse arv, eller tag en tur til de smukke nationalparker og naturreservater, der beskytter Østersøens unikke natur og dyreliv.
    </section>
    <section>
        <h2>Rejseplanlægning & Booking</h2>
        <a href="https://alsturbaade.teambooking.dk/new-booking/0/departure-date?booking=JTdCJTIydGlja2V0cyUyMiUzQSU1QiU3QiU3RCU1RCUyQyUyMmFza0ZvckZsb3clMjIlM0F0cnVlJTdE&flowGroup=cyklen-ege&lang=da-dk&firstDate=2024-05-18" target="_blank" class="cta" rel="noopener nofollow external">Book din tur i dag</a>
    </section>
    <section>
        <h2>Natur og Biodiversitet</h2>

        <p>På din cykeltur kan du opleve dette rige kulturlandskab på nært hold. Besøg de gamle fæstninger, der engang beskyttede kysten mod angreb fra havet, eller udforsk de historiske bycentre med deres smalle brostensbelagte gader og farverige bindingsværkshuse. Tag dig tid til at besøge museer og kulturelle institutioner, der fortæller historien om Østersøens folk og deres liv gennem tiden.</p>

        <p>Undervejs på din rejse vil du også støde på en rig biodiversitet, der trives i Østersøens miljø. Stop og beundre de skiftende landskaber, fra de lange sandstrande og klippekyster til de frodige skove og grønne enge. Østersøen er et paradis for naturelskere, og en cykeltur langs kysten giver dig mulighed for at opleve denne naturskønhed på nært hold.</p>
    </section>
    <section>
        <h2>Kulinariske Oplevelser</h2>

        <p>Når sulten melder sig, vil du blive forkælet med et udvalg af lækre retter baseret på friske lokale råvarer. Prøv de delikate fiskeretter, der er fanget lige fra Østersøen, eller nyd de saftige bøffer og friske grøntsager, der er dyrket i regionens frodige landskab. Østersøens køkken er en sand gastronomisk oplevelse, der vil glæde dine smagsløg og give dig energi til næste strækning af din cykeltur.</p>

        <p>Uanset om du er en erfaren cyklist eller en nybegynder, vil en rejse langs Østersøen være en uforglemmelig oplevelse. Tag på eventyr langs kysten, og lad dig fortrylle af Østersøens skønhed, historie og kultur.</p>
    </section>
    <a href="https://alsturbaade.teambooking.dk/new-booking/0/departure-date?booking=JTdCJTIydGlja2V0cyUyMiUzQSU1QiU3QiU3RCU1RCUyQyUyMmFza0ZvckZsb3clMjIlM0F0cnVlJTdE&flowGroup=cyklen-ege&lang=da-dk&firstDate=2024-05-18" target="_blank" rel="noopener nofollow external" class="cta">Book din tur i dag</a>
</main>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
?>