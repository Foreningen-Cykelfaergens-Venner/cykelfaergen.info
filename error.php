    <?php
        
        if($_GET["error"] == "404"){
            $main_title = "We couldn´t find the page you requested!";
        }else if($_GET["error"] == "410"){
            $main_title = "This page has been deleted permantly";
        }
    ?>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
    <main class="content">
        <h1>Error <?= $_GET["error"];?>: <?= $main_title;?></h1>
        <p>It seems as the page has been moved or deleted.</p>
        <a href="/">Go home</a>
    </main>
    <? include($_SERVER["DOCUMENT_ROOT"]."/components/footer.php");?>
    <? include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");?>
</body>
</html>