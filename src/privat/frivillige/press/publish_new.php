<?php
  ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

  $hos       = "intastellarsolutions.com.mysql";
  $username   = "intastellarsolutions_comblog";
  $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
  $dbname     = "intastellarsolutions_comblog"; // will use later

  $db = mysqli_connect($hos, $username, $password, $dbname);


  $category = $_POST["category"];
  $place = $_POST["place"];
  $byline = $_POST["byline"];
  $title = $_POST["title"];
  $link_title = $_POST["link_title"];
  $msg = $_POST["msg"];
  $link_cate = strtolower($category);
  $img = $_POST["img"];
  $department = $_POST["department"];
  $year = date("Y");
  $month = date("m");
  $date = date("Y-m-d H:i:s");
  $edit = "0";
  $pub = "1";
  $imgDescription = $_POST["imgDescription"];

  if($department == "all" || $department == ""){
    $filename = $_SERVER["DOCUMENT_ROOT"] . "/newsroom/". $link_cate . "/" . $year . "/" . $month . "/". $link_title . ".php";
    $by = "Intastellar Solutions, International";
}else{
    $filename = $_SERVER["DOCUMENT_ROOT"] . "/ecommerce/news/". $link_cate . "/" . $year . "/" . $month . "/". $link_title . ".php";
    $by = "Intastellar E-Commerce Solutions";
}

  if(!file_exists($filename)){
    $filename = $link_title;

    if($department == "all" || $department == ""){
      $folder = $_SERVER["DOCUMENT_ROOT"] . "/newsroom/". $link_cate . "/" . $year . "/" . $month . "/";
    }else{
      $folder = $_SERVER["DOCUMENT_ROOT"] . "/ecommerce/news/". $link_cate . "/" . $year . "/" . $month . "/";
    }

    $newFileName = $folder . "" . $filename;

    $newFileContent = file_get_contents("standardnews.php");
    if(file_put_contents($newFileName, $newFileContent) !== false){
        $file = fopen($newFileName, "w");
        $txt = file_get_contents("standardnews.php");

        fwrite($file, $txt);
        fclose($file);
        $sql = "INSERT INTO newsroom(category, place, title, main_text, byline, img, imgDescription, link_title, link_category, y, m, published_at, published_by, edit, published)
        VALUES('$category', '$place', '$title', '$msg', '$byline', '$img', '$imgDescription', '$link_title', '$link_cate', '$year', '$month', '$date', '$by', '$edit', '$pub')";
    }
  }

  if (mysqli_query($db, $sql)) {
      echo "Published!";
  } else {
      echo "Error updating record: " . $db->error;
  }
?>