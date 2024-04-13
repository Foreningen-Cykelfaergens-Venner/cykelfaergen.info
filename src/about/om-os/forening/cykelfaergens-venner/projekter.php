<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Projekter | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Projekter | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Projekter | Foreningen Cykelfaergen's Venner";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Projekter | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }
?>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
    <main class="content">
        <header class="underpage__header">
            <h1 class="board__headline --green">Projekter</h1>
            <section class="intro">

            </section>
        </header>
        <section class="projects">
            <a href="<?= $baseUrl;?>/projekter/el-ferry" class="project">
                <img class="project__img" src="" alt="">
                <section class="project__content">
                    <h2>Projekt El-færge</h2>
                </section>
            </a>
        </section>
    </main>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
    ?>
</body>
</html>