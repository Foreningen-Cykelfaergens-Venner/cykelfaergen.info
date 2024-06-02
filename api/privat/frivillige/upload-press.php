<?
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    if(isset($_POST["file"]) && $_POST["file"] !== ""){
        
    }else{
        include("word2txt.class.php");
        $tempname = $_FILES["file"]["tmp_name"];
        $temp = explode(".", $_FILES["file"]["name"]);
        $target_dir = $_SERVER["DOCUMENT_ROOT"]. "/privat/frivillige/press-files";

        if(isset($_FILES['file'])){
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
        }
    
       /*  $temp = explode(".", $_FILES["file"]["name"]);
        $length = 200;
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }*/
        $filename = $_FILES["file"]["name"];
        
    
        $target_file = $target_dir ."/". $filename;

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
            $docObj = new Doc2Txt($target_file);
            //$docObj = new DocxConversion("test.docx");
            //$docObj = new DocxConversion("test.xlsx");
            //$docObj = new DocxConversion("test.pptx");
            $docText = $docObj->convertToText();

            echo mb_convert_encoding($docText, "HTML-ENTITIES", "UTF-8");
        }
    }
?>