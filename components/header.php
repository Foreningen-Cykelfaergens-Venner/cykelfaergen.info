<?php
/* $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html"; */
$root = $_SERVER["DOCUMENT_ROOT"];

if (isset($_GET["page_id"]) || strpos($_SERVER["HTTP_HOST"], "de.") > -1 || strpos($_SERVER["HTTP_HOST"], "uk.") > -1) {
  header("HTTP/1.1 410 Gone");
  $_GET['error'] = "410";
  include($root . "/error.php");
  die();
}

if(http_response_code() !== 410){
  function getUserIP()
  {
      // Get real visitor IP behind CloudFlare network
      if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      }
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];

      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }

      return $ip;
  }

  function MyFunction(){
      $domain1 = "http://ip-api.com/json/";
      $domain = "http://api.ipstack.com/";
      $token = "?access_key=c5a4132fe501de20e58db6b03d30701e";
      $url = $domain1."".getUserIP()."";
      $ch = curl_init( $url );
      curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      # Return response instead of printing.
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
      # Send request.
      $result = curl_exec($ch);
      curl_close($ch);
      
      $user = json_decode($result, true);
      
      return $user;
  }

  $access = MyFunction();
  if(is_array($access) && in_array("Germany", $access) && strpos($_SERVER["HTTP_HOST"], "fahrradfaehre.info") == false 
    && strpos($_SERVER["HTTP_HOST"], "www.fahrradfaehre.info") == false 
      && array_shift(explode('.', $_SERVER['HTTP_HOST'])) != "verein"
        && array_shift(explode('.', $_SERVER['HTTP_HOST'])) != "booking"){
        header("Location: https://www.fahrradfaehre.info" . $_SERVER["REQUEST_URI"]);
  }/* else if(is_array($access) && !in_array("Germany", $access) && !in_array("Denmark", $access) && strpos($_SERVER["HTTP_HOST"], "bicycleferry.com") == false 
  && strpos($_SERVER["HTTP_HOST"], "www.bicycleferry.com") == false 
    && array_shift(explode('.', $_SERVER['HTTP_HOST'])) != "verein"
      && array_shift(explode('.', $_SERVER['HTTP_HOST'])) != "forening"
        && array_shift(explode('.', $_SERVER['HTTP_HOST'])) != "booking"){
      header("Location: https://www.bicycleferry.com" . $_SERVER["REQUEST_URI"]);
  } */

  if (isset($_COOKIE["region"])) {
    $region = $_COOKIE["region"];
    if($region === "da-DK"){
      $region = "dk-DK";
    }
    $lang = $_COOKIE["region"];
  } else if ($_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $region = "de-DE";
    $lang = "de-DE";
  } else if ($_SERVER["HTTP_HOST"] == "www.bicycleferry.com" && !isset($_COOKIE["region"])) {
    $region = "en-GB";
    $lang = "en-GB";
  } else if($_SERVER["HTTP_HOST"] == "press.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/" || $_SERVER["HTTP_HOST"] == "booking.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/" && !isset($_GET["region"])){
    $region = "de-DE";
    $lang = "de-DE";
  }else {
    $region = "dk-DK";
    $lang = "da-DK";
  }
  
  if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/" || isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "https://www.bicycleferry.com/"){
    $mainHost = preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_REFERER"]);
  }else {
    $mainHost = preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
  }

  /* if(is_array($access) && in_array("Denmark", $access) && !isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] !== "www.fahrradfaehre.info" && $_SERVER['HTTP_REFERER'] !== "https://www.fahrradfaehre.info/" && !isset($_COOKIE["region"])){
    $region = "dk-DK";
    $lang = "da-DK";
    $_COOKIE["region"] = $lang;
  } else if(is_array($access) && in_array("Germany", $access) && !isset($_COOKIE["region"]) || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])){
    $region = "de-DE";
    $lang = "de-DE";
    $_COOKIE["region"] = $lang;
  } else if(is_array($access) && !in_array("Germany", $access) && !in_array("Denmark", $access) && !isset($_COOKIE["region"]) || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com" && !isset($_COOKIE["region"])){
    $region = "en-GB";
    $lang = "en-GB";
    $_COOKIE["region"] = $lang;
  } else if(is_array($access) && in_array("Denmark", $access) && !isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] == "booking.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/" && $_SERVER["HTTP_HOST"] == "press.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/" && !isset($_GET["region"])){
    $region = "de-DE";
    $lang = "de-DE";
  } else if(is_array($access) && in_array("Denmark", $access) && !isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] == "booking.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.bicycleferry.com/" && $_SERVER["HTTP_HOST"] == "press.cykelfaergen.info" && $_SERVER['HTTP_REFERER'] == "https://www.bicycleferry.com/" && !isset($_GET["region"])){
    $region = "en-GB";
    $lang = "en-GB";
  } */

}

