<?php
    /* ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); */
    function related($title, $byline, $main){

        $server = "mysql73.unoeuro.com";
        $user = "cykelfaergen_info";
        $password = "natwh9kp";
        $database = "cykelfaergen_info_db_website";

        $db = mysqli_connect($server, $user, $password,$database);


        $ti = explode(" ", $title);
        $byline = explode(" ", $byline);
        $main = explode(" ", $main);

        //$sql = "SELECT * FROM newsroom WHERE published = '1' AND byline LIKE '%{$t}%' OR title LIKE '%{$t}%' OR main_text LIKE '%{$t}%'";
        /* $ids = join(",",$ti);
        $ids .= join(",", $byline);  */
        $ids = join(",", $main);

        $ids = str_replace("-", "", $ids);

        $aKeyword = explode(",", $ids);

        $aKeyword = array_filter($aKeyword);

        //published='1' AND lang='$lang'
        $sql ="SELECT * FROM newsroom WHERE MATCH (main_text, byline) AGAINST(";

        for($i = 0; $i < count($aKeyword); $i++) {
            if(!empty($aKeyword[$i])) {
                if(strlen($aKeyword[$i]) > 3){
                    $sql .= " '" . $aKeyword[$i] . "' ";
                }
            }
        }

        /* $sql .= " 'Gerhard Jacobsen'"; */

        $sql .= " IN NATURAL LANGUAGE MODE)";
        
        $query = mysqli_query($db, $sql);

        $num = mysqli_num_rows($query);

        if($query){

            while($row = $query->fetch_assoc()){
                $published = strftime("%e. %B %Y", strtotime($row["published_at"]));
                $title = mb_convert_encoding($row["title"], 'UTF-8', 'HTML-ENTITIES');
    
                $title = mb_convert_encoding($title, "HTML-ENTITIES", "UTF-8");
                $img = $row["img"];
                $url = '/pressroom/'.$row["y"].'/'.$row["m"].'/'.$row["link_title"];
                $category = $row["category"];

                echo '
                    <a href="'.$url.'">
                        <article class="related-news_article">
                            <img class="related-news_img" src="/newsroom/news-img/'.$img.'">
                            <h6>'.$category.'</h6>
                            <h3>'.$title.'</h3>
                            <date>'.$published.'</date>
                        </article>
                    </a>
                    ';
                }
        }else{
            echo mysqli_error($db);
        }
    }
    
?>