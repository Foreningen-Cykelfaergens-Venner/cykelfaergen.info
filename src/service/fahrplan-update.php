<?
if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" && $_SERVER["REQUEST_URI"] !== "/service/sejlplan-update"){
    header("Location: /service/sejlplan-update");
}
$title = "Melde dich an: Fahrplan Update | Fahrradfähre Flensburger Förde";
$description = "Seien Sie immer den anderen einen Schritt voraus und melden Sie sich für unseren Fahrplan-Update-Service an. Wir informieren Sie über Änderungen in unserem Fahrplan.";
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<style>
    .ppad-about {
        padding: 60px 0px 60px;
        display: block;
    }
</style>
<script src="/js/min/weather.min.js"></script>
<main class="container">
    <div id="omnisend-embedded-v2-6530eac3c6d9c8e0e6cbcad8"></div>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>