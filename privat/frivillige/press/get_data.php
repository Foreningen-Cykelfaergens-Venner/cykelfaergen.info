<?php
    
	$host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($hos, $username, $password, $dbname);


	$sql = mysqli_query($db, "SELECT main_text FROM news_draft WHERE news_id = '".$_GET['id']."'");
    
    if($sql){
        $row_num = $sql->num_rows;
    }

	while($row = $sql->fetch_assoc()){
        $main_title = $row["title"];
		$img = $row["img"];
		$byline = $row["byline"];

		$post = nl2br($row["main_text"]);
		$post = '<p>' . preg_replace('#(<br />[\r\n]+){2}#', '</p><p>', $post) . '</p>';
		$post = nl2br($row["main_text"], false);
		$post = '<p>' . preg_replace('#(<br>[\r\n]+){2}#', '</p><p>', $post) . '</p>';
		$category = $row["category"];
		$plublished = date("d.m.Y", strtotime($row["published_at"]));

        echo $post;

	}
?>