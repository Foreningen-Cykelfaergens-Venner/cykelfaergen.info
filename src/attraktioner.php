<?php
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();

    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" && $_SERVER["REQUEST_URI"] !== "/attraktionen"){
        header("Location: /attraktionen");
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" && $_SERVER["REQUEST_URI"] !== "/attractions"){
        header("Location: /attractions");
    }

    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    $title = "Attraktioner rundt om Flensborg fjord";
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
    <main class="container content">
        <h1>Attraktioner rundt om Flensborg fjord</h1>
        <p>Find her en liste over attraktioner, hoteller og lignde, rundt om flensborg fjord, både i Sønderjylland og Sydslesvig. Kombinere med en sejlads på cykelfærgen.</p>
        <section class="attractions grid">
            <a href="https://www.museum-unewatt.de" target="_blank" class="attraction-item">
            <img src="https://unewatt.kultur-schleswig-flensburg.de/wp-content/uploads/sites/11/2020/02/Logo-Unewatt-Farb-L.png" alt="">
                <h2>Landschaftsmuseum Angeln/Unewatt</h2>
                <p>Tag med os en udfulgt til Landschaftsmuseum Angeln/Unewatt</p>
            </a>
            <!-- <a href="/attractions/ms-feodora" class="attraction-item">
                <img src="https://www.flensburger-foerde.de/fileadmin/_processed_/4/c/csm_ms-feodora-langballig_567a52e5c4.jpg" alt="">
                <h2>MS Feodora</h2>
                <p>Forbind din sejlads med MS Feodora fra Sønderborg sammen med en sejlads på cykelfærgen.</p>
            </a> -->
            <a href="https://1864.dk" target="_blank" class="attraction-item">
                <img src="https://exarc.net/sites/default/files/Historiecenter%20Dybbøl%20Banke.jpg" alt="Dybbøl Banke">
                <section class="dis-item__content">
                    <h3>Dybbøl Banke</h3>
                    <p>Velkommen på Historiecenter Dybbøl Banke. Her træder du lige ind i danmarkshistorien under krigen på Dybbøl Banke mellem danskerne og preusserne i 1864.</p>
                    <p>På Historiecenter Dybbøl Banke træder du direkte ind i de dramatiske dage under krigen i 1864. Du bliver selv en del af dramaet, og du får ny viden om et af Danmarkshistoriens vigtigste slag.</p>
                    <p class="dis-item_readmore">Læs mere</p>
                </section>
            </a>
        </section>
    </main>
<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>