<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Projekt El-færgen | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Projekt El-færgen | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Projekt El-færgen | Foreningen Cykelfaergen's | Bicycle ferry Rødsand";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Projekt El-færgen | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }

    $description = "Foreningen Cykelfærgens Venner, skal fremover sikre drift og udvikling af det nuværende koncept med færgen ”Rødsand”, der ejes af skipper Palle Heinrich.";
?>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
    <article class="banner forenings__banner">
        <div class="forenings__banner--overlay"></div>
        <section class="forenings__banner--content">
            <h1 class="board__headline --small_Headline">Projekt El-færge</h1>
            <p>Vi er i gang med at udvikle planer til en bærdygtigt færge der sejler på Flensborg fjord.</p>
        </section>
    </article>
    <main class="forenings__content">
        <section class="f__grid g75-25">
            <section>
                <h2 class="board__headline --small_Headline --noneCenter --green">Projekt beskrivelse</h2>
                <p>Dette projekt handler om at udvikle en løsning til en bærdygtigt færge.</p>
            </section>
            <section>
                <h2 class="board__headline --small_Headline --noneCenter --green">Kort info</h2>
                <ul>
                    <li></li>
                </ul>
            </section>
        </section>
    </main>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
    ?>
</body>