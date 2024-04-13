<?php
    $host       = "intastellarsolutions.com.mysql";
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
    $department = $_POST["department"];
    $written_by = $_POST["written_by"];
    $img = "test";
    $year = date("Y");
    $month = date("m");
    $date = date("Y-m-d H:i:s");
    $edit = "1";
    $pub = "0";
    $imgDescription = $_POST["imgDescription"];

    $cate = strtolower($_POST["category"]);
    $published = $_POST["date"];
    $category = $_POST["category"];
    $place = $_POST["place"];
    $title = $_POST["title"];
    $linktitle = str_replace(" ", "-", strtolower($title));
    $year = date("Y");
    $month = date("m");

    if($department == "all"){
      $by = "Intastellar Solutions, International";
      $folder = $_SERVER["DOCUMENT_ROOT"]. "/newsroom/news-img";
      $target_dir = $_SERVER["DOCUMENT_ROOT"]. "/newsroom/news-img";
    }else{
        $by = "Intastellar E-Commerce Solutions";
        $folder = $_SERVER["DOCUMENT_ROOT"]. "/ecommerce/news/news-img";
        $target_dir = $_SERVER["DOCUMENT_ROOT"]. "/ecommerce/news/news-img";
    }
    
    $filename = date('dmYHis') . '_'. $_FILES["fileToUpload"]["name"];

    $target_file = $target_dir ."/". $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["file"]) && isset($_POST["file"]) !== "") {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

  

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo $imageFileType;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      $sql = "INSERT INTO news_draft(category, place, title, main_text, byline, img, imgDescription, link_title, link_category, y, m, published_at, published_by, written_by, department, edit, published)
      VALUES('$category', '$place', '$title', '$msg', '$byline', '$filename','$imgDescription', '$linktitle', '$link_cate', '$year', '$month', '$date', '$by', '$written_by', '$department', '$edit', '$pub')"; 

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && mysqli_query($db, $sql)) {
        echo "Draft saved!";
      }
    }
?>