$img = "https://".$mainHost."/assets/og_images/cykelfærgen-og-main.jpg";

if (strpos($_SERVER["REQUEST_URI"], "pressroom") !== false) {
  $img = "https://".$mainHost."/newsroom/news-img/" . $newsBanner ."?v=". time();
} else if (strpos($_SERVER["REQUEST_URI"], "stoet-os") !== false || strpos($_SERVER["HTTP_HOST"], "forening.cykelfaergen.info") !== false || strpos($_SERVER["HTTP_HOST"], "verein.cykelfaergen.info") !== false) {
  if($img == null){
    $img = "https://".$mainHost."/assets/og_images/foreningen.jpg?v=". time();
  }
}else if($img == null || $img == ""){
  $img = "https://".$mainHost."/assets/og_images/cykelfærgen-og-main.jpg";
}

if (strpos($_SERVER["HTTP_HOST"], "forening.cykelfaergen.info") !== false || strpos($_SERVER["HTTP_HOST"], "verein.cykelfaergen.info") !== false) {
  $style = '<link rel="stylesheet" href="/css/style.css?v="'. time().'>';
} else {
  $style = "";
}

if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") !== false){
  $tourdefranceClass = "tourdefrance";
  $hidden = "tdfhidden";
}else if(strpos($_SERVER["REQUEST_URI"], "faehre-flensburg-sonderburg") !== false){
  $tourdefranceClass = "main-header-transparent";
}else{
  $tourdefranceClass = "";
  $hidden = "";
}

if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") !== false){
  $tourdefrance = '<link rel="stylesheet" href="/styles/tourdefrance/tour.css?v='.time().'">';
}else{
  $tourdefrance = "";
}
$price = "100,00";

include($root . "/db.php");
$tysk = "";

