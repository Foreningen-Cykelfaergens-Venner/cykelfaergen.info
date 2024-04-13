<div class="main-container">
    <div class="content">
        <main class="left-side">
            <h1>Presserum</h1>
            <form class="search" action="/pressroom/search" method="get">
                <label for="">Søg via år efter pressemeddelser</label>
                <select class="search__select" name="year">
                    <option selected disabled>Valg året</option>
                    <option value="<?= date("Y")?>"><?= date("Y")?></option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </form>
          	<div class="l_news-c">
          		<div class="category">
                	<div class="up group">
                    <?php
    include("db.php");
    if($_COOKIE["region"] == "da-DK"){
		setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));
	}else if($_COOKIE["region"] == "de-DE"){
		setlocale(LC_TIME, array('de_DE.UTF-8','de_DE@euro','de_DE','german'));
	}

    $db = mysqli_connect($server, $user, $password,$database);
	if(isset($_COOKIE["region"])){
    	$lang = $_COOKIE["region"];
    }else{
    	$lang = "da-DK";
    }

    $year = date("Y");

	$sql = mysqli_query($db, "SELECT * FROM newsroom WHERE published='1' AND lang='$lang' AND y = '$year' ORDER BY published_at DESC LIMIT 3");
    
    if($sql){
        $row_num = $sql->num_rows;
    }
    $col = [
        "landingcol-wide",
        "landingcol-narrow",
        "landingcol-small"
    ];

    $co = [
        "wide-img",
        "narrow-img",
        "small-img"
    ];

    $c = [
        "wide",
        "normal",
        "normal"
    ];

    $arrayLength = count($col);
    $aL = count($c);
    $i = -1;

    function truncate($text, $chars = 200) {
        if (strlen($text) <= $chars) {
            return $text;
        }
        $text = $text." ";
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
        return $text;
    }

	while(($row = $sql->fetch_assoc())){
        $i++;
        $main_title = $row["title"];

        $main_title = mb_convert_encoding($main_title, "UTF-8" , 'HTML-ENTITIES');

		$img = $row["img"];
		$byline = $row["byline"];
        $plain = truncate($row["main_text"]);
        
        $plain = mb_convert_encoding($plain, "UTF-8" , 'HTML-ENTITIES');

		$category = $row["category"];
		$plublished = strftime("%e. %B %Y", strtotime($row["published_at"]));
        $url = 'pressroom/'.$row["y"].'/'.$row["m"].'/'.$row["link_title"];

        if(strtolower($category) == "update"){
            $style = "red";
        }else if(strtolower($category) == "pressemeddelelse"){
            $style = "blue";
        }
        if($row_num >= "3"){
            
            
?>
    <a href="<?= $url?>" class="news-content-link col col-block <? echo $col[$i]; ?>">
        <div class="news-content-front <? echo $c[$i];?>">
            <div class="news-header-front <? echo $co[$i];?>"><img src="/newsroom/news-img/<?= $img; ?>" class="news-img" alt=""></div>
            <div class="news-c">
                <div class="cate"><span class="cat-span" style="color: <?= $style;?>"><?= $category; ?></span></div>
                <div class="title">
                    <?= mb_convert_encoding($main_title , 'HTML-ENTITIES', "UTF-8");?>
                </div>
                <div style="white-space: initial; padding-top: 35px;">
                    <?= mb_convert_encoding($plain , 'HTML-ENTITIES', "UTF-8");?>
                </div>
            </div>
            <time datetime="<?= $row["published_at"]?>" class="time"> <?= $plublished; ?></time>
        </div>
    </a>
<?
        }else{
?>
            <a href="<?= $url?>" class="news-content-link col col-block">
                <div class="news-content-front">
                    <div class="news-header-front"><img src="/newsroom/news-img/<?= $img; ?>" class="news-img" alt=""></div>
                    <div class="news-c">
                        <div class="cate"><span class="cat-span"><?= $category; ?></span></div>
                        <div class="title">
                            <?= mb_convert_encoding($main_title , 'HTML-ENTITIES', "UTF-8");?>
                        </div>
                        <div style="white-space: initial; padding-top: 35px;">
                            <?= mb_convert_encoding($plain , 'HTML-ENTITIES', "UTF-8");?>
                        </div>
                    </div>
                    <time datetime="<?= $row["published_at"]?>" class="time"> <?= $plublished; ?></time>
                </div>
            </a>
<?
        }
    }
?>
                  	</div>
              	</div>
          	</div>
          	<div style="clear: both;"></div>
        </main>
        <div class="sidebar">
            <h2>Presse Kontakt</h2>
            <div class="den">
                <p>Danmark<br>
                    Gerhard Jacobsen<br>
                    Tel.: +45 30 49 74 81<br>
                    Email: press.dk@cykelfaergen.info
                </p>
            </div>
            <div class="germ">
                <p>Tyskland<br>
                    Dagmar Trepins<br>
                    Email: press.de@cykelfaergen.info
                </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
  	<script src="js/getnews.js"></script>
</div>