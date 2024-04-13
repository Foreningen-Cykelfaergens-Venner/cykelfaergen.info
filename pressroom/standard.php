<?
	//$_SERVER['REQUEST_URI'];
	/* ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); */
	//require($_SERVER["DOCUMENT_ROOT"] . "/admin-panel/classes/link-generator.php");
	//echo ini_get('display_errors');
	/* if(!isset($_COOKIE["region"])){
		$domain = preg_replace('#^www\.(.+\.)#i', '$1', $url);
        $expires = strtotime(date("Y-D-M H:i:s"), "+30 Days");

        setcookie("region", "dk-DK", $expires, "/", $domain);
		header("Refresh: 0");
	} */

	function addhttp($url) {
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "https://" . $url;
		}
		return $url;
	}

	function makeUrltoLink($txt) {
		// The Regular Expression filter

		/* $preg = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
		$site = preg_replace( "#^[^:/.]*[:/]+#i", "", preg_replace( "{/$}", "", urldecode( urlencode($match[0][0]) ) ) );
		$site = "https://www.".str_replace("www.", "", $site); */

		$reg_pattern = "/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,7}(\:[0-9]+)?(\/\S*)?/";

		return preg_replace($reg_pattern, '<a href=$0 target=_blank rel=noopener noreferrer>$0</a>', $txt);
	}

	if($_COOKIE["region"] == "da-DK"){
		setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));
	}else if($_COOKIE["region"] == "de-DE"){
		setlocale(LC_TIME, array('de_DE.UTF-8','de_DE@euro','de_DE','german'));
	}else{
		setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));
	}

	$url = $_SERVER['REQUEST_URI'];
	$site = preg_replace('/\?.*/', '', $url);

	$pieces = explode("/", $site);
	$site_title = $pieces[4];
	$server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
	$sql = mysqli_query($db, "SELECT * FROM newsroom WHERE published = 1 AND link_title = '".$site_title."'");

	$num = mysqli_num_rows($sql);

	if($num == 0) {
		http_response_code(404);
		$_GET["error"] = "404";
		include_once($_SERVER["DOCUMENT_ROOT"]."/error.php");
		die();
	}

	// gets the user IP Address
	$user_ip=$_SERVER['REMOTE_ADDR'];

	$actual_link = "https://". $_SERVER["HTTP_HOST"]."". $_SERVER["REQUEST_URI"];

	if($_COOKIE["region"] == "de-DE"){
		$b = "Geschrieben von";
	}else if($_COOKIE["region"] == "da-DK"){
		$b = "skrevet af";
	}else if($_COOKIE["region"] == "en-GB"){
		$b = "written by";
	}else{
		$b = "skrevet af";
	}

	function isJSON($string){
		return is_string($string) && is_array(json_decode($string, true)) ? true : false;
	 }

	while($row = $sql->fetch_assoc()){
		if(isset($_GET["fbclid"])){
			header("Location: ". $row["link_title"]);
		}


		$main_title1 = mb_convert_encoding($row["title"], 'UTF-8', 'HTML-ENTITIES');

		$main_title = mb_convert_encoding($main_title1, "HTML-ENTITIES", "UTF-8");

		$byTitle = mb_convert_encoding(mb_convert_encoding($row["bytitle"], 'UTF-8', 'HTML-ENTITIES'), "HTML-ENTITIES", "UTF-8");

		$title = $main_title;
		$byline = $row["byline"];
		$byline = mb_convert_encoding($byline, 'UTF-8', 'HTML-ENTITIES');
		$description = mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8");

		$newsBanner = $row["img"];

		$newsBannerDownload = str_replace("-min", "", $newsBanner);
		
		$city = mb_convert_encoding($row["place"], 'UTF-8', 'HTML-ENTITIES');
		$city = mb_convert_encoding($city, "HTML-ENTITIES", "UTF-8");
		$str = $row["main_text"];

		if(preg_match('/(?<=^|\s)@(\w+)/', $str, $match)){
			$str = str_replace($match[0], "<a href='/".$match[1]."'>".$match[0]."</a>", $str);
		}


		$plain = explode("\r\n",$str);
		$copy = explode("\r\n",$str);
		  
		
		$plain = str_replace("<b>", "<strong>", $plain);
		$plain = str_replace("</b>", "</strong>", $plain);

		$category = $row["category"];
		$plublished = strftime("%e. %B %Y", strtotime($row["published_at"]));
		
		$plublished_by1 = mb_convert_encoding($row["published_by"], 'UTF-8', 'HTML-ENTITIES');
		$plublished_by = mb_convert_encoding($plublished_by1, "HTML-ENTITIES", "UTF-8");
		$photocredit = $row["photocredit"];
		
		$photocredit = mb_convert_encoding($photocredit, 'UTF-8', 'HTML-ENTITIES');

		$jsonLDPublishedBy = $plublished_by1;
		$jsonHeadline = $main_title1;
		$jsonDescription = $byline;
		$jsonLDPublished = date(DATE_ISO8601, strtotime($row["published_at"]));
		$jsonLDUpdated = date(DATE_ISO8601, strtotime($row["published_at"]));

		$images = $row["images"];
		/* $images = json_decode($images,true); */
		if(isJson($images) == 1){
			$images = json_decode($images,true);	
		}else{
			gettype($row["images"]);
			$images = explode(",",$row["images"]);
			/* $images = json_decode($images,true); */
			/* print_r($images); */
		}

		$f = $plain[0];

		$copyTitle = $row["title"];
		$copyByline = $row["byline"];

		if(strpos($category, "Presse") !== false){
			$style = "class='press'";
		}else{
			$style = "class='update'";
		}
	}

	$imageSlider = "";
	$zip = new ZipArchive();

	if ($zip->open('/newsroom/news-img/allimages.zip', ZipArchive::CREATE) === TRUE)
	{
		
		$zipFile = "allimages.zip";
		// Add files to the zip file
		$zip->addFile($downloadFile);
		// All files are added, so close the zip file.
		/* echo "numFiles: " . $zip->numFiles . "\n";
echo "status: " . $zip->status  . "\n";
echo "statusSys: " . $zip->statusSys . "\n";
echo "filename: " . $zip->filename . "\n";
echo "comment: " . $zip->comment . "\n"; */
		if(is_array($images)){
			if(count($images) > 1){
				$imageSlider = "<article class='news__image-slider'>";
				foreach($images as $image){
					$images1 = $image;
					$image = $images1[0];
					$credit = $images1[1];
					$imageDescription = $images1[2];
					if($imageDescription !== ""){
						$im = mb_convert_encoding($imageDescription, 'UTF-8', 'HTML-ENTITIES');
						$imageDescription = '"'.mb_convert_encoding($im, "HTML-ENTITIES", "UTF-8").'".';
					}else{
						$imageDescription = "";
					}

					$downloadFile = str_replace("-min", "", $image);
					$zip->addFile($downloadFile);

					

					if(current($images) == 0){
						$imageSlider .= "<section class='between_image-container'><img class='between_image' src='/newsroom/news-img/".$image."' alt='".$imageDescription."'>
						<article class='grid image_container-s'>
						<a class='pc pc-left icon-downloadcircle' title='Download Image' href='/download_image.php?file=".$downloadFile."'><span class='material-icons'>get_app</span></a> 
						<p class='pc'>".$imageDescription.". Foto: ".$credit."</p></article>
					</section>";
					}else if(current($images) == count($images)){
						$imageSlider .= "<section class='between_image-container'><img class='between_image' src='/newsroom/news-img/".$image."' alt='".$imageDescription."'>
						<article class='grid image_container-s'>
						<a class='pc pc-left icon-downloadcircle' title='Download Image' href='/download_image.php?file=".$downloadFile."'><span class='material-icons'>get_app</span></a> 
						<p class='pc'>".$imageDescription.". Foto: ".$credit."</p></article>
					</section>";
					}else{
						$imageSlider = "<section class='between_image-container'><img class='between_image' src='/newsroom/news-img/".$image."' alt='".$imageDescription."'>
							<article class='grid image_container-s'>
							<a class='pc pc-left icon-downloadcircle' title='Download Image' href='/download_image.php?file=".$downloadFile."'><span class='material-icons'>get_app</span></a> 
							<p class='pc'>".$imageDescription.". Foto: ".$credit."</p></article>
						</section>";
					}
				}
				$imageSlider .= "</article>";
			}else{
				foreach($images as $image){
					$images = $image;
					$image = $images[0];
					$credit = $images[1];
					$imageDescription = $images[2];
	
					$im = mb_convert_encoding($imageDescription, 'UTF-8', 'HTML-ENTITIES');
					$imageDescription = mb_convert_encoding($im, "HTML-ENTITIES", "UTF-8");
					
					$downloadFile = str_replace("-min", "", $image);
					$zip->addFile($downloadFile);
					$imageSlider = "<section class='between_image-container'><img class='between_image' src='/newsroom/news-img/".$image."' alt='".$imageDescription."'>
						<article class='grid image_container-s'><a class='pc pc-left icon-downloadcircle' title='Download Image' href='/download_image.php?file=".$downloadFile."'><span class='material-icons'>get_app</span></a> 
						<p class='pc'>".$imageDescription.". Foto: ".$credit."</p></article>
					</section>";
				}
			}
		}
		$zip->close();
	}
	/* else{
		$image = $images[0];
		$credit = $images[1];
		$imageDescription = $images[2];

		$byline = mb_convert_encoding($imageDescription, 'UTF-8', 'HTML-ENTITIES');
		$imageDescription = mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8");
		
		$downloadFile = str_replace("-min", "", $image);

		$imageSlider = "<section class='between_image-container'><img class='between_image' src='/newsroom/news-img/".$image."' alt='".$imageDescription."'>
			<article class='grid image_container-s'><a class='pc pc-left icon-downloadcircle' title='Download Image' href='/download_image.php?file=".$downloadFile."'><span class='material-icons'>get_app</span></a> 
			<p class='pc'>'".$imageDescription."'</p>
			<p class='pc'>Foto: ".$credit."</p></article>
		</section>";
	} */
	if($_COOKIE["region"] == "da-DK"){
		$region = "dk-DK";
	}else if(isset($_COOKIE["region"])){
		$region = $_COOKIE["region"];
	}else{
		$region = "dk-DK";
	}
