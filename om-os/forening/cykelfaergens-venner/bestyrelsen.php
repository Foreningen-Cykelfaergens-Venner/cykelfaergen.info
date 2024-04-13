<?
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Bestyrlsen | Foreningen Cykelfaergen's Venner";
        $heading = "Bestyrelsen";
        $subheading = "Bestyrelsesmedlemmer";
        $formand = "Formand";
        $næstformand = "Næstformand";
        $cashier = "Kasserer";
        $sect = "Sekretær";
        $member = "Medlem";
        $supllant = "Supplant";
        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Vorstand | Foreningen Cykelfaergen's Venner";
        $heading = "Vorstand";
        $subheading = "Verwaltungsrat";
        $formand = "Vorsitzender";
        $cashier = "Kassierer";
        $supllant = "Vertretung";
        $sect = "Sekretariat";
        $member = "Mitglied";

        $næstformand = "stellvertr. Vorsitzender";
        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Bestyrlsen | Foreningen Cykelfaergen's Venner";
        $heading = "Bestyrelsen";
        $subheading = "Board Members";
        $formand = "Formand";
        $sect = "Secreetary";
        $supllant = "Representative";
        $næstformand = "Næstformand";
        $cashier = "Cashier";
        $member = "Member";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Bestyrlsen | Foreningen Cykelfaergen's Venner";
        $heading = "Bestyrelsen";
        $subheading = "Bestyrelsesmedlemmer";
        $formand = "Formand";
        $næstformand = "Næstformand";
        $cashier = "Kasserer";
        $sect = "Sekretær";
        $member = "Medlem";
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
            <h1 class="board__headline --green"><?php echo $heading; ?></h1>
            <section class="intro">

            </section>
        </header>
        <section class="medlemmer">
            <h2 class="board__headline --green"><?php echo $subheading; ?></h2>
            <section class="board__grid">
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Gerhard Jacobsen</p>
                    <p><?php echo $formand; ?></p>
                </article>
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Rainer Naujeck</p>
                    <p><?php echo $næstformand; ?></p>
                </article>
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Jørn Müller</p>
                    <p><?php echo $cashier; ?></p>
                </article>
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Lene Neumann Jepsen</p>
                    <p><?php echo $sect;?></p>
                </article>
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Jacob Hallum Holst</p>
                    <p><?php echo $member?></p>
                </article>
                <article class="board__member">
                    <p class="board__headline --green --small_Headline">Karin Baum</p>
                    <p><?php echo $supllant;?></p>
                </article>
            </section>
        </section>
    </main>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/language/".$region."/footer.php");
        include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
    ?>
</body>
</html>