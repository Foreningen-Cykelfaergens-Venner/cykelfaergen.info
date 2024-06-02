<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", "." . preg_replace("/^(.*?)\.(.*)$/", "$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www." . preg_replace("/^(.*?)\.(.*)$/", "$2", $_SERVER["HTTP_HOST"]);
$img = "https://" . $mainHost . "https://www.cykelfaergen.info/images/bg/sonderborg/Byens havn (2).jpg";
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"])) {
    $title = "Sønderborg-Langballigau på 1 time | Cykelfærgen Flensborg fjord";
    $description = "Oplev Sønderborgs skønne natur langs Gendarmstien i retning mod Langballigau via Brunsnæs.";
}
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <article class="subbanner">
        <section class="search-container-bg">
            <img class="search-container-bg-img subbanner-img" src="https://www.cykelfaergen.info/images/bg/sonderborg/Byens havn (2).jpg" alt="Sønderborg - Byens havn">
            <small class="photo-copyright">&copy; Sønderborg Kommune</small>
            <div class="hero-overlay">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 809 419" class="css-jwstly eoe3qck2">
                    <defs>
                        <linearGradient id="leftShaftGradA" x1="50%" x2="50%" y1="0%" y2="100%">
                            <stop offset="0%" stop-color="#C3E0F4" stop-opacity=".7" class="css-4tqk3n eoe3qck0"></stop>
                            <stop offset="100%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop>
                        </linearGradient>
                        <linearGradient id="leftShaftGradB" x1="100%" x2="24.236%" y1="50%" y2="50%">
                            <stop offset="0%" stop-color="#FFF" stop-opacity=".5"></stop>
                            <stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="leftShaftGradC" x1="100%" x2="0%" y1="50%" y2="50%">
                            <stop offset="0%" stop-color="#FFF"></stop>
                            <stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="leftShaftGradD" x1="100%" x2="0%" y1="50.002%" y2="50.002%">
                            <stop offset="0%" stop-color="#FFF" stop-opacity=".3"></stop>
                            <stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="leftShaftGradE" x1="11.903%" y1="50%" y2="50%">
                            <stop offset="0%" stop-color="#C3E0F4" class="css-4tqk3n eoe3qck0"></stop>
                            <stop offset="100%" stop-color="#C3E0F4" stop-opacity=".4" class="css-4tqk3n eoe3qck0"></stop>
                        </linearGradient>
                        <rect id="leftShaftGradF" width="372" height="419"></rect>
                    </defs>
                    <g fill="none" fill-rule="evenodd">
                        <polygon fill="url(#leftShaftGradA)" fill-rule="nonzero" points="371 0 687 0 445.084 419 371 419"></polygon>
                        <polygon fill="url(#leftShaftGradB)" fill-rule="nonzero" points="664.828 0 739 0 490.172 419 416 419"></polygon>
                        <polygon fill="url(#leftShaftGradC)" fill-rule="nonzero" points="734.598 0 809 0 559.402 419 485 419" opacity=".1"></polygon>
                        <polygon fill="url(#leftShaftGradD)" fill-rule="nonzero" points="705.551 0 715 0 714.373 1.057 466.449 419 457 419 704.968 .983"></polygon>
                        <polygon fill="url(#leftShaftGradE)" fill-rule="nonzero" points="371 419 376.5 419 613 0 371 0"></polygon>
                        <rect fill="#046c6d" fill-rule="nonzero" width="372" height="419"></rect>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="300" height="419" viewBox="0 0 300 419" class="css-seqzpf eoe3qck1">
                    <defs>
                        <rect id="righgtShaftExportA" width="300" height="419"></rect>
                        <linearGradient id="rightShaftExportB" x1="50%" x2="50%" y1="0%" y2="100%">
                            <stop offset="0%" stop-color="#C3E0F4" stop-opacity=".7" class="css-4tqk3n eoe3qck0"></stop>
                            <stop offset="100%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop>
                        </linearGradient>
                        <polygon id="rightShaftExportC" points="316 420 0 420 241.916 0 316 0"></polygon>
                        <linearGradient id="rightShaftExportD" x1="100%" x2="1.587%" y1="50%" y2="50%">
                            <stop offset="0%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop>
                            <stop offset="100%" stop-color="#C3E0F4" stop-opacity=".4" class="css-4tqk3n eoe3qck0"></stop>
                        </linearGradient>
                        <polygon id="rightShaftExportE" points="74.172 419 0 419 248.828 0 323 0"></polygon>
                        <linearGradient id="rightShaftExportF" x1="100%" x2="20.222%" y1="50.002%" y2="50.002%">
                            <stop offset="0%" stop-color="#FFF"></stop>
                            <stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="rightShaftExportG" x1="100%" x2="17.098%" y1="50%" y2="50%">
                            <stop offset="0%" stop-color="#FFF" stop-opacity=".3"></stop>
                            <stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="rightShaftExportH" x1="0%" x2="50%" y1="61.13%" y2="61.13%">
                            <stop offset="0%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop>
                            <stop offset="100%" stop-color="#C3E0F4" class="css-4tqk3n eoe3qck0"></stop>
                        </linearGradient>
                        <polygon id="rightShaftExportI" points="242 0 236.5 0 0 420 242 420"></polygon>
                    </defs>
                    <g fill="none" fill-rule="evenodd">
                        <mask id="rightShaftExportJ" fill="#fff">
                            <use xlink:href="#righgtShaftExportA"></use>
                        </mask>
                        <g mask="url(#rightShaftExportJ)">
                            <g transform="translate(6 -1)">
                                <g transform="translate(121)">
                                    <use fill="url(#rightShaftExportB)" fill-rule="nonzero" xlink:href="#rightShaftExportC"></use>
                                </g>
                                <g transform="translate(68 1)">
                                    <use fill="url(#rightShaftExportD)" fill-rule="nonzero" xlink:href="#rightShaftExportE"></use>
                                </g>
                                <polygon fill="url(#rightShaftExportF)" fill-rule="nonzero" points="74.272 419.986 0 419.986 249.163 0 323.435 0" opacity=".1"></polygon>
                                <polygon fill="url(#rightShaftExportG)" fill-rule="nonzero" points="100.412 421 91 421 338.602 1 348 1"></polygon>
                                <g transform="translate(195)">
                                    <use fill="url(#rightShaftExportH)" fill-rule="nonzero" xlink:href="#rightShaftExportI"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </section>
        <section class="subbanner-content">
            <h2 class="subbanner-subheading">40 min cykling og 25 min sejlads</h2>
            <h1 class="subbanner-heading">Sønderborg til Langballigau</h1>
            <p>Oplev Sønderborgs skønne natur langs Gendarmstien i retning mod Langballigau via Brunsnæs.</p>
            <a href="https://booking.cykelfaergen.info" class="btn js-btn">Book din sejlads i dag!</a>
        </section>
    </article>
    <svg class="bgFlow" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2262.82 2886.02">
        <defs>
            <style>
                .uuid-8a559af5-71f7-42b9-a491-37a65dc99d98 {
                    fill: none;
                    stroke: #056c6d;
                    stroke-miterlimit: 10;
                    stroke-width: 7px;
                }
            </style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07" />
    </svg>
    <section class="ppad-about">
        <section class="grid grid-gap">
            <section class="about-content">
                <h2 class="about-heading">Sønderborg</h2>
                <h3>Start din rute i Sønderborg</h3>
                <p>Hop på din cykel og tag mod vest, nyd det gode vejr og tank noget energi i mens du cykler hen over Kong Chr. X´s bro, inden du kommer til dybbøl banke.</p>
            </section>
            <section class="about__imageContainer">
                <img class="aboutSmallImages" src="https://www.cykelfaergen.info/images/sonderborg/Rådhustorvet_Sønderborg_0013-1600px.jpg" alt="Sønderborg Rådhustorvet">
                <small class="photo-copy-underImage">&copy; Sønderborg Kommune</small>
            </section>
        </section>
        <section class="grid grid-gap">
            <section class="about__imageContainer">
                <img class="aboutSmallImages --leftSide" src="https://www.cykelfaergen.info/images/broager/Broagerkirke.jpg" alt="Broager Kirke">
                <small class="photo-copy-underImage">&copy; Sønderborg Kommune</small>
            </section>
            <section class="about-content">
                <h2 class="about-heading">Broager / Brunsnæs</h2>
                <h3>Nyde den smukke natur på Broagerland</h3>
                <p>Tag færgen fra Brunsnæs strand of fortsæt til Langballigau og nyd ved det din ferie direkte ved Flensborg fjord.</p>
            </section>
        </section>
        <section class="grid grid-gap">
            <section class="about-content">
                <h2 class="about-heading">Langballigau</h2>
                <h3>Nyd en Fischbrötchen på Havnen i Langballigau.</h3>
                <p>Landet i Langballigau, tag dig lidt tid og nyd en dejlig Fischbrötchen, bestill det direkt om bord og hent det når du er i Langballigau.</p>
                <p>På vej hjem til Sønderborg, kan du godt oppe på igen i Flensborg eller Sønderhav og kom med tilbage til Egernsund.</p>
            </section>
            <section class="about__imageContainer">
                <img class="aboutSmallImages" src="https://www.cykelfaergen.info/images/langballig/Hafenidylle Langballigau-BenjaminNolte.jpg" alt="Hafenidylle Langballigau">
                <small class="photo-copy-underImage">&copy; <a href="https://www.flensburger-foerde.de" target="_blank" rel="noopener">flensburger-foerde.de</a> / Benjamin Nolte</small>
            </section>
            <a href="https://booking.cykelfaergen.info" class="btn header-btn js-btn cta" style="margin-inline: auto;" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book sejladsen"
            }),fbq("Lead", {
                "content_name": "Book sejladsen",
                "content_category": "Cykelfærgen - Bookig"
            })'>Book din sejlads i dag!</a>
        </section>
    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include("scripts/script.php");
?>