?>
<?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
		<article class="container" style="margin-top: 90px;">
			<header class="news-header">
				<div style="font-size: 13px; padding: 10px 0px; margin-bottom: 20px;">
					<a href="/pressroom">Press room</a> - <?= $category;?> - <?= $main_title; ?>
				</div>
				<span <?= $style;?>><?= $category;?></span> / <time class="date"><?= $plublished;?></time><br>
				<a href="/" rel="author"><?= $b?> <?= $plublished_by;?></a>
				<h1><?= $main_title;?></h1>
				<?php 
					if($byTitle != "" || !empty($byTitle)){
						echo "<h2>".$byTitle."</h2>";
					}
				?>
				<p><? 
					echo mb_convert_encoding($byline, "HTML-ENTITIES", "UTF-8")
				?></p>
				<? include($_SERVER["DOCUMENT_ROOT"]. "/social-media-header.php") ?>
			</header>
			<?php if($newsBanner != "" || $newsBanner != null){?>
			<section class="over-img">
				<img src="/newsroom/news-img/<?= $newsBanner;?>">
				<section class="grid image_container-s">
					<a class="pc pc-left icon-downloadcircle" title="Download Image" href="/download_image.php?file=<?= $newsBannerDownload?>"><span class="material-icons">get_app</span></a> 
					<p class="pc">Foto: <?= $photocredit?></p>
				</section>
			</section>
			<?}?>
          	<section class="news-content">
				<?
					foreach(array_filter($plain) as $t){
						$text1 = mb_convert_encoding($t, 'UTF-8', 'HTML-ENTITIES');
						$text = mb_convert_encoding($text1, "HTML-ENTITIES", "UTF-8");
						$text = makeUrltoLink($text);


						$keys = array('&#132;', '&#147;');
						preg_match_all('/{{ ad }}/', $text, $matches);
						foreach ($matches[0] as $key => $filename) {
							include($_SERVER["DOCUMENT_ROOT"].'/ads/ad.php');
						}
						$pattern = "/(?<!\\\\)'(.*?)(?<!\\\\)'/";
						/* if(preg_match_all($pattern, $text, $match)){
							$sr = str_replace("'", "<q lang='de'>".$match[0][0]."</q>", $text);
						}else{
							$sr = $text;
						} */
						$sr = $text;
						$sr = str_replace('{{ ad }}', "", $sr);

						$search = "&#132;";
						$s ="&#147;";
						$keys = array('&#132;', '&#147;');

						/* $ad = '<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-0127874455675391" data-ad-slot="3309442973"></ins>
						<script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>'; */

						if($t == $f){
							echo "<section class='t'>". $sr ."</section>";
						}else{
							if($sr){
								echo '<section>'
									.$sr .
								'</section>';
							}
						}
					}
				?>
			   <span id="copyText" class="material-icons copy-icon" title="Copy article">content_copy</span>
			   <span id="copied" class="hidden-msg">Copied!</span>
			</section>
			<?
				
		   ?>
			<section class="news_contact">
				<h4>Press contact</h4>
				<section class="grid grid-info">
					<section class="denmark">
						Denmark<br>
						Gerhard Jacobsen<br>
						Tel.: +45 3049 7481<br>
						Email: <a href="mailto:press.dk@cykelfaergen.info">press.dk@cykelfaergen.info</a>
					</section>
					<section class="germany">
						Germany<br>
						Dagmar Trepins<br>
						Email: <a href="mailto:press.de@cykelfaergen.info">press.de@cykelfaergen.info</a>
					</section>
				</section>
			</section>
          	<section class="news-content">
				<!-- <h3>Share this article</h3>
				<? include($_SERVER["DOCUMENT_ROOT"]. "/social-media-header.php") ?> -->
				<!-- <section class="related-news-container">
					<h3>Related article</h3>
					<section class="related-news">
						<?
							include($_SERVER["DOCUMENT_ROOT"]."/functions/related_articles.php");
							$str = mb_convert_encoding($str, 'UTF-8', 'HTML-ENTITIES');
							$str = mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8");
							related($site_title, $byline, $str);
						?>
					</section>
				</section> -->
			</section>
		</article>
		<? include($_SERVER["DOCUMENT_ROOT"] . "/language/".$region."/footer.php");?>
      	<? include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");?>
      	<script>
          var copyText = document.getElementById("copyText");
          copyText.addEventListener("click",function(){
            var textArea = document.createElement("div");
            textArea.innerHTML = `<h1><? echo mb_convert_encoding($copyTitle, 'UTF-8', 'HTML-ENTITIES');?></h1><br><p><? echo mb_convert_encoding($copyByline, 'UTF-8', 'HTML-ENTITIES'); ?></p><br><? foreach(array_filter($copy) as $text){echo mb_convert_encoding($text, 'UTF-8', 'HTML-ENTITIES')."<br><br>";} ?><br><p rel="author"><?= $b?> <?= $plublished_by;?></p>`;
            document.body.appendChild(textArea);
			window.getSelection().removeAllRanges();

			let range = document.createRange()
			range.selectNode(textArea)
			window.getSelection().addRange(range);

            document.execCommand("Copy");
            textArea.remove();
			
			document.querySelector("#copied").style.opacity = "1";
			document.querySelector("#copied").style.visibility = "visible";

            setTimeout(function(){
            	document.querySelector("#copied").style.opacity = "0";
				document.querySelector("#copied").style.visibility = "hidden";
            }, 1000);
          });
      	</script>   
	</body>
</html>