if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
  if($_SERVER["SCRIPT_NAME"] == "/index.php" && $_SERVER["HTTP_HOST"] !== "booking.cykelfaergen.info"){
    $title = "På ferie i Tyskland på kun en 25 min. færgetur | Cykelfærgen Flensborg fjord";
    $description = "Cykelfærgen Flensborg fjord forbinder Danmark og Tyskland på sø vejen. Sejl mellem Egernsund, Brunsnæs, Sønderhav, Langballigau og Flensborg. Vi sejler i sæsonen daglig mellem Egernsund og Langballigau.";
  }
    $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
    $oglocale = "da_dk";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    if($_SERVER["SCRIPT_NAME"] == "/index.php" && $_SERVER["HTTP_HOST"] !== "booking.cykelfaergen.info"){
      $title = "Ab in die Ferien nach Dänemark, mit einer 25 minuten Fährefahrt | Fahrradfähre Flensburger Förde";
      $description = "Die Fahrradfähre Flensburger Förde verbindet Dänemark und Deutschland auf dem Seeweg. Segeln Sie zwischen Egernsund, Brunsnæs, Sønderhav, Langballigau und Flensburg. Während der Saison verkehren wir täglich zwischen Egernsund und Langballigau.";
    }
    $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
    $btn_info = "Akzeptiren und fortfahren";
    $close_btn = "Schließen";
    $oglocale = "de_DE";
    $tysk = "-tysk";
} else if (
  isset($_COOKIE["region"]) 
  && $_COOKIE["region"] == "en-GB"
  || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com"
  && !isset($_COOKIE["region"])
) {
  if($_SERVER["SCRIPT_NAME"] == "/index.php" && $_SERVER["HTTP_HOST"] !== "booking.cykelfaergen.info"){
    $title = "On holiday in Germany or Denmark in just a 25 min. ferry ride | Bicycle ferry Flensburg Fjord";
    $description = "The cycle ferry Flensburg Fjord connects Denmark and Germany by sea. Sail between Egernsund, Brunsnæs, Sønderhav, Langballigau and Flensburg. During the season, we sail daily between Egernsund and Langballigau.";
  }
    $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accept and continue";
    $close_btn = "Close";
    $oglocale = "en_GB";
} else {
  if($_SERVER["SCRIPT_NAME"] == "/index.php" && $_SERVER["HTTP_HOST"] !== "booking.cykelfaergen.info"){
    $title = "På ferie i Tyskland på kun en 25 min. færgetur | Cykelfærgen Flensborg fjord";
    $description = "Cykelfærgen Flensborg fjord forbinder Danmark og Tyskland på sø vejen. Sejl mellem Egernsund, Brunsnæs, Sønderhav, Langballigau og Flensborg. Vi sejler i sæsonen daglig mellem Egernsund og Langballigau.";
  }
    $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
    $btn_info = "Accepteret og fortsæt";
    $close_btn = "Luk";
    $oglocale = "da_dk";
}

$adsIDFahrradfaehreInfo = "ca-pub-0127874455675391";
$adsIDCykelfaergenInfo = "ca-pub-0127874455675391";
$fbClId = "";
if(isset($_GET["fbclid"])){
  $fbClId = "&fbclid=" . $_GET["fbclid"];
}

