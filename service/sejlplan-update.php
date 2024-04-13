<?
if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" && $_SERVER["REQUEST_URI"] !== "/service/fahrplan-update"){
    header("Location: /service/fahrplan-update");
}
$title = "Tilmeld dig nu: Sejlplan Opdatering | Cykelfaergen Flensborg fjord";
$description = "Vær altid et skridt foran de andre og tilmeld dig vores sejlplan opdateringsservice. Vi informerer dig om ændringer i vores sejlplan.";
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
    <div id="omnisend-embedded-v2-6530de25c4ed820c5e79cd2a"></div>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>