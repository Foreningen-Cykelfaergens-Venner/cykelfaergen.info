<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Foreningen Cykelfaergen's | Bicycle ferry Rødsand";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Foreningen Cykelfaergen's Venner";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="copyright" content="Copyright <?= date("Y")?> Intastellar Solutions, International. All rights reserved.">
    <meta name="intastellar-platform-api_id" content="d2eefd7f1564fa4c9714000456183a6b0f51e8c9519e1089ec41ce905ffc0c453dfac91ae8645c41ebae9c59e7a6e5233b1339e41a15723a9ba6d934bbb3e92d.apps.intastellar.com">
    <meta property="og:title" content="<?= $title?>" />
    <meta property="og:description" content="Foreningen Cykelfærgens Venner, skal fremover sikre drift og udvikling af det nuværende koncept med færgen ”Rødsand”, der ejes af skipper Palle Heinrich." />
    <meta property="og:url" content="https://www.cykelfaergen.info<?= $_SERVER["REQUEST_URI"]?>" />
    <meta property="og:locale" content="da_DK" />
    <meta property="og:image" content="https://cykelfaergen.info/newsroom/news-img/IMG_1753.jpg" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $title?>" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Foreningen Cykelfærgens Venner, skal fremover sikre drift og udvikling af det nuværende koncept med færgen ”Rødsand”, der ejes af skipper Palle Heinrich.">
    <meta property="fb:pages" content="1636555379700812">
    <meta property="ia:markup_url" content="https://www.cykelfaergen.info">
    <meta name="twitter:title" content="<?= $title?>">
    <meta name="twitter:site" content="@intastellarhold">
    <meta name="twitter:image" content="https://cykelfaergen.info/newsroom/news-img/IMG_1753.jpg">
    <meta name="twitter:creator" content="@intastellarhold">
    <title><?= $title?></title>
    <meta name="description" content="Foreningen Cykelfærgens Venner, skal fremover sikre drift og udvikling af det nuværende koncept med færgen ”Rødsand”, der ejes af skipper Palle Heinrich.">
  	<link rel="stylesheet" href="/styles/reset.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/forening.css">
    <link rel="stylesheet" href="/styles/mobile.css">
    <link rel="alternate" hreflang="de-de" href="https://www.fahrradfaere.info<?= $_SERVER["REQUEST_URI"];?>">
    <link rel="alternate" hreflang="da-dk" href="https://www.cykelfaergen.info<?= $_SERVER["REQUEST_URI"];?>">
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
    <script src="/js/nav.js" defer></script>
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-TQD9LFB"></script>
    <script>
        (function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"56377186"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");
        window.uetq = window.uetq || [];
        window.addEventListener("DOMContentLoaded", ()=>{
            window.uetq.push('event', 'click', {'event_category': 'cart', 'event_label': 'aria-label', 'event_value': document.querySelectorAll(".btn[aria-label]").value});
        });
    </script>
    <script type="text/javascript">
        _linkedin_partner_id = "3672617";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function(){var s = document.getElementsByTagName("script")[0];
        var b = document.createElement("script");
        b.type = "text/javascript";b.async = true;
        b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
        s.parentNode.insertBefore(b, s);})();
    </script>
    <!-- Twitter universal website tag code -->
    <script>
    !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
    },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
    a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
    // Insert Twitter Pixel ID and Standard Event data below
    twq('init','o699o');
    twq('track','PageView');
    </script>
    <!-- End Twitter universal website tag code -->
    <!-- Clarity tracking code for https://www.cykelfaergen.info/ --><script>    (function(c,l,a,r,i,t,y){        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);    })(window, document, "clarity", "script", "8zhlx6lveh");</script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3672617&fmt=gif" />
    </noscript>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "Corporation",
            "name": "Cykelfærgen Rødsand",
            "alternateName": [
                "Cykelfærgen Danmark-Tyskland",
                "Fahrradfähre Rødsand"   
            ],
            "url": "<?= $_SERVER["HTTP_HOST"]?>",
            "logo": "https://assets.intastellar-clients.net/bG9nb3MvaW50YXN0ZWxsYXJfc29sdXRpb25zQDJ4LnBuZw==",
            "sameAs": [
                "https://www.facebook.com/cykelfargen",
                "https://www.instagram.com/cykelfaergen.rodsand/"
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Havnepladsen 1",
                "addressRegion": "Syd Danmark",
                "postalCode": "6320",
                "addressCountry": "DK"
            },
            "email": "booking@cykelfaergen.info",
            "founder": "Gerhard Jacobsen",
            "foundingLocation": "Brunsnæs, Denmark"
        }
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4WV9WHRH6N"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
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
    <script>
        window.INT = {
            key: "6836650698",
            settings: {
                color: "rgb(4, 108, 109)",
                keepInLocalStorage: ["hideInfoBanner"]
            }
        }
    </script>
</head>
<body>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/forening.php");
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
    ?>
</body>
</html>