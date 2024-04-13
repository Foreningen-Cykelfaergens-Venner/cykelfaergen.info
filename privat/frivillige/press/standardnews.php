<?
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require($_SERVER["DOCUMENT_ROOT"] . "/admin/classes/link-generator.php");
	//echo ini_get('display_errors');

	$pieces = explode("/", $_SERVER['REQUEST_URI']);
	
    $title = end($pieces);

	$host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($host, $username, $password, $dbname);
	$sql = "SELECT * FROM newsroom WHERE link_title = '".$title."'";
	$query = mysqli_query($db, $sql);

	if(mysqli_num_rows($query) == 0){
		header("Location: /ecommerce/news/");
	}

	// gets the user IP Address
	$user_ip=$_SERVER['REMOTE_ADDR'];

	$actual_link = "http://". $_SERVER["HTTP_HOST"]."". $_SERVER["REQUEST_URI"];


	while($row = $query->fetch_assoc()){
		$main_title = $row["title"];
		$img = $row["img"];
        $imgDescription = $row["imgDescription"];

		$byline = $row["byline"];

		if(isset($_GET["fbclid"])){
			header("Location: ". $main_title);
		}
		$city = $row["place"];
		$str = $row["main_text"];

		$byline = turnUrlIntoHyperlink($byline);
		$str = turnUrlIntoHyperlink($str);

		$plain = explode("\r\n",$str);

		$plain = str_replace('"', '<blockquote>', $plain);
		$plain = str_replace('-', "<cite>", $plain);
		$plain = str_replace("<b>", "<strong>", $plain);
		$plain = str_replace("it</b>", "</strong>", $plain);

		$department = $row["department"];

		$category = $row["category"];
		$plublished = date("d.m.Y - H:i", strtotime($row["published_at"]));
		$plublished_by = $row["published_by"];
        $written_by = $row["written_by"];

		if(str_contains($department, "all")){
            $imgUrl = "https://www.intastellarsolutions.com/newsroom/news-img/";
            $author__url = "/";
			$newsRoomUrl = "/newsroom";
            $darkBG = "";
            $department = "Group";
		}else{
			$imgUrl = "https://www.intastellarsolutions.com/ecommerce/news/news-img/";
            $author__url = "https://www.intastellar-ecommerce.com";
			$newsRoomUrl = "https://www.intastellar-ecommerce.com/news/";
			$darkBG = "dark__bg";
            $department = "E-Commerce";
		}
	}
