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
            Tel.: +45 20 25 64 62<br>
        </address>
        <section class="no-flex">
            <h2>Skriv til os!</h2>
            <form id="contact_form" action="/send_mail" method="post">
                <section class="form-elements-container">
                    <label for="name">Navn</label>
                    <input class="form-elements" type="text" name="name" id="name" placeholder="Navn">
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
                    <label for="subject">Emne</label>
                    <input class="form-elements" type="text" name="subject" id="subject" placeholder="Emne">
                </section>
                <section class="form-elements-container">
                    <label for="to">Hvad drejer sig henvendelsen om?</label>
                    <select class="form-elements" name="to" id="to">
                        <option selected disabled>Vælg</option>
                        <option value="info@cykelfaergen.info">Generalt</option>
                        <option value="booking@cykelfaergen.info">Booking</option>
                        <option value="webmaster@cykelfaergen.info">Hjemmesiden</option>
                        <option value="forening@cykelfaergen.info">Foreningen</option>
                        <option value="press.dk@cykelfaergen.info">Pressen</option>
                    </select>
                </section>
                <section class="form-elements-container">
                    <label for="message">Meddelelse</label>
                    <textarea class="form-elements" name="message" id="message" cols="30" rows="10" placeholder="meddelelse"></textarea>
                </section>
                <div class="g-recaptcha" data-sitekey="6LfG_e8lAAAAAKc0huTXCl70tKch07r0q6a_RytF"></div>
                <input type="hidden" value="" name="detection">
                <button class="btn header-btn form-submit-btn" type="submit">
                    Afsend
                </button>
                <div class="successMessage"></div>
            </form>
        </section>
    </section>
</main>
<script src="/js/form.js"></script>