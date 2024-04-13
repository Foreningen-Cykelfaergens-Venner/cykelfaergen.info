<?php
    $title = "Generalforsamling | Cykelfærgen Flensborg Fjord";
    $description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann fahren Sie mit uns als Personenfähre.";
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
<main class="container content">
    <h1>Generalforsamling <?php echo date("Y"); ?></h1>
    <p>DGS - Den gamle skole, Egernsund</p>
    <h2>
        <date>26. Marts 2024</date><br>
        <time>Kl. 18:30</time>
    </h2>
    <section class="grid">
        <section>
            <p>Foreningen er vært ved en lækkert aftensmad og øl/vand/vin kan købes til fordelagtige priser.</p>
            <p>Mad pris:<br>
                ikke medlemmer: 100 kr.
            </p>
            <p>Efter generalforsamlingen snakker vi om sæsonen 2024 og hygger os.<br>
            Af hensyn til bestilling af med beder vi jer at tilmelde jer senest 14 dage før.
            </p>
            <address>
                Sundgade 100, DK - 6320 Egernsund
            </address>
        </section>
        <section>
            <form id="subscibe" method="post">
                <fieldset>
                    <section>
                        <label for="name">Navn</label>
                        <input class="form-elements" type="text" name="name" id="name">
                    </section>
                    <section>
                        <label for="quantity">Antal personer</label>
                        <input class="form-elements" type="tel" name="quantity" id="quantity" pattern="[0-9]*" inputmode="numeric">
                    </section>
                    <section>
                        <label for="email">E-Mail</label>
                        <input class="form-elements" type="email" name="email" id="email">
                    </section>
                    <div class="g-recaptcha" data-sitekey="6LfG_e8lAAAAAKc0huTXCl70tKch07r0q6a_RytF"></div>
                </fieldset>
                <button class="btn header-btn form-submit-btn" type="submit">Tilmeld</button>
            </form>
        </section>
    </section>
</main>
<dialog class="success-message" popup>
    <button class="close" onclick="this.parentElement.close()">X</button>
    <section>
        <h1>Tak for din tilmelding</h1>
        <p>Vi glæder os til at se dig til generalforsamlingen.</p>
        <p>Vi har sendt dig en mail med detailjerne</p>
    </section>
</dialog>
<script>
    const form = document.querySelector("#subscibe");
    const modal = document.querySelector(".success-message");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        form.querySelector("fieldset").disabled = true;

        const name = form.querySelector("#name").value;
        const quantity = form.querySelector("#quantity").value;
        const email = form.querySelector("#email").value;
        const recaptcha = form.querySelector(".g-recaptcha-response").value;
        fetch("tilmeld-generalforsamling", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `name=${name}&quantity=${quantity}&email=${email}&g-recaptcha-response=${recaptcha}`
        }).then((res) => {
            if(res.ok){
                form.querySelector("fieldset").disabled = false;
                form.reset();
                grecaptcha.reset();
                modal.showModal();
            }else{
                alert("Der skete en fejl. Prøv igen senere.");
            }
        });
    });
</script>
<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
?>