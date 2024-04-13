<?
if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" && $_SERVER["REQUEST_URI"] !== "/hikers-and-cyclist"){
    header("Location: /hikers-and-cyclist");
}
$title = "Personenfähre Langballigau Egernsund, Dänemark";
$description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann fahren Sie mit uns als Personenfähre.";
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
    <section class="ppad-about">
        <section class="grid grid-gap content Tpadding">
            <section class="about-content">
                <h1 class="about-heading">Zu Fuß oder mit dem Fahrrad unterwegs?</h1>
                <p>Du bist auf einer Wandertour oder machst gerade Camping auf einem der vielen Campingplätze an der Förde? Dann empfehlen wir dir einen Ausflug nach Langballigau. Von dort aus kannst du mit uns nach Dänemark fahren. Wir haben Platz für dich, aber auch für dein Fahrrad.</p>
            </section>
            <section class="about__imageContainer">
                <img class="overlap-bottom aboutSmallImages" src="/images/20190725-_7251972.jpg" alt="Fähre auf der Flensburger Förde mit Personen">
            </section>
        </section>
    </section>
    <section class="ppad-about">
        <section class="about__bg split-tout--padding-top">
            <section class="grid content Tpadding">
                <section class="about__imageContainer reverse">
                    <img class="overlap-bottom aboutSmallImages" src="/images/brunsnæs-langballigau.jpg" alt="Dannebrog hinter der Fähre im Winde">
                </section>
                <section class="about-content">
                    <h2 class="about-heading">Von Langballigau nach Dänemark</h2>
                    <p>Fahre mit der Fähre von Langballigau nach Egernsund oder nach Brunsnæs. Erlebe maritime Momente an Bord und genieße die Aussicht auf die wunderschönen
Landschaften entlang der Flensburger Förde in beiden Ländern. Willkommen an Bord – velkommen ombord!</p>
                </section>
            </section>
        </section>
    </section>
    <section class="split-tout--padding-top">
        <section class="grid grid-gap content Tpadding">
            <section class="about-content reverse">
                <h2 class="about-heading">Auf nach Sonderburg</h2>
                <p>Die dänische Küste und das Umland sind eine Reise wert!
Dänemark und Deutschland teilen sich nicht nur eine der schönsten Küstenlandschaften, sondern sie bieten auch viele Sehenswürdigkeiten. Starte von Langballigau aus und genieße die Fahrt an Bord unserer Fähre. Mache eine Wandertour oder einen Ausflug mit dem Fahrrad nach Sonderburg und besuche die vielen interessanten Sehenswürdigkeiten dieser Stadt.</p>
            </section>
            <section class="about__imageContainer">
                <img class="aboutSmallImages" src="https://www.intastellarsolutions.com/images/bg/ftr_bg.png" alt="Die Fähre Rødsand auf dem weg nach Brunsnæs">
            </section>
        </section>
    </section>
    <section class="ppad-about" style="padding-bottom: 0px;">
        <section class="about__bg">
            <section class="grid content Tpadding">
                <section class="about__imageContainer">
                    <!-- <img class="overlap-top aboutSmallImages" src="/images/personen-about/cathrinesminde-ziegeleimuseum-in-brunsnaes-.jpg" alt="Cathrinesminde von der Seeseite aus gesehen."> -->
                </section>
                <section class="about-content" style="display: flex; flex-direction: column; justify-content: center;">
                    <h2 class="about-heading">Vom Urlaub in Flensburg & Langballigau</h2>
                    <p>Verbinde deinen Urlaub in Flensburg oder Langballigau mit einem Tagesausflug nach Dänemark. Eine Schiffsfahrt auf der Flensburger Förde bietet Entspannung pur! Ob als
einzelner Fahrgast oder als Gruppe mit oder ohne Fahrrad. Hier sind alle herzlich willkommen!
 
In diesem Jahr haben wir unser Angebot an Fahrten entlang der traditionellen Butterfahrten-Route erweitert. In der Saison 2023 fahren wir Flensburg sowohl freitags als auch samstags an. Die erste Fahrt startet am 30. Juni und die letzte Fahrt am 26. August</p>
                </section>
            </section>
        </section>
    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>