<?
    $file = $_GET["file"];
    //$link = $_GET["q"];

    $file = $_SERVER["DOCUMENT_ROOT"]. "/newsroom/news-img/".$file;
    
    if(file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        flush(); // Flush system output buffer
        readfile($file);
        die();
    }
?>