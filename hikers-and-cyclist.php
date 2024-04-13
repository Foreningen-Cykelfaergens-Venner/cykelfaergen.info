<?
if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" && $_SERVER["REQUEST_URI"] !== "/wanderer-und-fahrradfahrer"){
    header("Location: /wanderer-und-fahrradfahrer");
}
$title = "Ferry Langballigau Egernsund, Denmark";
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
                <h1 class="about-heading">On foot or by bike?</h1>
                <p>Are you on a hiking tour or camping at one of the many campsites along the fjord? Then we highly recommend a trip to Langballigau. From there you can travel with us to Denmark. We have space for you, but also for your bike.</p>
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
                    <h2 class="about-heading">From Langballigau to Denmark</h2>
                    <p>Take the ferry from Langballigau to Egernsund or to Brunsnæs. Experience maritime moments on board and enjoy the view of the beautiful landscapes along the Flensburg Fjord in both countries. Welcome on board - velkommen ombord!</p>
                </section>
            </section>
        </section>
    </section>
    <section class="split-tout--padding-top">
        <section class="grid grid-gap content Tpadding">
            <section class="about-content reverse">
                <h2 class="about-heading">On the way to Sonderborg</h2>
                <p>The Danish coast and the surrounding countryside are worth a visit!
Denmark and Germany not only share one of the most beautiful coastal landscapes, but they also offer many sights for tourists. Start from Langballigau and enjoy the trip aboard our ferry. Take a hiking tour or a trip by bike to Sonderborg and visit the many cultural attractions of this town.</p>
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
                    <h2 class="about-heading">Enjoy your holiday in Flensburg & Langballigau</h2>
                    <p>Combine your holiday in Flensburg or Langballigau with a day trip to Denmark. Relax during the ferry trip on the Flensburg Fjord! Whether as individual passenger or as a group with or without a bicycle. Everyone is welcome on board! 
</p>
<p>This year we have expanded our range of trips along the former traditional “Æ sprite”- route to Flensborg. In the 2023 season, we will be travelling to Flensburg on both Fridays and Saturdays. The first trip starts on 30 June and the last trip on 26 August.</p>
                </section>
            </section>
        </section>
    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>