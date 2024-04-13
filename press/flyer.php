<?
$title = "Presse Materiale | Foreningen Cykelfærgen´s Venner";

$heading = "Presse materiale";

if($_COOKIE["region"] == "en-GB"){
    $heading = "Press material";
}else if($_COOKIE["region"] == "de-DE"){
    $heading = "Presse Material";
}

$root = str_replace("press", "public_html", $_SERVER["DOCUMENT_ROOT"]);
include($root."/components/header.php");
?>
    <main class="content">
        <h1><?= $heading;?></h1>
        <nav style="padding: 15px;">
            <a href="/pictures">Bilder</a>
            <a href="/flyer">Flyer</a>
        </nav>
        <section class="grid">
            <?
                $fileList = glob('materials/flyers/*');

                foreach($fileList as $filename){
                    //Simply print them out onto the screen.
                    echo "<div>
                            <img style='width: 100%; height: auto; object-fit: cover;' src='".$filename."'>
                            <a href='download?file=".$filename."' class='download__btn'>Download</a>
                        </div>";
                }
            ?>
        </section>
    </main>
<?
    include($root."/components/footer.php");
    include($root."/scripts/script.php");
?>
</body>
</html>