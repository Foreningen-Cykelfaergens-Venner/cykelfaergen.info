<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Foreningen Cykelfærgen's Venner";

        $description = "Foreningen Cykelfærgen´s Venner arbejder med udvikling og investeringer i projektet 'Cykelfærgen på Flensborg Fjord'";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";

        $description = "Foreningen Cykelfærgen´s Venner arbejder med udvikling og investeringer i projektet 'Cykelfærgen på Flensborg Fjord'";

        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Foreningen Cykelfaergen's | Bicycle ferry Rødsand";

        $description = "Foreningen Cykelfærgen´s Venner arbejder med udvikling og investeringer i projektet 'Cykelfærgen på Flensborg Fjord'";

        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Foreningen Cykelfaergen's Venner";

        $description = "Foreningen Cykelfærgen´s Venner arbejder med udvikling og investeringer i projektet 'Cykelfærgen på Flensborg Fjord'";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }

    $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html";
    $description = "Foreningen Cykelfærgens Venner, skal fremover sikre drift og udvikling af det nuværende koncept med færgen ”Rødsand”, der ejes af skipper Palle Heinrich.";
?>
<?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
        include($root."/language/dk-DK/forening.php");
        include($root."/language/dk-DK/footer.php");
        include($root."/scripts/script.php");
    ?>
</body>
</html>