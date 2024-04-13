<footer class="footer <?= $tourdefrance;?>">
    <section class="footer_nav ppad">
        <div class="footer_logo">
            <img src="<?= $mainHost?>/assets/logo/logo.svg" width="256px" height="256px" alt="Cykelfærgen Logo">
        </div>
        <section class="navigation-status">
            <address class="ino le">
                <div class="footer--title">Adresse</div>
                <p>
                    Cykelfærgen <br>
                    Havnepladsen<br>
                    6320 Egernsund
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
            <section class="invest le">
                <div class="footer--title">Om os</div>
                <ul>
                    <li><a href="https://<?= $mainHost?>/om-os/find-vej">Find vej!</a></li>
                    <li><a href="https://<?= $mainHost?>/pressroom">Presserum</a></li>
                    <li><a href="https://<?= $mainHost?>/om-os/forening/cykelfaergens-venner">Foreningen Cykelfærgen's Venner</a></a>
                    <li><a href="https://<?= $mainHost?>/om-os/vores-historie">Vores Historie</a></li>
                    <li><a href="https://press.cykelfaergen.info">Presse Materiale</a></li>
                    <li><a href="<?= $mainHost?>/contact">Kontakt os</a></li>
                </ul>
            </section>
            <section class="invest le">
                <div class="footer--title">Forening</div>
                <ul>
                    <li><a href="<?= $mainHost?>/om-os/forening/cykelfaergens-venner/bestyrelsen">Bestyrelsen</a></li>
                    <li><a href="https://billing.stripe.com/p/login/dR600UfKZ3h6e9G3cc" target="_blank">Opdater dit medlemsskab</a></li>
                    <!-- <li><a href="https://forening.cykelfaergen.info/medlemsskab">Medlemsskaber</a></li> -->
                    <!-- <li><a href="https://forening.cykelfaergen.info" target="_blank" rel="noopener noreferrer">Medlems Login</a></li> -->
                </ul>
                <div class="footer--title">Støt os</div>
                <a href="https://www.mobilepay.dk/erhverv/betalingslink/betalingslink-svar?phone=779913" target="_blank" rel="noopener noreferrer"><img style="max-width:40%; padding: 20px 0px;" src="<?= $mainHost?>/assets/logo/MP_RGB_NoTM_Logo+Type Horisontal Blue.svg" alt="MobilePay"></a>
                <ul>
                    <li><a href="https://www.mobilepay.dk/erhverv/betalingslink/betalingslink-svar?phone=779913" target="_blank" rel="noopener noreferrer">MobilePay nr.: 77 99 13</a></li>
                </ul>
            </section>
            <section class="invest le">
                <section>
                    <div class="footer--title">Følg os på</div>
                    <div class="fb-page" data-href="https://www.facebook.com/cykelfargen/" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div cite="https://www.facebook.com/cykelfargen/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cykelfargen/" target="_blank" rel="noopener noreferrer"><img class="social-icon" width="40px" height="40px" src="https://<?= $mainHost?>/assets/icons/facebook.svg" title="Følg os på Facebook" alt="Facebook logo"></a></div></div>
                    <a href="https://www.instagram.com/cykelfaergen.flensborg.fjord/" target="_blank" rel="noopener noreferrer"><img class="social-icon" width="40px" height="40px" src="<?= $mainHost?>/assets/icons/instagram.svg" title="Følg os på Instagram" alt="Instagram logo"></a>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="footer--title">Oplev</div>
                    <ul>
                        <li><a href="https://<?= $mainHost?>/oplev">Oversigt</a></li>
                    </ul>
                </section>
                <section>
                    <div class="footer--title">Developer</div>
                    <ul>
                        <li><a href="https://developers.cykelfaergen.info/timetable/js">Sejlplan API</a></li>
                    </ul>
                </section>
            </section>
        </section>
    </section>
    <div class="sponsore_container">
        <? include($root."/assets/sponsers/sponsers.php")?>
    </div>
    <div class="legal">
        <div class="legalc">
            <div class="terms">
                <div class="vfb"><a href="<?php echo $mainHost?>/frivillige-login">Frivilige Login</a></div>
                <div class="vfb"><a href="<?php echo $mainHost?>/om-os/legal/terms-of-service">Terms of Services</a></div>
                <div class="dp"><a href="<?php echo $mainHost?>/om-os/legal/privacy">Privatlivs politik</a></div>
                <div class="dp"><a href="<?php echo $mainHost?>/om-os/legal/cookie-policy">Cookie politik</a></div>
                <div class="impr"><a href="<?php echo $mainHost?>/imprint">Impressum</a></div>
            </div>
          <div class="copy">&copy; <?= date("Y")?> Foreningen Cykelfærgen's Venner. <a href="https://www.intastellarsolutions.com?utm_source=cykelfaergen.info" target="_blank">Udviklet af Intastellar Solutions, International</a></div>
        </div>
    </div>
</footer>