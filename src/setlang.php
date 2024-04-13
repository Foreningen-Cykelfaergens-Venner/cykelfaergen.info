<?
    
    $url = $_SERVER["HTTP_HOST"];
    $domain = preg_replace('#^www\.(.+\.)#i', '$1', $url);

    setcookie("region", $_GET["lang"], time() + (86400 * 30), "/", $domain);
    header("Location: ". $_GET["query"]);
?>