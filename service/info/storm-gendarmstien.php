<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$title = "Status efter Stormen 2023 | Cykelfærgen Flensborg fjord";
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
$img = "https://".$mainHost."/assets/gendarmstien/IMG_1327.jpg";
$description = "Se statusen på Gendarmstien efter Stormen i Oktober 2023";
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main>
    <article class="content">
        <h1>Storm 2023: Gendarmstien</h1>
        <h2>Ødelæggelse på Gendarmstien</h2>
        <p>Efter den kraftige stormflod, der ramte Sønderjylland den 20. og 21. oktober 2023, står det klart, at Gendarmstien nu er blokeret på flere strækninger.</p>
        <p>De lokale beredskabsmyndigheder i Sønderborg Kommune fortsætter med at fraråde vandreture på Gendarmstien. Stien har taget skade med underminerede områder, hvilket gør det vanskeligt at afgøre præcist, hvor der er risiko for nedfaldende træer og yderligere jordskred. Der er også områder, hvor stien enten er fuldstændig forsvundet eller delvist ødelagt.</p>
        <p>Hvis du alligevel overvejer at begive dig ud på Gendarmstien, anbefaler vi, at du konsulterer det kort, som vi har udarbejdet nedenfor.</p>
        <p>Kortet giver et overblik over de observerede skader på Gendarmstien, som er blevet rapporteret af myndighederne i Sønderborg og Aabenraa Kommuner. Vi vil løbende opdatere kortet, når der foretages reparationer for at afhjælpe skaderne..</p>
        <h3>Oversigtskort over skader på Gendarmstien:</h3>
    </article>
    <section style="position:relative">
        <iframe frameborder="0" scrolling="no" src="https://www.google.com/maps/d/embed?mid=103S-s2OwCH_AibXLJcJUX79LJ7S9GJw&amp;ehbc=2E312F" target="_parent" allowfullscreen="" style="display:block;height:500px;width:100%" height="100%" name="" width="100%" title="" tabindex="-1"></iframe>
    </section>
    <article class="content">
        <p>Oversigtskort & info fra: <a href="https://www.visitsonderjylland.dk/turist/information/oedelaeggelse-paa-gendarmstien" target="_blank" rel="noopener noreferral">Destination Sønderjylland</a>, Sønderborg Kommune & Aabenraa Kommune</p>
        <p>Læs mere om <a href="https://www.visitsonderjylland.dk/turist/oplevelser/aktiv-sammen/gendarmstien" target="_blank" rel="noopener">Gendarmstien på Destination Sønderjylland</a></p>
    </article>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>