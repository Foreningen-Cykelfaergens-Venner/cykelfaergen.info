<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
$img = "https://".$mainHost."/images/bg/sonderborg/Byens havn (2).jpg";
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"])) {
    $title = "Cykelfærgen vs MS Feodora II - hvad gøre cykelfærgen anderleds?";
    $description = "Hvad gøre Cykelfærgen bedre end MS Feodora II? Eller er de begge lige godt? Find det ud af her!";
}
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <article class="content">
        <header class="compare-header">
            <h1>Ikke spørge om du må tag cyklen med på MS Feodora II. Tag cyklen ombord Cykelfærgen Flensborg fjord.</h1>
            <p>Ikke alle færger er ens. Cykelister bruger Cykelfærgen Flensborg fjord i steden for Feodora II. Begynd din tur på fjorden i dag.</p>
            <a href="https://booking.cykelfaergen.info" class="btn header-btn" style="margin-inline: auto;" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book din sejlads"
            }),fbq("Lead", {
                "content_name": "Book din sejlads",
                "content_category": "Cykelfærgen - Bookig"
            })'>Gå til booking</a>
        </header>
        <section class="first-comparesing">
            <h2>Hvorfor vælge cykelfærgen i steden for Feodora II?</h2>
            <section class="ticket-grid">
                <article>
                    <h3>Daglig afgang</h3>
                    <p>Med Cykelfærgen Flensborg fjord for du daglige afgang fra Egernsund, Langballigau og Flensborg. Ikke mere vent og frustration når du planlægger turer.</p>
                </article>
                <article>
                    <h3>Din cykel i fokus</h3>
                    <p>Cykelfærgen er begyndt med din cykel i fokus fra begyndelsen. Med Cykelfærgn Flensborg fjord tager vi meget gerne din cykel med ombord og transporter dig med din cykel over grænsen.</p>
                </article>
                <article>
                    <h3></h3>
                </article>
            </section>
        </section>
        <section class="grid">
            <img src="" alt="">
            <article>
                <h3>Men kan jeg ikke have min cykel også med på Feodora?</h3>
                <p>Med Feodora har du muligheden at tage en cykel med, Ja. Dog skal du for at kunne gøre det </p>
            </article>
        </section>
        <section class="cta-container ppad">
            <a href="https://booking.cykelfaergen.info" class="btn header-btn" style="margin-inline: auto;" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book din sejlads"
            }),fbq("Lead", {
                "content_name": "Book din sejlads",
                "content_category": "Cykelfærgen - Bookig"
            })'>Lad mig vælge min dag!</a>
        </section>
    </article>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include("scripts/script.php");
?>