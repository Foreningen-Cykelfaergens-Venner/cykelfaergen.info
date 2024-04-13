<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8")?>">
    <meta name="copyright" content="Copyright <?= date("Y");?> Intastellar Solutions, International. All rights reserved.">
    <meta property="og:title" content="<?= $main_title;?> | Cykelfærgen Pressroom" />
    <meta property="og:description" content="<?= mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8")?>" />
    <meta property="og:url" content="<?= $actual_link ?>" />
    <meta property="og:locale" content="da_DK" />
    <meta name="generator" content="Intastellar Solutions, International">
    <meta property="og:image" content="https://cykelfaergen.info/newsroom/news-img/<?= $img?>" />
    <meta property="og:image:width" content="419">
    <meta property="og:image:width" content="219">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Cykelfærgen" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8")?>">
    <meta name="twitter:title" content="<?= $main_title?> | Cykelfærgen Pressroom">
    <meta name="twitter:image" content="https://cykelfaergen.info/newsroom/news-img/<?= $img?>">
    <meta name="twitter:creator" content="@intastellarhold">
    <meta name="author" content="Cykelfærgen">
    <title>Quiz | Cykelfærgen Pressroom</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="/styles/reset.css" rel="stylesheet">
    <link href="/styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/pressroom.css">
    <link rel="stylesheet" href="/styles/mobile.css">
    <link rel="alternate" hreflang="de-de" href="https://www.fahrradfaere.info<?= $_SERVER["REQUEST_URI"];?>">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://www.intastellarsolutions.com/js/cookie-banner.js?v=<?= time();?>"></script>
    <script data-ad-client="ca-pub-0127874455675391" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="/js/setLocation.js"></script>
    <script src="/js/slider.js" defer></script>
    <script src="/js/quiz.js" defer></script>
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
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/257fb44c07fe52bc2826eb427/89c7446f20806698fbe33555c.js");</script>
</head>
<body>
    <article class="quiz"></article>
    <button id="submit">Submit Quiz</button>
    <div id="results"></div>
</body>
</html>