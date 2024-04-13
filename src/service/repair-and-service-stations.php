<?
    if($_COOKIE["region"] == "de-DE"){
        $title = "Radserive in Sønderjylland / Nordschleswig";
        $description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann fahren Sie mit uns als Personenfähre.";
    }else if($_COOKIE["region"] == "dk-DK"){
        $title = "Cykelservice i Sønderjylland";
        $description = "";
    }else if($_COOKIE["region"] == "en-GB"){
        $title = "Bikeservice in Sønderjylland";
        $description = "";
    }else{
        $title = "Cykelservice i Sønderjylland";
        $description = "";
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
        include($root."/language/".$region."/services.php");
    ?>
</main>
<?
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($root . "/scripts/script.php");
?>