<footer class="footer">
    <div class="footer_nav ppad">
        <div class="footer_logo">
            <img src="https://cykelfaergen.info/assets/logo/logo.svg" width="256px" height="256px" alt="Cykelfærgen Logo">
        </div>
        <div class="navigation-status">
            <address class="ino le">
                <h2>Address</h2>
                <p>Cykelfærgen <br>
                    Havnepladsen<br>
                    DK-6320 Egernsund
                </p>
                <p>
                    Tel.: +45 20 25 64 62<br>
                    Email: booking[at]cykelfaergen.info
                </p>
            </address>
            <div class="invest le">
                <h2>About us</h2>
                <ul>
                    <!-- <li><a href="/om-os/find-vej">Your destinations!</a></li> -->
                    <li><a href="/pressroom">Press section</a></li>
                    <li><a href="https://press.cykelfaergen.info">Pictures</a></li>
                </ul>
            </div>
            <div class="about le">
               <h2>Follow us on</h2>
               <div class="fb-page" data-href="https://www.facebook.com/cykelfargen/" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div cite="https://www.facebook.com/cykelfargen/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cykelfargen/" target="_blank" rel="noopener noreferrer"><img class="social-icon" width="40px" height="40px" src="https://<?= $mainHost?>/assets/icons/facebook.svg" title="Follow us on Facebook" alt="Facebook logo"></a></div></div>
               <a href="https://www.instagram.com/cykelfaergen.rodsand/" target="_blank" rel="noopener noreferrer"><img class="social-icon"  width="40px" height="40px" title="Follow us on Instagram" alt="Instagram Logo" src="https://<?= $mainHost?>/assets/icons/instagram.svg"></a>
            </div>
        </div>
    </div>

    <div class="sponsore_container le">
        <!-- TrustBox widget - Micro Review Count -->
        <div class="trustpilot-widget" data-locale="en-GB" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="610ed3ed70a16b001e886877" data-style-height="52px" data-style-width="100%" data-theme="light">
            <a href="https://dk.trustpilot.com/review/cykelfaergen.info" target="_blank" rel="noopener">Trustpilot</a>
        </div>
        <!-- End TrustBox widget -->
        <? include($root."/assets/sponsers/sponsers.php")?>
    </div>
    <div class="legal">
        <div class="legalc">
            <div class="terms">
                <div class="vfb"><a href="frivillige-login">Frivilige Login</a></div>
                <div class="vfb"><a href="/about-us/legal/terms-of-use">Terms of use</a></div>
                <div class="dp"><a href="/about-us/legal/privacy-and-cookie-policy">Privacy & Cookie Policy</a></div>
                <div class="impr"><a href="/imprint">Impressum</a></div>
            </div>
            <div class="copy">© <?= date("Y")?> Foreningen Cykelfærgen's Venner. <a href="https://www.intastellarsolutions.com?utm_source=cykelfaergen.info" target="_blank">Developed by Intastellar Solutions, International</a></div>
        </div>
    </div>
</footer>