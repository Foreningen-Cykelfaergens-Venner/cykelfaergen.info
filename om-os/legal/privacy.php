<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Cykelfærgen privat politik";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Erlebt die Flensburger förde mit der Cykelfærgen Rødsand";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Discover the Flensborg fjord with Bicycle ferry Rødsand";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Cykelfærgen privat politik";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }
?>
<?
    include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
?>
<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/de-DE/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/en-GB/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else{
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }
    include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
?>