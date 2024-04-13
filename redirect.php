<?
    if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    $region = "dk-DK";
    $lang = $_COOKIE["region"];
    } else if (isset($_COOKIE["region"])) {
    $region = $_COOKIE["region"];
    $lang = $_COOKIE["region"];
    } else if ($_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $region = "de-DE";
    $lang = "de-DE";
    } else {
    $region = "dk-DK";
    $lang = "da-DK";
    }
    
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
    
    if(in_array("Denmark", $access) && !isset($_COOKIE["region"]) && $_SERVER["HTTP_HOST"] !== "www.fahrradfaehre.info"){
    $region = "dk-DK";
    $lang = "da-DK";
    $_COOKIE["region"] = $lang;
    }else if(in_array("Germany", $access) && !isset($_COOKIE["region"]) || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info"){
    $region = "de-DE";
    $lang = "de-DE";
    $_COOKIE["region"] = $region;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please wait, we are redirecting you...</title>
    <script src="https://apis.intastellarsolutions.com/js/gdpr-banner.js"></script>
    <script>
        window.INTA = {
        policy_link: "https://www.cykelfaergen.info/om-os/legal/privacy",
        settings: {
            color: "rgb(4, 108, 109)",
            keepInLocalStorage: ["hideInfoBanner"],
            logo: "https://www.cykelfaergen.info/assets/logo/logo.svg",
            advanced: true
        }
        }
    </script>
    <!-- LinkedIn tracking -->
    <script>
        _linkedin_partner_id = "3672001";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
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
        <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3672001&fmt=gif" />
    </noscript>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4WV9WHRH6N"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer = window.dataLayer || [];

        function gtag() {
        dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('require', 'displayfeatures');
        gtag('config', 'G-0ZKBM596KH');
        gtag('config', 'AW-993981125');
        gtag('set', {'user_id': 'USER_ID'});
    </script>
    <!-- Clarity tracking code for https://www.cykelfaergen.info/ -->
    <script>
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
    <!-- Facebook Pixel Code -->
    <script>
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
        
        fbq('trackCustom', 'initiate checkout', { product: "<?= $_GET["link"]?>", currency: 'DKK', value: 100});
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=485180705471322&ev=PageView&cd[value]=0.00&cd[currency]=DKK&noscript=1" /></noscript>
    <noscript>
        <p>This site is best viewed with Javascript. <a href="<?= $_GET["link"]?>" target="_blank">Visit booking page</a></p>
    </noscript>
</head>
<body>
    <!-- <a id="link" style="display: none;" href="<?= $_GET["link"]?>" target="_blank"></a> -->
    <?
        if($lang == "de-DE"){
            echo '<p>Wir leiten Sie weiter... bitte warten...</p>
            <p>Wenn Sie nicht nach 1 sekunde automatisch weitergeletitet werden <a href="'.$_GET["link"].'" target="_blank">dann klicken Sie bitte hier.</a></p>';
        }else if($lang == "en-GB"){
            echo '<p>We are currently redirecting you... please wait...</p>
            <p>If you aren´t being redirected after 1 second <a href="'.$_GET["link"].'" target="_blank">please click here.</a></p>';
        }else{
            echo '<p>Vi er ved at sende dig til booking... vent venligst...</p>
            <p>Hvis du ikke bliver automatisk viderstillet efter 1 sekund, se om pop-up vinduer er blockeret ellers <a href="'.$_GET["link"].'" target="_blank">klik her.</a></p>';
        }
    ?>
    <script>
        window.location.href = "<?= $_GET["link"]?>";
    </script>
</body>
</html>