?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
  <link rel="preconnect" href="https://downloads.intastellarsolutions.com">
  <link rel="preconnect" href="https://consents.cdn.intastellarsolutions.com">
  <script src="https://downloads.intastellarsolutions.com/cookieconsents/cykelfaergen.info/config.js"></script>
  <!-- <script src="https://consents.cdn.intastellarsolutions.com/uc.js"></script> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="copyright" content="Copyright <?= date("Y") ?> Foreningen Cykelfærgen´s Venner. All rights reserved.">
  <meta name="Webdeveloper" content="Intastellar Solutions, International">
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:description" content="<?= $description ?>" />
  <meta property="og:url" content="https://<?= $_SERVER["HTTP_HOST"];?><?= $_SERVER["REQUEST_URI"] ?>" />
  <meta property="og:locale" content="<?= $oglocale?>" />
  <meta property="og:image" content="<?= $img; ?>" />
  <meta property="og:image:width" content="1200px" />
  <meta property="og:image:height" content="630px" />
  <meta property="og:image:secure_url" content="<?= $img; ?>" /> 
  <meta property="og:image:type" content="image/jpeg" /> 
  <meta property="og:image:atl" content="" /> 
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Cykelfærgen Flensborg Fjord" />
  <meta property="fb:pages" content="102368248043194">
  <meta property="ia:markup_url" content="https://<?= $_SERVER["HTTP_HOST"];?>">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?= $title ?>">
  <meta name="twitter:description" content="<?= $description ?>">
  <meta name="twitter:site" content="@cykelfaergen">
  <meta name="twitter:image" content="<?= $img; ?>">
  <meta name="twitter:creator" content="@cykelfærgen">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="https://www.cykelfaergen.info/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <meta name="facebook-domain-verification" content="ly0ck4yypwbkrqpu0sxs041hkk3n4f" />
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/slider.css">
  <?= $tourdefrance;?>
  <?php if (strpos($_SERVER["REQUEST_URI"], "om-os/forening") !== false || strpos($_SERVER["HTTP_HOST"], "forening.cykelfaergen.info") !== false || strpos($_SERVER["HTTP_HOST"], "verein.cykelfaergen.info") !== false) { ?>
    <link rel="stylesheet" href="/styles/forening.css">
  <?php } ?>
  <?= $style; ?>
  <link rel="stylesheet" href="/styles/pressroom.css">
  <link rel="stylesheet" href="/styles/mobile.css">
  <link rel="alternate" hreflang="x-default" href="https://www.cykelfaergen.info<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="de-de" href="https://www.fahrradfaere.info<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="de-at" href="https://www.fahrradfaere.info<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="de-ch" href="https://www.fahrradfaere.info<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="da-dk" href="https://www.cykelfærgen.dk<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="sv-se" href="https://www.cykelfærgen.dk<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="nb-no" href="https://www.cykelfærgen.dk<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="en-gb" href="https://www.bicycleferry.com<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="en-us" href="https://www.bicycleferry.com<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="en-au" href="https://www.bicycleferry.com<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="en-ca" href="https://www.bicycleferry.com<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="alternate" hreflang="en-in" href="https://www.bicycleferry.com<?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="apple-touch-icon" sizes="57x57" href="https://<?= $mainHost;?>/assets/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="https://<?= $mainHost;?>/assets/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="https://<?= $mainHost;?>/assets/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="https://<?= $mainHost;?>/assets/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="https://<?= $mainHost;?>/assets/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="https://<?= $mainHost;?>/assets/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="https://<?= $mainHost;?>/assets/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="https://<?= $mainHost;?>/assets/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="https://<?= $mainHost;?>/assets/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://<?= $mainHost;?>/assets/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://<?= $mainHost;?>/assets/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="https://<?= $mainHost;?>/assets/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://<?= $mainHost;?>/assets/icons/favicon-16x16.png">
  <link rel="canonical" href="https://<?= $_SERVER["HTTP_HOST"];?><?= $_SERVER["REQUEST_URI"]; ?>">
  <link rel="stylesheet" href="https://<?= $mainHost;?>/styles/fonts/Material-Icons.css?v=1.<?= time();?>">
  <link rel="stylesheet" href="https://<?= $mainHost;?>/styles/fonts/Roboto.css?v=1.<?= time();?>">
  <link rel="stylesheet" href="https://<?= $mainHost;?>/styles/fonts/Bellefair.css?v=1.<?= time();?>">
  <link rel="stylesheet" href="https://<?= $mainHost;?>/styles/fonts/Raleway.css?v=1.<?= time();?>">
  <script src="https://kit.fontawesome.com/bf8a30ff13.js" crossorigin="anonymous"></script>
  <style>
  .material-symbols-outlined {
    font-variation-settings:
    'FILL' 1,
    'wght' 400,
    'GRAD' 0,
    'opsz' 40
  }
  </style>
  <script src="https://<?= $mainHost;?>/js/min/final.min.js" defer></script>
  <script src="https://<?= $mainHost;?>/js/min/reviews.min.js" defer></script>
  <script src="https://<?= $mainHost;?>/js/jquery.min.js"></script>
  <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0127874455675391"
     crossorigin="anonymous"></script> -->
  <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "VideoObject",
        "name": "Cykelfærgen på Flensborg fjord sejler forbi Holnis",
        "description": "Som passiv medlem støtter du Foreningen Cykelfærgen´s Venner og der med Cykelfærgen på Flensborg fjord. Dit bidrag hjælper foreningen til at udvikle vider på konceptet.",
        "thumbnailUrl": [
          "https://www.cykelfaergen.info/assets/Screenshot 2022-10-12 at 10.26.24.png"  
        ],
        "uploadDate": "2022-01-12T15:00+2:00",
        "duration": "PT1M04S",
        "contentUrl": "https://<?php echo $mainHost; ?>/assets/vid/cykelfaergen-reklame<?php echo $tysk; ?>.mp4"
      }
    </script>
  <?php if (strpos($_SERVER["REQUEST_URI"], "om-os/forening") !== false) { ?>
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "Passiv medlem",
        "image": "https://www.cykelfaergen.info/assets/Screenshot 2022-10-12 at 10.26.24.png",
        "description": "Som passiv medlem støtter du Foreningen Cykelfærgen´s Venner og der med Cykelfærgen på Flensborg fjord. Dit bidrag hjælper foreningen til at udvikle vider på konceptet.",
        "brand": {
          "@type": "Brand",
          "name": "Foreningen Cykelfærgen´s Venner"
        },
        "offers": {
          "@type": "Offer",
          "price": "<?= str_replace(",00", "", $price); ?>",
          "priceCurrency": "DKK",
          "availability": "https://schema.org/InStock"

        }
      }
    </script>
  <?php } ?>
  <!-- Clarity tracking code for https://www.cykelfaergen.info/ -->
  <script type="text/plain">
    (function(c, l, a, r, i, t, y) {
      c[a] = c[a] || function() {
        (c[a].q = c[a].q || []).push(arguments)
      };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i + "?ref=bwt";
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "8zhlx6lveh");
  </script>
  <script type="text/plain">
    _linkedin_partner_id = "4974826";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
  </script><script type="text/plain">
    (function(l) {
    if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
    window.lintrk.q=[]}
    var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})(window.lintrk);
  </script>
  <noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=4974826&fmt=gif" />
  </noscript>
  <?php if (strpos($_SERVER["REQUEST_URI"], "om-os/forening") === false || strpos($_SERVER["HTTP_HOST"], "verein.cykelfaergen.info") !== false) { ?>
    <script type="text/javascript">
        window.omnisend = window.omnisend || [];
        omnisend.push(["accountID", "644e2f87bc57b9e241620fa1"]);
        omnisend.push(["track", "$pageViewed"]);
        !function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://omnisnippet1.com/inshop/launcher-v2.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();
    </script>

  <?php } ?>
  <!-- Google Tag Manager -->
  <!-- Google Tag Manager -->
  <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-W7VD4JK');</script> -->
