<?
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header("Content-Type: text/javascript");
    require_once '../functions/minify.js.php';
    $js = file_get_contents($_GET["file"] . ".js");
    // Basic (default) usage
    $minifiedCode = \JShrink\Minifier::minify($js);
    // Disable YUI style comment preservation.
    $minifiedCode = \JShrink\Minifier::minify($js, array(
        'flaggedComments' => false
    ));

    echo $minifiedCode;

    file_put_contents("min/".$_GET["file"].".min.js", $minifiedCode);
?>