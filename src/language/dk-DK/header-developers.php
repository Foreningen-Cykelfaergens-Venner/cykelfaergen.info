<?
  $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html";
?>

<!-- Messenger Chat Plugin Code -->
<script>
window.fbAsyncInit = function() {
    FB.init({
    xfbml            : true,
    version          : 'v11.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/da_DK/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://cykelfaergenflensborgfjord.statuspage.io/embed/script.js"></script>
<div id="fb-root"></div>
<header class="main-header <?= $tourdefranceClass;?>">
    <section class="header --dev">
      <!-- <? if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") === false){?>
        <a href="https://www.cykelfaergen.info/tourdebrunsnaes/" class="promoBanner tdf-font">
          <p>Le´ Tour de Brunsnæs</p>
        </a>
        <?}?> -->
        <section class="logo_container">
            <a href="/">
                <img src="https://<?= $mainHost;?>/assets/logo/logo.svg" width="88px" height="88px" alt="Cykelfærgen´s Logo">
            </a>
            <p class="developers-logo">Developers</p>
        </section>
        
      	<section class="menu_icon">
          <section class="menu_container">
            <div class="menu_line"></div>
            <div class="menu_line"></div>
            <div class="menu_line"></div>
          </section>
      	</section>
        <nav class="navigation --dev">
            <!-- <a class="btn header-btn js-btn mobile-visible" href="https://booking.cykelfaergen.info?utm_campaign=Booking2023&utm_source=header-mobile&utm_medium=banner&utm_content=Book+dk" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book - da"
            }),fbq("Lead", {
                "content_name": "Book - da",
                "content_category": "Cykelfærgen - Bookig"
            })'>
              Book
            </a> -->
            <ul>
                <li><a href="https://developers.cykelfaergen.info/timetable/js">Dokumentation</a></li>
                <li><a href="https://developers.cykelfaergen.info/api-keys">API Keys</a></li>
                <li><a href="https://configurator.cykelfaergen.info">Konfigurator</a></li>
            </ul>
        </nav>
        <section class="btn_container <?= $hidden;?>">
          <!-- <a class="btn header-btn js-btn" href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=header&utm_medium=banner&utm_content=Book+oplevelsen" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book oplevelsen"
            }),fbq("Lead", {
                "content_name": "Book oplevelsen",
                "content_category": "Cykelfærgen - Bookig"
            })'>
            Book <span class="mobile-hide">oplevelsen</span>
          </a> -->
      	</section>
        <section class="regionSelectorContainer">
            <button class="regionSelector" title="Vælg sprog"><img src="https://<?= $mainHost;?>/assets/icons/flag-denmark.jpg" width="44px" height="44px" alt="Dansk flag"> <span class="currentRegion">Dansk</span></button>
            <div class="regionSelector-items">
              <div class="regionSelector-items-container">
                <a href="javascript:void(0);" rel="nofollow" data-language="en-GB" title="English"><img class="flag" width="44px" height="44px" alt="UK flag - Valg engelsk sprog" src="https://<?= $mainHost;?>/assets/icons/uk.webp"> English</a>
                <a href="javascript:void(0);" rel="nofollow" data-language="de-DE" title="Deutsch"><img class="flag" width="44px" height="44px" alt="Tysk flag - Valg tysk sprog" src="https://<?= $mainHost;?>/assets/icons/flag-germany.jpg"> Deutsch</a>
              </div>
            </div>
        </section>
        <div style="clear:both;"></div>
      </section>
      <div style="clear:both;"></div>
</header>