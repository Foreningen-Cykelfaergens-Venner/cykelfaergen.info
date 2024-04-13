<?
  /* $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html"; */
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
            <p class="developers-logo">Configurator</p>
        </section>
        
      	<section class="menu_icon">
          <section class="menu_container">
            <div class="menu_line"></div>
            <div class="menu_line"></div>
            <div class="menu_line"></div>
          </section>
      	</section>
        <nav class="navigation --dev" style="display: flex;
justify-content: space-between;
align-items: center;">
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
                <li><a href="https://configurator.cykelfaergen.info">Konfigurator</a></li>
                <li><a href="https://developers.cykelfaergen.info/timetable/configurator">Dokumentation</a></li>
            </ul>
        </nav>
        <section style="display: flex; align-items: center; float: right; height: 80px;">
          <?php
              if(isset($row["company_name"]) || isset($row["company_name"]) != ""){
                  echo "<a href='/account' style='margin-right: 10px;'>". $companyName ."</a>";
              }
          ?>
          <?php
            if(isset($_SESSION["logged"])){
            ?>
            <a href="/logout" class="cta header-btn" style="display: block;
            width: max-content; margin: 0;">Logout</a>
            <?}?>
        </section>
        <div style="clear:both;"></div>
      </section>
      <div style="clear:both;"></div>
</header>