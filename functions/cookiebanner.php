<?
if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
  $cookieInfoHeadline = "Denne hjemmeside bruger Cookies";
  $cookieInfo = "Vi bruger cookies for at gemme, dine sprog indstillinger, analyser brugen af hjemmesiden, og at kunne vise relevante reklamer.
  <br>Ved at klikke på knappen 'Acceptere', giver du tilladse til cookies.<br>
  <a class='links' href='/om-os/legal/privacy'>Læs vores Privat & cookie politik</a>";
  $cookieBTNAll = "Acceptere";
  $cookieBTNNess = "Kun nødvendige";
}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])){
  $cookieInfoHeadline = "Wir nutzen Cookies auf unserer Website";
  $cookieInfo = "Wir nutzen cookies um deine Spracheinstellungen zu speichern, werbung schalten zu können und die nutzung unserer Webseite zu analysieren.
  <br>Durch die Bestätigung des buttons 'Akzeptieren' stimmen Sie dem zu.<br>
  Lesen Sie <a class='links' href='/om-os/legal/privacy'>hier unsere Datenschutzerklärung</a>";
  $cookieBTNAll = "Akzeptieren";
  $cookieBTNNess = "Nur Notwendige";
}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
  $cookieInfoHeadline = "We use Cookies!";
  $cookieInfo = "We use cookies to store your settings like language. We use cookies for ads and analytics purpose, to provide our customers a better user expierences.
  <br>By clicking of the button 'Accept' you agreeing to the use of cookies. <br>
  <a class='links' href='/om-os/legal/privacy'>Read our Privacy & cookie policy</a>";
  $cookieBTNAll = "Accept";
  $cookieBTNNess = "Use only necessery cookies";
}else{
  $cookieInfoHeadline = "Denne hjemmeside bruger Cookies";
  $cookieInfo = "Vi bruger cookies for at gemme, dine sprog indstillinger, analyser brugen af hjemmesiden, og at kunne vise relevante reklamer.
  <br>Ved at klikke på knappen 'Acceptere', giver du tilladse til cookies.<br>
  <a class='links' href='/om-os/legal/privacy'>Læs vores Privat & cookie politik</a>";
  $cookieBTNAll = "Acceptere";
  $cookieBTNNess = "Kun nødvendige";
}
?>
<article class="cookie_banner_container intastellarCookieBanner" <? if(strpos($_SERVER["REQUEST_URI"], "/privat/frivillige/admin") != -1){echo "style='display:none;'";}?>>
    <section class="cookie_banner_info">
        <h3><?= $cookieInfoHeadline?></h3>
        <section class="nopadd grid">
            <p>
                <?= $cookieInfo;?>
            </p>
            <div class="btn_container">
              <button class="cookie-btn accept-btn intastellarCookieBanner__accpetAll"><?= $cookieBTNAll?></button>
              <button class="cookie-btn necessery intastellarCookieBanner__accpetNecssery"><?= $cookieBTNNess?></button>
              <!-- <a class="cookie-btn save">Allow Selection</a> -->
            </div>
        </section>
        <!-- <label style="width: 60%;" for="ness">
            <input style="float: left; padding: 10px;" type="checkbox" name="ness" checked disabled id="ness">
            <p style="float: left;">Necessery</p>
        </label>
        <label style="width: 60%;" for="analytics">
            <input style="float: left; padding: 10px;" type="checkbox" name="analytics" id="analytics">
            <p style="float: left;">Analytics</p>
        </label> -->
    </section>
</article>