<?php


/* if(strpos($_SERVER['HTTP_REFERER'], "fahrradfaehre.info") > -1){
    setcookie("region", "de-DE");
} */

if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"]) && $_SERVER['HTTP_REFERER'] !== "https://www.fahrradfaehre.info/"){
        $title = "Vi søger frivillige - Cykelfærgen Flensborg Fjord";
        $description = "Book din sejlads med cykelfærgen til Langballigau eller Flensborg direkte her!";
        $bookingLang = "&lang=da-dk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/"){
        $title = "Wir suchen Freiwillige - Fahrradfähre Flensburger Förde";
        $description = "Buchen deine fahrt mit der Fahrradfähre nach Egernsund oder Brunsnæs direkt hier!";
        $bookingLang = "&lang=de-de";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "We are searching for volantiers - Bicycle Ferry Flensburger Fjord";
        $description = "Book your tour with the bicycle ferry to Germany or Denmark direct here!";
        $bookingLang = "&lang=en-en";
    }

    $root = str_replace("booking", "public_html", $_SERVER["DOCUMENT_ROOT"]);
    include($root."/components/header.php");

?>
<main class="container content">
    <h1>Vi søger frivillige</h1>
    <p>Være en del af et fantastik hold af frivillige - og hjælp projektet hen over grænsen til at blive en stor success!</p>
    <section class="ppad grid">
        <section>
            <h2>At være frivillig</h2>
            <p></p>
        </section>
        <img src="" alt="Frivillige hos Cykelfærgen Flensborg fjord">
    </section>
    <section class="ppad grid">
        <section>
            <h2>Hvad kræver det?</h2>
            <p></p>
        </section>
    </section>
    <form action="" method="post">
        <h2>Meld mig som frivillig!</h2>
        <label for="name">Navn</label>
        <input type="text" name="name" id="name">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <button type="submit" class="btn header-btn">Tilmeld</button>
    </form>
</main>
<?php
    include($root."/components/footer.php");
    include($root."/scripts/script.php");
?>