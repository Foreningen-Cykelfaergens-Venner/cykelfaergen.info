<?
    if($_COOKIE["region"] == "de-DE"){
        $title = "Wettervorhersage | Fahrradfähre Flensburger Förde";
        $description = "Planen Sie ihre Radtour & Fährtour direkt mit der Wettervorhersage. Bekommen Sie über die nächsten 5 Tage 3 Stündige vorhersagen.";
    }else if($_COOKIE["region"] == "dk-DK"){
        $title = "Vejrudsigt | Cykelfærgen Flensborg fjord";
        $description = "Planlæg din cykeltur og færgetur direkte med vejrudsigten. Få 3 timers prognoser over de næste 5 dage.";
    }else if($_COOKIE["region"] == "en-GB"){
        $title = "Weatherforcast | Bicycleferry Flensburger Fjord - Cykelfaergen Flensborg fjord";
        $description = "Plan your bike tour & ferry tour directly with the weather forecast. Get 3 hour forecasts over the next 5 days.";
    }else{
        $title = "Vejrudsigt | Cykelfærgen Flensborg fjord";
        $description = "Planlæg din cykeltur og færgetur direkte med vejrudsigten. Få 3 timers prognoser over de næste 5 dage.";
    }
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<style>
    .ppad-about {
        padding: 60px 0px 60px;
        display: block;
    }
</style>
<main class="container">
    <?
        include($root."/language/".$region."/weather.php");
    ?>
</main>
<?
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($root . "/scripts/script.php");
?>