?>
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $byline?>">
    <meta name="copyright" content="Copyright 2021 Intastellar Solutions, International. All rights reserved.">
    <meta property="og:title" content="<?= $main_title?>" />
    <meta property="og:description" content="<?= $byline?>" />
    <meta property="og:url" content="<?= $_SERVER["HTTP_HOST"]?><?= $_SERVER["REQUEST_URI"]?>" />
    <meta property="og:locale" content="da_DK" />
    <meta property="og:image" content="<?= $imgUrl;?><?= $img;?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Intastellar E-Commerce Solutions" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= $byline?>">
    <meta name="twitter:title" content="<?= $main_title?>">
    <meta name="twitter:site" content="@intastellarhold">
    <meta name="twitter:image" content="<?= $imgUrl;?>/<?= $img;?>">
    <meta name="twitter:creator" content="@intastellarhold">
    <meta name="author" content="Intastellar Solutions, International">
    <title><?= $main_title?></title>
    <link rel="canonical" href="https://<?= $_SERVER["HTTP_HOST"]?><?= $_SERVER["REQUEST_URI"]?>" />
    <link href="https://www.intastellarsolutions.com/css/style.css?v=<?= time(); ?>" type="text/css" rel="stylesheet">
    <link href="https://www.intastellarsolutions.com/css/mobile.css?v=<?= time(); ?>" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.intastellarsolutions.com/css/newsroom.css?v=<?= time(); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi01N3g1Ny5wbmc=">
    <link rel="apple-touch-icon" sizes="60x60" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi02MHg2MC5wbmc=">
    <link rel="apple-touch-icon" sizes="72x72" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi03Mng3Mi5wbmc=">
    <link rel="apple-touch-icon" sizes="76x76" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi03Nng3Ni5wbmc=">
    <link rel="apple-touch-icon" sizes="114x114" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://assets.intastellar-clients.net/fav-icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://assets.intastellar-clients.net/fav-icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://assets.intastellar-clients.net/fav-icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://assets.intastellar-clients.net/fav-icon/favicon-16x16.png">
    <script src="https://apis.intastellarsolutions.com/js/gdpr-banner.js?v=<?= time(); ?>"></script>
    <script>
        var fbUrl = "https://www.facebook.com/sharer/sharer.php?u=https://www.intastellarsolutions.com";
    </script>
    <script type="text/javascript">
        _linkedin_partner_id = "3672617";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function() {
            var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";
            b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);
        })();
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3672617&fmt=gif" />
    </noscript>
    <script src="https://www.intastellarsolutions.com/js/script.js" defer></script>
    <script>
        window.INT = {
            policy_link: "https://www.intastellarsolutions.com/about/legal/privacy",
            settings: {
                color: "#003399",
                logo: "https://assets.intastellar-clients.net/fav-icon/favicon-96x96.png"
            }
        }
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.defer = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N6G38ST');
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://google.com/article"
      },
      "headline": "<?= $main_title;?>",
      "image": [
        "<?= $imgUrl;?>/<?= $img;?>"
      ],
      "datePublished": "<?= $plublished;?>",
      "author": {
        "@type": "Person",
        "name": "<?= $written_by?>",
		"url": "https://www.intastellarsolutions.com/author/<?= $written_by?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "<?= $plublished_by;?>",
        "logo": {
          "@type": "ImageObject",
          "url": "https://assets.intastellar-clients.net/bG9nb3MvaW50YXN0ZWxsYXJfc29sdXRpb25zQDJ4LnBuZw=="
        }
      }
    }
    </script>
    <script async defer src="https://www.googletagmanager.com/gtag/js?id=UA-179038498-1"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('require', 'displayfeatures');
        gtag('config', 'UA-179038498-1');
    </script>
    <script id="mcjs">
        ! function(c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/e3d702ca14b3c6f4d8df22d88/7c87b461b0c4f51d8a0648b3c.js");
    </script>
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
        fbq('init', '252914812670084');
        fbq('track', 'PageView');
    </script>
    <!-- Twitter universal website tag code -->
    <script>
        ! function(e, t, n, s, u, a) {
            e.twq || (s = e.twq = function() {
                    s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
                }, s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src = '//static.ads-twitter.com/uwt.js',
                a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
        }(window, document, 'script');
        // Insert Twitter Pixel ID and Standard Event data below
        twq('init', 'o699o');
        twq('track', 'PageView');
    </script>
    <!-- End Twitter universal website tag code -->
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=252914812670084&ev=PageView&noscript=1" /></noscript>
	</head>
	<body>
		 <!-- Google Tag Manager (noscript) -->
		 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N6G38ST" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!-- Landing page -->
		<!-- End of Landing page -->
		<!-- Header -->
		<? include($_SERVER["DOCUMENT_ROOT"]."/components/header.php"); ?>
		<!-- End of header -->
		<main class="container <?= $darkBG;?>">
            <section class="content">
                <header class="news-header">
                    <div style="font-size: 13px; padding: 10px 0px; margin-bottom: 20px;">
                        <a href="<?= $newsRoomUrl;?>">Newsroom</a> - <?= $category;?> - <?= $main_title; ?>
                    </div>
                    <p><?= $department;?></p>
                    <h1><?= $main_title;?></h1>
                    <span><?= $category;?>:</span>
                    <time class="date"><?= $plublished;?></time> 
                    <p><a href="<?= $author__url?>">Published by <?= $plublished_by;?></a></p>
                    <p role="author" rel="author">Written by: <?= $written_by;?></p>
                </header>
                <div class="over-img">
                    <img src="<?= $imgUrl;?>/<?= $img;?>" alt="<?= $imgDescription;?>">
                    <p><?= $imgDescription;?></p>
                </div>
                <article class="news-content">
                    <p style="font-weight: bolder;"><?= $byline; ?></p>
                    <?
                        foreach(array_filter($plain) as $text){
                            echo "<section>". $text ."</section>";
                        }
                ?>
                </article>
            </section>
		</main>
		<!-- Footer -->
		<? include($_SERVER["DOCUMENT_ROOT"]."/components/footer.php"); ?>
    	<!-- End of footer -->
	</body>
</html>