<?php    
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    $host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($host, $username, $password, $dbname);
    //$sql = "UPDATE newsroom, news_draft 
    //SET newsroom.title = '".$_POST["title"]."', newsroom.main_text='".$_POST["msg"]."', newsroom.byline='".$_POST["byline"]."', newsroom.edit='0', newsroom.published='1' ,
    //news_draft.title = '".$_POST["title"]."', news_draft.main_text='".$_POST["msg"]."', news_draft.byline='".$_POST["byline"]."', news_draft.edit='0', news_draft.published='1'
    //WHERE newsroom.news_id = ". $_POST["news_id"]. " AND news_draft.news_id = ". $_POST["news_id"]. "";

    $category = $_POST["category"];
    $place = $_POST["place"];
    $byline = $_POST["byline"];
    $title = $_POST["title"];
    $link_title = $_POST["link_title"];
    $msg = $_POST["msg"];
    $link_cate = strtolower($category);
    $img = $_POST["img"];
    $year = date("Y");
    $month = date("m");
    $date = date("Y-m-d H:i:s");
    $edit = "0";
    $pub = "1";
    $imgDescription = $_POST["imgDescription"];
    $department = $_POST["department"];
    if($department == "all" || $department == ""){
        $filename = $_SERVER["DOCUMENT_ROOT"] . "/newsroom/". $link_cate . "/" . $year . "/" . $month . "/". $link_title . ".php";
        $by = "Intastellar Solutions, International";
    }else{
        $filename = $_SERVER["DOCUMENT_ROOT"] . "/ecommerce/news/". $link_cate . "/" . $year . "/" . $month . "/". $link_title . ".php";
        $by = "Intastellar E-Commerce Solutions";
    }

    $written_by = $_POST["written_by"];

    if(!file_exists($filename) || !is_file($filename)){
        $filename = $link_title . ".php";
        if($department == "all" || $department == ""){
            $folder = $_SERVER["DOCUMENT_ROOT"] . "/newsroom/". $link_cate . "/" . $year . "/" . $month . "/";
        }else{
            $folder = $_SERVER["DOCUMENT_ROOT"] . "/ecommerce/news/". $link_cate . "/" . $year . "/" . $month . "/";
        }

        if(is_dir($folder)){
            $newFileName = $folder . "" . $filename;
            $newFileContent = file_get_contents("standardnews.php");
            if(file_put_contents($newFileName, $newFileContent) !== false){
                $file = fopen($newFileName, "w");
                $txt = file_get_contents("standardnews.php");

                fwrite($file, $txt);
                fclose($file);
                $sql = "INSERT INTO newsroom(category, place, title, main_text, byline, img, imgDescription, link_title, link_category, y, m, published_at, published_by, written_by, department, edit, published)
                VALUES('$category', '$place', '$title', '$msg', '$byline', '$img', '$imgDescription', '$link_title', '$link_cate', '$year', '$month', '$date', '$by', '$written_by', '$department', '$edit', '$pub')";
            }
        }else{
            mkdir($folder);
            $newFileName = $folder . "" . $filename;
            $newFileContent = file_get_contents("standardnews.php");
            if(file_put_contents($newFileName, $newFileContent) !== false){
                $file = fopen($newFileName, "w");
                $txt = file_get_contents("standardnews.php");

                fwrite($file, $txt);
                fclose($file);
                $sql = "INSERT INTO newsroom(category, place, title, main_text, byline, img, imgDescription, link_title, link_category, y, m, published_at, published_by, written_by, department, edit, published)
                VALUES('$category', '$place', '$title', '$msg', '$byline', '$img', '$imgDescription', '$link_title', '$link_cate', '$year', '$month', '$date', '$by', '$department', '$written_by', '$edit', '$pub')";
            }
        }
    }else{
        $sql = "UPDATE newsroom, news_draft SET newsroom.title = '".$_POST["title"]."', newsroom.main_text='".$_POST["msg"]."', newsroom.imgDescription='".$_POST["imgDescription"]."', newsroom.byline='".$_POST["byline"]."', newsroom.link_title='".$link_title."', newsroom.img='".$img."', newsroom.written_by='".$written_by."', newsroom.edit='0', newsroom.published='1' , news_draft.title = '".$_POST["title"]."', news_draft.main_text='".$_POST["msg"]."', news_draft.byline='".$_POST["byline"]."', news_draft.img='".$img."', news_draft.imgDescription = '".$imgDescription."', news_draft.written_by='".$written_by."', news_draft.edit='0', news_draft.published='1' WHERE newsroom.news_id = ". $_POST["news_id"]. " AND news_draft.news_id = ". $_POST["news_id"]. "";
    }

    $direcotry = "newsroom/". $link_cate . "/" . $year . "/" . $month . "/" . $link_title;

    if (mysqli_query($db, $sql)) {
        echo "Published";
    } else {
        echo "Error updating record: " . $db->error;
    }
?>