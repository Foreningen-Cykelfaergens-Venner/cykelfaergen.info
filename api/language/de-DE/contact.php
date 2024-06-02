<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<main class="container">
    <section class="content">
        <h1>Kontakt</h1>
        <p>Cykelfærgen Flensborg Fjord</p>
        <address>Havnepladsen <br>
            6320 Egernsund <br>
            Danmark
        </address>
        <address>
            Tel.: +45 20 25 64 62
        </address>
        <section class="no-flex">
            <h2>Schreiben Sie uns!</h2>
            <form id="contact_form" action="/send_mail" method="post">
                <section class="form-elements-container">
                    <label for="name">Name</label>
                    <input class="form-elements" type="text" name="name" id="name" placeholder="Name">
                </section>
                <section class="form-elements-container">
                    <label for="email">E-Mail</label>
                    <input class="form-elements" type="email" name="email" id="email" placeholder="e-mail">
                </section>
                <section class="form-elements-container">
                    <label for="phone">Mobil- / telefonnummer</label>
                    <input class="form-elements" type="tel" name="phone" id="phone" placeholder="Mobil- / telefonnummer">
                </section>
                <section class="form-elements-container">
                    <label for="to">Worum geht es in der Anfrage?</label>
                    <select class="form-elements" name="to" id="to">
                        <option selected disabled>Bitte auswählen</option>
                        <option value="info@cykelfaergen.info">Allgemein</option>
                        <option value="booking@cykelfaergen.info">Buchung</option>
                        <option value="webmaster@cykelfaergen.info">Webseite</option>
                        <option value="verein@cykelfaergen.info">Verein</option>
                        <option value="press.de@cykelfaergen.info">Presse</option>
                    </select>
                </section>
                <section class="form-elements-container">
                    <label for="subject">Betreff</label>
                    <input class="form-elements" type="text" name="subject" id="subject" placeholder="Betreff">
                </section>
                <section class="form-elements-container">
                    <label for="message">Nachricht</label>
                    <textarea class="form-elements" name="message" id="message" cols="30" rows="10" placeholder="Nachricht"></textarea>
                </section>
                <div class="g-recaptcha" data-sitekey="6LfG_e8lAAAAAKc0huTXCl70tKch07r0q6a_RytF"></div>
                <input type="hidden" value="" name="detection">
                <button class="btn header-btn form-submit-btn" type="submit">
                    Absenden
                </button>
                <div class="successMessage"></div>
            </form>
        </section>
    </section>
</main>
<script src="/js/form.js"></script>