<!-- End Google Tag Manager -->
  <!-- End Google Tag Manager -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-4WV9WHRH6N" type="text/javascript"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('set', 'linker', {
      domains: [
        "fahrradfaehre.info",
        "cykelfærgen.info",
        "alsturbaade.teambooking.dk",
        "cykelfaergen.info",
        "bicycleferry.com",
      ]
    })
    gtag("set", "allow_google_signals", true);
    gtag('js', new Date());
    gtag('require', 'displayfeatures');
    gtag('config', 'G-0ZKBM596KH');
    gtag('config', 'AW-993981125');

  </script>
  <!-- Facebook Pixel Code -->
  <script type="text/javascript">
      ! function(f, b, e, v, n, t, s) {
          if (f.fbq) return;
          n = f.fbq = function() {
              n.callMethod ?
                  n.callMethod.apply(n, arguments) : n.queue.push(arguments)
          };
          if (!f._fbq) f._fbq = n;
          n.push = n;
          n.loaded = !0;
          n.version = '2.0';
          n.queue = [];
          t = b.createElement(e);
          t.async = !0;
          t.src = v;
          s = b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
          'https://connect.facebook.net/en_US/fbevents.js');
      
      fbq('init', '485180705471322');
      fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=485180705471322&ev=PageView&cd[value]=0.00&cd[currency]=DKK&noscript=1" /></noscript>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Corporation",
      "name": "Cykelfærgen Flensborg fjord",
      "alternateName": [
        "Cykelfærgen Danmark-Tyskland",
        "Fahrradfähre Rødsand",
        "Fahrradfähre Flensburger Förde",
        "Cykelfærgen Rødsand",
        "Fähre zwischen Dänemark & Deutschland"
      ],
      "url": "https://<?= $mainHost;?>",
      "logo": "https://<?= $mainHost;?>/assets/logo/logo.svg",
      "sameAs": [
        "https://www.facebook.com/cykelfargen",
        "https://www.instagram.com/cykelfaergen.flensborg.fjord/"
      ],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "HavnePladsen",
        "addressRegion": "Syd Danmark",
        "postalCode": "6320",
        "addressCountry": "DK"
      },
      "email": "info@cykelfaergen.info",
      "founder": "Gerhard Jacobsen",
      "foundingLocation": "Brunsnæs, Denmark"
    }
  </script>
  <?php if ($_SERVER["REQUEST_URI"] == "/") { ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
          "@type": "Question",
          "name": "Hvordan ser coronaregler ud?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<p><strong>Regler for Tyskland</strong></p> <
            p > Maksepligt i rum og restaurants,
            butikker og museer.Der skal man efterlade kontaktinformationer. < /p> <
            p > < strong > Regeler
            for Danmark < /strong></p >
            <
            p > Ingen maksepligt,
            kun i kollektive trafik.I restaurants skal efter ønske kunne vises Coronapas eller en negativ test. < /p>"
          }
        }, {
          "@type": "Question",
          "name": "Hvor kan jeg købe billetter?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Du kan købe dine billeter på <a href=https://www.booksonderjylland.dk>www.booksonderjylland.dk</a>. Glem ikke en billet til hver cykel!
            Så er de reserveret og online betalt via kredit kortet.
            Der er også muligheden at komme forbi og hoppe ombord så længe pladser er ledigt "
          }
        }, {
          "@type": "Question",
          "name": "Skal jeg medbringe min pas?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<p>Det er krav at med bringe pas når du skal krydse grænsen</p>"
          }
        }, {
          "@type": "Question",
          "name": "Hvornår skal jeg møde op?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Du skal står 20 minutter inden afgangen klar, til at kunne vise en gyldigt billet. Billettet kan enten være printet, på mobiltelefon eller tablet."
          }
        }, {
          "@type": "Question",
          "name": "Kan man købe drikkevarer ombord?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ja, kolde øl og vand til små penge!"
          }
        }, {
          "@type": "Question",
          "name": "Hvornår er sidste dag?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Vi sejler t.o.m. den <time date=2021-08-15>15 August 2021</time>"
          }
        }, {
          "@type": "Question",
          "name": "Må jeg have min hund med ombord?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ja, du må have en hund med ombord. Du skal bare huske at papierne til din Hund skal være i orden."
          }
        }]
      }
    </script>

  <?php }
  if (strpos($_SERVER["REQUEST_URI"], "pressroom") !== false) { ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "<?= htmlentities($jsonHeadline) ?>",
        "url": "<?= $_SERVER["REQUEST_URI"]?>",
        "isAccessibleForFree": "True",
        "description": "<?= htmlentities($jsonDescription) ?>",
        "image": [
          "<?= $img; ?>"
        ],
        "datePublished": "<?= $jsonLDPublished ?>",
        "dateModified": "<?= $jsonLDUpdated ?>",
        "author": {
          "@type": "Person",
          "name": "<?= htmlentities($jsonLDPublishedBy) ?>",
          "url": ""
        },
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?= $_SERVER["REQUEST_URI"]?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Foreningen Cykelfærgen´s Venner",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.cykelfaergen.info/assets/logo/logo.svg"
          }
        }
      }
    </script>
  <?php } ?>
</head>

<body>
  <script src="https://cykelfaergenflensborgfjord.statuspage.io/embed/script.js"></script>
    <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7VD4JK"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->
  <section class="test">
    <?php include($root. "/functions/info.php");?>
  </section>
  <?php
    include($root . "/language/" . $region . "/header.php");
    if($_SERVER["HTTP_HOST"] != "booking.cykelfaergen.info"){
      include($_SERVER["DOCUMENT_ROOT"] . "/components/modal.php");
    }
  ?>