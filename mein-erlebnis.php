<?
    /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();
    //echo $ip;
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" && $_SERVER["REQUEST_URI"] !== "/min-oplevelse"){
        header("Location: /min-oplevelse");
    }
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    $img = "https://".$mainHost."/ images/bg/sonderborg/Byens havn (2).jpg";
    if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
        $title = "Min Oplevelse | Cykelfærgen Flensborg fjord";
        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
        $title = "Mein Erlebniss | Fahrradfähre Flensburger Förde";
        $description = "Herzlich Willkommen an bord der Fahrradfähre MS Rødsand. Geniesst eine fahrt auf der Flensburger förde von Egernsund(DK) - Langballigau(DE)";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
        $title = "Contact | Bicycle ferry Flensborg Fjord";
        $description = "Welcome on the bicycle ferry MS Rødsand. Enjoy a cruise on the fjord from Egernsund(DK) - Langballigau(DE)";
    } else {
        $title = "Min oplevelse | Cykelfærgen Flensborg fjord";
        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.";
    }
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container content">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <h1>Teile dein Erlebnis mit uns!</h1>
    <p></p>
    <form id="contact_form" action="/share" method="post">
        <section class="form-elements-container">
            <label for="name">Name</label>
            <input class="form-elements" type="text" name="name" id="name" placeholder="Navn">
        </section>
        <section class="form-elements-container">
            <label for="email">E-Mail</label>
            <input class="form-elements" type="email" name="email" id="email" placeholder="e-mail">
        </section>
        <section class="form-elements-container">
            <input class="form-elements" type="hidden" name="subject" id="subject" placeholder="Emne" value="Del oplevelsen">
        </section>
        <section class="form-elements-container">
            <label for="to">Datei</label>
            <input type="file" class="form-elements" name="file" id="to" accept="image/*, video/*">
        </section>
        <div class="g-recaptcha" data-sitekey="6LfG_e8lAAAAAKc0huTXCl70tKch07r0q6a_RytF"></div>
        <button class="btn header-btn form-submit-btn" type="submit">Teilen</button>
        <div class="successMessage"></div>
    </form> 
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include("scripts/script.php");