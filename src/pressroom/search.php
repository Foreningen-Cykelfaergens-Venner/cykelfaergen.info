<?
    $q = $_GET["year"];

    $server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
	if(isset($_COOKIE["region"])){
    	$lang = $_COOKIE["region"];
    }else{
    	$lang = "da-DK";
    }

    $sql = "SELECT * FROM newsroom WHERE published='1' AND lang='$lang' AND y LIKE '$q' ORDER BY published_at DESC";

	$years = mysqli_query($db, $sql);

    $row_nums = $years->num_rows;

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

    if($_COOKIE["region"] == "da-DK"){
		$region = "dk-DK";
	}else{
		$region = $_COOKIE["region"];
	}

    $title = "Fahrplan | Fahrradfähre Flensburger Förde";
    $description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann nehmen Sie die Personen- & Fahrradfähre von Langballig aus nach Egernsund.";
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
    <main class="container">
        <section class="content">
            <?if($region == "dk-DK"){?><form class="search" action="/pressroom/search" method="get">
                <label for="">Søg via år efter pressemeddelser</label>
                <select class="search__select" name="year">
                    <option selected disabled>Valg året</option>
                    <option value="<?= date("Y")?>" <? if($_GET["year"] == date("Y")){ echo "selected";}?>><?= date("Y")?></option>
                    <option value="2021" <? if($_GET["year"] == "2021"){ echo "selected";}?>>2021</option>
                    <option value="2020" <? if($_GET["year"] == "2020"){ echo "selected";}?>>2020</option>
                </select>
            </form>
            <?}else if($region == "de-DE"){?>
            <form class="search" action="/pressroom/search" method="get">
                <label for="">Suche nach alten Pressemitteilungen</label>
                <select class="search__select" name="year">
                    <option selected disabled>Wähle das Jahr</option>
                    <option value="<?= date("Y")?>"><?= date("Y")?></option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </form>
            <?}?>
        <?
            echo "<p>We found ". $row_nums ." news</p><section class='up'>";
            while($row = $years->fetch_assoc()){
                $i++;
                $main_title = $row["title"];
        
                $main_title = mb_convert_encoding($main_title, "UTF-8" , 'HTML-ENTITIES');
        
                $img = $row["img"];
                $byline = $row["byline"];
                $plain = truncate($row["main_text"]);
                
                $plain = mb_convert_encoding($plain, "UTF-8" , 'HTML-ENTITIES');
        
                $category = $row["category"];
                $plublished = strftime("%e. %B %Y", strtotime($row["published_at"]));
                $url = '/pressroom/'.$row["y"].'/'.$row["m"].'/'.$row["link_title"];
        
                if(strtolower($category) == "update"){
                    $style = "red";
                }else if(strtolower($category) == "pressemeddelelse"){
                    $style = "blue";
                }
                
                echo '<a href="'.$url.'" class="news-content-link col col-block '.$col[$i].'">
                    <div class="news-content-front '.$c[$i].'">
                        <div class="news-header-front '.$co[$i].'"><img src="/newsroom/news-img/'.$img.'" class="news-img" alt=""></div>
                        <div class="news-c">
                            <div class="cate"><span class="cat-span" style="color: '.$style .'">'.$category.'</span></div>
                            <div class="title">
                                '.mb_convert_encoding($main_title , 'HTML-ENTITIES', "UTF-8").'
                            </div>
                            <div style="white-space: initial; padding-top: 35px;">
                                '.mb_convert_encoding($plain , 'HTML-ENTITIES', "UTF-8").'
                            </div>
                        </div>
                        <time class="time"> <?= $plublished; ?></time>
                    </div>
                </a>';
            }
        ?>
            </section>
        </section>
    </main>
    <?  
        include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/scripts/script.php");
    ?>
    <script src="/js/search.archive.js"></script>
</body>
</html>