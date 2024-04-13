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
<!DOCTYPE html>
<html lang="<?= $_COOKIE["region"]?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="copyright" content="Copyright <?= date("Y")?> Intastellar Solutions, International. All rights reserved.">
    <meta name="intastellar-platform-api_id" content="d2eefd7f1564fa4c9714000456183a6b0f51e8c9519e1089ec41ce905ffc0c453dfac91ae8645c41ebae9c59e7a6e5233b1339e41a15723a9ba6d934bbb3e92d.apps.intastellar.com">
    <meta property="og:title" content="Cykelfærgen Rødsand" />
    <meta property="og:description" content="Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord." />
    <meta property="og:url" content="https://www.cykelfaergen.info/om-os/legal/privacy" />
    <meta property="og:locale" content="da_DK" />
    <meta property="og:image" content="https://cykelfaergen.info/newsroom/news-img/IMG_1753.jpg" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Cykelfærgen Rødsand" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.">
    <meta property="fb:pages" content="1636555379700812">
    <meta property="ia:markup_url" content="https://www.cykelfaergen.info/om-os/legal/privacy">
    <meta name="twitter:title" content="Cykelfærgen Rødsand">
    <meta name="twitter:site" content="@intastellarhold">
    <meta name="twitter:image" content="https://cykelfaergen.info/newsroom/news-img/IMG_1753.jpg">
    <meta name="twitter:creator" content="@intastellarhold">
    <title><?= $title?></title>
    <meta name="description" content="Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord.">
  	<link rel="stylesheet" href="/styles/reset.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/pressroom.css">
    <link rel="stylesheet" href="/styles/mobile.css">
  	<link rel="apple-touch-icon" sizes="57x57" href="/assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://www.intastellarsolutions.com/js/cookie-banner.js?v=<?= time();?>"></script>
    <script src="/js/setLocation.js"></script>
    <script>
        window.INT = {
            key: "6836650698",
            settings: {
                color: "rgb(4, 108, 109)",
                keepInLocalStorage: ["hideInfoBanner"]
            }
        }
    </script>
    <script type="application/ld+json">
            {
                "@context": "http://schema.org/",
                "@type": "Corporation",
                "name": "Cykelfærgen",
                "brand": [
                    "Nordic Taggers",
                    "Intastellar",
                    "engapho",
                    "IMS",
                    "Intastellar Management System"
                ],
                "alternateName": [
                    "Intastellar Solutions",
                    "Intastellar Solutions, Danmark"    
                ],
                "url": "https://www.intastellarsolutions.com",
                "logo": "https://assets.intastellar-clients.net/bG9nb3MvaW50YXN0ZWxsYXJfc29sdXRpb25zQDJ4LnBuZw==",
                "sameAs": [
                    "https://www.facebook.com/intastellarsolutions",
                    "https://www.instagram.com/intastellar_solutions/",
                    "https://www.linkedin.com/company/49144439/",
                    "https://g.page/intastellar?we"
                ],
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Rendbjergvej 19 st. tv.",
                    "addressRegion": "Syd Danmark",
                    "postalCode": "6320",
                    "addressCountry": "DK"
                },
                "email": "info@intastellar.com",
                "founder": "Felix A. Schultz",
                "foundingDate": "20.08.2020",
                "foundingLocation": "Egernsund, Denmark"
            }
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4WV9WHRH6N"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('require', 'displayfeatures');
    gtag('config', 'G-4WV9WHRH6N');
    gtag('config', 'AW-993981125');
    function gtag_report_conversion(url) {
        var callback = function () {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-993981125/psLYCO6JitACEMXl-9kD',
            'event_callback': callback
        });
        return false;
    }
    </script>
</head>
<body>
<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/de-DE/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/de-DE/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        include($_SERVER["DOCUMENT_ROOT"]."/language/en-GB/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/en-GB/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else{
    	include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/privacy-container.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }
    include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
?>