<?php
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();

    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" && $_SERVER["REQUEST_URI"] !== "/oplev"){
        header("Location: /oplev");
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" && $_SERVER["REQUEST_URI"] !== "/attractions"){
        header("Location: /attractions");
    }

    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    $title = "Find en overnatning - et resturante - indkøbssted og lån af cykel";
    $description = "Find en liste over overnatninger, cykel- udlejning og service, resturanter samt indkøb.";
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
    <main class="container content">
        <h1></h1>
        <p></p>
        <article class="attractions">
            <h2>Overnatning</h2>
            <section class="grid">
                <a href="https://www.benniksgaardhotel.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://unewatt.kultur-schleswig-flensburg.de/wp-content/uploads/sites/11/2020/02/Logo-Unewatt-Farb-L.png" alt=""> -->
                    <section class="dis-item__content">
                        <h3>Benniksgaard Hotel Gråsten</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
                <a href="https://1747.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://exarc.net/sites/default/files/Historiecenter%20Dybbøl%20Banke.jpg" alt="Dybbøl Banke"> -->
                    <section class="dis-item__content">
                        <h3>Gamle Kro Gråsten</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
            </section>
        </article>
        <article class="attractions">
            <h2>Lej din cykel her</h2>
            <section class="grid">
                <a href="https://www.marinaminde.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://unewatt.kultur-schleswig-flensburg.de/wp-content/uploads/sites/11/2020/02/Logo-Unewatt-Farb-L.png" alt=""> -->
                    <section class="dis-item__content">
                        <h3>Marina Minde</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
                <a href="https://www.cykelservice-graasten.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://exarc.net/sites/default/files/Historiecenter%20Dybbøl%20Banke.jpg" alt="Dybbøl Banke"> -->
                    <section class="dis-item__content">
                        <h3>Cykelservice Gråsten</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
            </section>
        </article>
        <article class="attractions">
            <h2>Resturant</h2>
            <section class="grid">
                <a href="https://www.vaerftet-restaurant.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://unewatt.kultur-schleswig-flensburg.de/wp-content/uploads/sites/11/2020/02/Logo-Unewatt-Farb-L.png" alt=""> -->
                    <section class="dis-item__content">
                        <h3>Værftet, Resturant & bar</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
                <a href="https://www.benniksgaardhotel.dk" class="attraction-item">
                    <!-- <img src="https://www.flensburger-foerde.de/fileadmin/_processed_/4/c/csm_ms-feodora-langballig_567a52e5c4.jpg" alt=""> -->
                    <section class="dis-item__content">
                        <h3>Benniksgaard</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
                <a href="https://1747.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://exarc.net/sites/default/files/Historiecenter%20Dybbøl%20Banke.jpg" alt="Dybbøl Banke"> -->
                    <section class="dis-item__content">
                        <h3>Gamle Kro</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
            </section>
        </article>
        <article class="attractions">
            <h2>Indkøb</h2>
            <section class="grid">
                <a href="https://superbrugsengraasten.dk" target="_blank" class="attraction-item">
                    <!-- <img src="https://unewatt.kultur-schleswig-flensburg.de/wp-content/uploads/sites/11/2020/02/Logo-Unewatt-Farb-L.png" alt=""> -->
                    <section class="dis-item__content">
                        <h3>Superbrugsen Gråsten</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
                <a href="https://www.netto.dk" target="_blank" class="attraction-item">
                   <!--  <img src="https://exarc.net/sites/default/files/Historiecenter%20Dybbøl%20Banke.jpg" alt="Dybbøl Banke"> -->
                    <section class="dis-item__content">
                        <h3>Netto Gråsten</h3>
                        <p class="dis-item_readmore">Læs mere</p>
                    </section>
                </a>
            </section>
        </article>
    </main>
<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>