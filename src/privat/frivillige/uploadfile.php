<?
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    if(isset($_POST["title"]) && $_POST["title"] !== ""){
        $server = "mysql73.unoeuro.com";
        $user = "cykelfaergen_info";
        $password = "natwh9kp";
        $database = "cykelfaergen_info_db_website";

        $db = mysqli_connect($server, $user, $password,$database);

        $folder = $_SERVER["DOCUMENT_ROOT"]."/docs";

        /* $path = $_FILES['doc']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION); */

        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $length = 100;
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
            $filename = $key . '.' . end($temp);
        }

        $title  = mysqli_escape_string($db, $_POST["title"]);

        $target = $folder . "/" . $filename;

        $new = "INSERT INTO referater(title, file) VALUES('$title', '$filename')";

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target) && mysqli_query($db, $new)) {
            header("Location: upload-referater");
        }else{
            echo mysqli_error($db);
        }
    }else{
        header("Location: upload-referater");
    }
?>