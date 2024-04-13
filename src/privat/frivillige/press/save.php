<?php
    $host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($hos, $username, $password, $dbname);
    $sql = "UPDATE news_draft SET title = '".$_POST["title"]."', main_text='".$_POST["msg"]."',place='".$_POST["place"]."', byline='".$_POST["byline"]."', imgDescription='".$_POST["imgDescription"]."', department='".$_POST["department"]."', category='".$_POST["category"]."', written_by='".$_POST["written_by"]."', edit='1' WHERE news_id = ". $_POST["news_id"]. "";

    if ($db->query($sql) === TRUE) {
        echo "Draft saved!";
    } else {
        echo "Error updating record: " . $db->error;
    }
?>