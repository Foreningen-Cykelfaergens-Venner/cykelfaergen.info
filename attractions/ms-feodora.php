<?php
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    $title = "MS Feodora fra Sønderborg til Langballigau";

    $dkLink = "https://www.flensburger-foerde.de/da/skibsture/ms-feodora";
    $deLink = "https://www.flensburger-foerde.de/schiffstouren/ms-feodora";
    $enLink = "https://www.flensburger-foerde.de/en/boat-tours/ms-feodora";

    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
    <main class="container">
        <img src="https://www.flensburger-foerde.de/fileadmin/_processed_/4/c/csm_ms-feodora-langballig_567a52e5c4.jpg" alt="">
        <section class="content">
            <h1>MS Feodora fra Sønderborg til Langballigau</h1>
            <p>Det gode skib Feodora II sejler i rutefart mellem Langballigau og Sønderborg. Der sejles rundt om halvøen Broager og langs ad Dybbøl Banke med den berømte mølle. Sejltiden fra den tyske side til Sønderborg varer ca. 50 minutter. Ved indsejlingen i Sønderborg havn mødes vi af SLOTTETS smukke profil og sydhavnens romantiske atmosfære. Så er der et par timer til at gå på opdagelse i den hyggelige, danske havneby. Til bymidten er der kun få minutter til fods. Efter tre en halv time går turen tilbage til Langballigau.</p>
            <a href="https://www.flensburger-foerde.de/da/skibsture/ms-feodora" target="_blank" rel="noopener" class="cta">
                Lær mere om MS Feodora
            </a>
        </section>
    </main>
<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>