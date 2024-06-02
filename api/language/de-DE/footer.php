<footer class="footer">
    <section class="footer_nav ppad">
        <section class="footer_logo">
            <img src="https://<?php echo $mainHost?>/assets/logo/logo.svg" width="256px" height="256px" alt="Cykelfærgen Logo">
        </section>
        <section class="navigation-status">
            <address class="ino le">
                <h2>Adresse</h2>
                <p>Cykelfærgen <br>
                    Havnepladsen<br>
                    DK-6320 Egernsund
                </p>
                <p>
                    Administation<br>
                    Klør-Fire 14<br>
                    6310 Broager
                </p>
                <p>
                    Tel.: +45 20 25 64 62
                </p>
            </address>
            <nav class="invest le">
                <h2>Über uns</h2>
                <ul>
                    <li><a href="/om-os/find-vej">Ihre Fahrtziele!</a></li>
                    <li><a href="/pressroom">Pressebereich</a></li>
                    <li><a href="https://press.cykelfaergen.info">Pressematerial</a></li>
                    <li><a href="/contact">Kontakt</a></li>
                </ul>
                <h2>Verein</h2>
                <ul>
                    <li><a href="https://www.cykelfaergen.info/om-os/forening/cykelfaergens-venner/bestyrelsen">Vorstand</a></li>
                </ul>
            </nav>
            <div class="le">
                <h2>Erleben</h2>
                <nav>
                    <ul>
                        <li><a href="/discover/mit-der-faehre-auf-schloss-tour-gehen">Mit der Fähre auf Schlosstour</a></li>
                    </ul>
                </nav>
            </div>
            <seciton class="le">
                <h2>Buchung</h2>
                <nav>
                    <ul>
                        <li><a href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=footer&utm_medium=footer&utm_content=Book+din+25+min.+sejlads">Buchung</a></li>
                        <!-- <li><a href="https://alsturbaade.teambooking.dk/my-booking">Stornieren / Ändern</a></li> -->
                    </ul>
                </nav>
                <h2>Folgen Sie uns auf</h2>
                <div class="fb-page" data-href="https://www.facebook.com/cykelfargen/" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div cite="https://www.facebook.com/cykelfargen/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cykelfargen/" target="_blank" rel="noopener noreferrer"><img class="social-icon" width="40px" height="40px" title="Folgt uns bei Facebook" src="https://<?= $mainHost;?>/assets/icons/facebook.svg" alt="Facebook logo"></a></div></div>
                <a href="https://www.instagram.com/cykelfaergen.flensborg.fjord/" target="_blank" rel="noopener noreferrer"><img class="social-icon" width="40px" height="40px" title="Folgt uns bei Instagram" alt="Instagram Logo" src="https://<?= $mainHost?>/assets/icons/instagram.svg"></a>
            </seciton>
        </section>
    </section>
    <div class="sponsore_container le">
        <? include($root."/assets/sponsers/sponsers.php")?>
    </div>
    <div class="legal">
        <div class="legalc">
            <div class="terms">
                <div class="vfb"><a href="frivillige-login">Frivilige Login</a></div>
                <div class="vfb"><a href="/om-os/legal/terms-of-service">Terms of use</a></div>
                <div class="dp"><a href="https://<?php echo $mainHost?>/om-os/legal/privacy">Datenschutz Richlinien</a></div>
                <div class="dp"><a href="https://<?php echo $mainHost?>/om-os/legal/cookie-policy">Cookie Politik</a></div>
                <div class="impr"><a href="/imprint">Impressum</a></div>
            </div>
            <div class="copy">© <?= date("Y")?> Foreningen Cykelfærgen's Venner. <a href="https://www.intastellarsolutions.com?utm_source=cykelfaergen.info" target="_blank">Gestaltung und Entwicklung Intastellar Solutions, International</a></div>
        </div>
    </div>
</footer>