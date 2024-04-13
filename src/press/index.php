<?
$title = "Presse Materiale | Foreningen Cykelfærgen´s Venner";

$heading = "Presse materiale";
$navPictures = "Billeder";

if($_COOKIE["region"] == "en-GB"){
    $heading = "Press material";
    $navPictures = "Pictures";
}else if($_COOKIE["region"] == "de-DE"){
    $heading = "Presse Material";
    $navPictures = "Bilder";
}

$root = str_replace("press", "public_html", $_SERVER["DOCUMENT_ROOT"]);
include($root."/components/header.php");
?>
    <main class="content">
        <h1><?= $heading;?></h1>
        <nav style="padding: 15px;">
            <a href="/pictures"><?php echo $navPictures;?></a>
            <a href="/flyer">Flyer</a>
        </nav>
    </main>
<?
    /* include($root ."/language/". $_COOKIE["region"] ."/footer.php"); */
    include($root."/scripts/script.php");
?>
</body>
</html>