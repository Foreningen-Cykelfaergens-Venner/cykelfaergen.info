<?
$title = "Presse Materiale | Foreningen Cykelfærgen´s Venner";

$heading = "Presse materiale";

if($_COOKIE["region"] == "en-GB"){
    $quelle = "Foreningen Cykelfærgen´s Venner - Photographer: Felix A. Schultz";
}else if($_COOKIE["region"] == "de-DE"){
    $quelle = "Foreningen Cykelfærgen´s Venner - Foto: Felix A. Schultz";
}else{
    $quelle = "Foreningen Cykelfærgen´s Venner - Foto: Felix A. Schultz";
}

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
        <header>
            <h1><?= $heading;?></h1>
            <nav style="padding: 15px;">
                <a href="/pictures"><?php echo $navPictures;?></a>
                <a href="/flyer">Flyer</a>
            </nav>
        </header>
        <nav>
            <a href="?id=thjalfe">Thjalfe</a>
            <a href="?id=jubilaeum">Jubilaeum</a>
        </nav>
        <section class="grid">
            <?
                $fileList = glob("materials/pressemateriale".(isset($_GET["id"]) ? "/". $_GET["id"] : "")."/*");
                foreach($fileList as $filename){
                    //Simply print them out onto the screen.
                    echo "<div>
                            <img style='width: 100%; height: 300px; object-fit: cover;' src='".$filename."'>
                            <a href='download?file=".$filename."' class='download__btn'>Download</a>
                            ".$quelle."
                        </div>";
                }
            ?>
        </section>
    </main>
<?
    /* include($root ."/language/". $_COOKIE["region"] ."/footer.php"); */
    include($root."/scripts/script.php");
?>
</body>
</html>