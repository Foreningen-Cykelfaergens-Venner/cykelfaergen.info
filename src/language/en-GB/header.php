<?
  $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html";
?>
<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->
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
    js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<header class="main-header <?= $tourdefranceClass;?>">
  <section class="small-topHeader">
      <a href="https://<?= $mainHost;?>/service/weather" class="paymentMethods weather" width="109px" height="53px"></a>
      <a class="trustpilot-review" href="https://en.trustpilot.com/evaluate/cykelfaergen.info" target="_blank">Review us on <img src="https://cdn.trustpilot.net/brand-assets/1.8.0/logo-black.svg" alt="Trustpilot"></a>
      <a href="http://alsturbaade.dk" target="_blank" rel="noopener" class="operator">
        Booking via:
        <img class="operator-logo" src="https://<?= $mainHost;?>/assets/logo/als-turbaade.png" title="Als Turbåde" alt="Als Turbåde" class="alsturbaade">
      </a>
    </section>
    <section class="header">
      <!-- <? if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") === false){?>
        <a href="https://www.cykelfaergen.info/tourdebrunsnaes/" class="promoBanner tdf-font">
          <p>Le´ Tour de Brunsnæs</p>
        </a>
      <?}?> -->
        <section class="logo_container">
          <a href="https://<?= $mainHost;?>"><img src="https://<?= $mainHost;?>/assets/logo/logo.svg" width="88px" height="88px" alt="Cykelfærgen´s Logo"></a>
        </section>
      	<section class="menu_icon">
          <section class="menu_container">
            <div class="menu_line"></div>
            <div class="menu_line"></div>
            <div class="menu_line"></div>
          </section>
      	</section>
        <nav class="navigation">
            <a class="btn header-btn js-btn mobile-visible" href="https://booking.cykelfaergen.info?utm_campaign=Booking2023&utm_source=header-mobile&utm_medium=banner&utm_content=Book+en<?php echo $fbClId; ?>" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book"
            }), fbq("Lead", {
                "content_category": "Cykelfærgen - Bookig",
                "content_name": "Book"
            })'>
              Book
            </a>
            <ul>
                <li class="lang"><a class="lang_chooser">Timetable <i class="arrow right-arrow"></i></a>
                  <div class="lang_container nav">
                  <ul class="">
                        <?php
                          $sql = "SELECT activeRoute.*, GROUP_CONCAT(harbor.name SEPARATOR ', ') AS via FROM routes AS activeRoute
                          LEFT JOIN `stop` via ON activeRoute.id = via.route
                          LEFT JOIN harbor ON via.name = harbor.id
                          WHERE activeRoute.display_from <= '". date("Y-m-d") ."'
                          AND activeRoute.display_to >= '". date("Y-m-d") . "'
                          GROUP BY activeRoute.id";
                          $result = mysqli_query($db,$sql);
                          $num = mysqli_num_rows($result);
                          if($num == 0){
                            echo "<li>No active timetable!</li>";
                          }

                          while($row = $result->fetch_assoc()){
                            $route = $row["name"];
                            $viaRoute = $row["via"];

                            $viaArray = explode(",",$viaRoute);
                            $viaArray  = array_filter($viaArray);
                            $lastVia = array_pop($viaArray);

                            $firstDays = $viaArray;
                            $newVia = "";
                            foreach($firstDays as $types => $day){
                                /* echo $day; */
                                $newVia .= $day . ",";
                                $newVia = explode(",", $newVia);
                                $newVia = implode(", ", $newVia);
                            }
                            if($newVia != ""){
                                $newVia = substr($newVia, 0, -2);
                                $newVia .= " & ";
                            }

                            $route = mb_convert_encoding($route, "utf-8", "HTML-ENTITIES");
                            if(!empty($viaRoute)){
                              $via = " - ". mb_convert_encoding($newVia, "utf-8", "HTML-ENTITIES") . mb_convert_encoding($lastVia, "utf-8", "HTML-ENTITIES") . " - ";
                            }else {
                                $via = " - ";
                            }
                            echo '
                            <li><a href="https://'. $mainHost .'/#'. str_replace("-", "",str_replace(" ", "",$route)) .'">'. explode("-",mb_convert_encoding($route, "utf-8", "HTML-ENTITIES"))[0]. $via . explode("-",mb_convert_encoding($route, "utf-8", "HTML-ENTITIES"))[1] .'</a></li>
                            ';
                          }
                        ?>
                      </ul>
                  </div>
                </li>
                <li><a href="https://<?= $mainHost;?>/#prices">Price</a></li>
                <li class="lang"><a class="lang_chooser">Special Tours <i class="arrow right-arrow"></i></a>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="https://<?= $mainHost;?>/event">Event tours</a></li>
                    </ul>
                  </div>
                </li>
                <li class="lang"><span class="lang_chooser">Service & discover <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="https://<?= $mainHost;?>/service/repair-and-service-stations">Bikeservice</a></li>
                      <li><a href="https://<?= $mainHost; ?>/service/weather">Weatheforcast</a></li>
                      <li><span class="subMenu__anchor">Discover <i class="arrow right-arrow"></i></span>
                        <div class="subSubMenu">
                          <ul>
                            <li><a href="https://<?= $mainHost;?>/discover/with-your-bike-on-royal-tour">With your bike on royal tour</a></li>
                            <li><a href="https://<?= $mainHost;?>/hikers-and-cyclist">Hikers & Cyclist</a></li>
                          </ul>
                          <!-- <li><a href="https://<?= $mainHost;?>/discover/flensburg-fjord-route">Flensburg Fjord Route</a></li> -->
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="lang"><span class="lang_chooser">Ferries <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="https://<?= $mainHost;?>/ferry/rodsand">Rødsand</a></li>
                      <li><a href="https://<?= $mainHost;?>/ferry/thjalfe">Thjalfe</a></li>
                    </ul>
                  </div>
                </li>
                <li><a href="https://<?= $mainHost;?>/om-os/find-vej">Ferry Stops</a></li>
                <li class="lang"><span class="lang_chooser">About us <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="https://<?= $mainHost;?>/contact">Contact</a></li>
                      <li><a href="https://<?= $mainHost;?>/#faq">FAQ</a></li>
                      <li><a href="https://<?= $mainHost;?>/#about">About the Ferry</a></li>
                    </ul>
                  </div>
                </li>
            </ul>
        </nav>
        <section class="btn_container <?= $hidden;?>">
          <a class="btn header-btn js-btn" href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=header&utm_medium=banner&utm_content=Book+expierence<?php echo $fbClId; ?>" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book expierence"
            }), fbq("Lead", {
                "content_category": "Cykelfærgen - Bookig",
                "content_name": "Book expierence"
            })'>
            Book <span class="mobile-hide">expierence</span>
          </a>
      	</section>
        <section class="regionSelectorContainer">
            <button class="regionSelector" title="Choose language"><img src="https://<?= $mainHost;?>/assets/icons/uk.webp" width="44px" height="44px" alt="English Flag"> <span class="currentRegion">English</span></button>
            <div class="regionSelector-items">
              <div class="regionSelector-items-container">
                <a href="javascript:void(0);" rel="nofollow" data-language="da-DK" title="Dansk"><img class="flag" alt="Danish flag - choose danish language" width="44px" height="44px" src="https://<?= $mainHost;?>/assets/icons/flag-denmark.jpg"> Dansk</a>
                <a href="javascript:void(0);" rel="nofollow" data-language="de-DE" title="Deutsch"><img class="flag" width="44px" height="44px" alt="Tysk flag - Valg tysk sprog" src="https://<?= $mainHost;?>/assets/icons/flag-germany.jpg"> Deutsch</a>
              </div>
            </div>
        </section>
        <div style="clear:both;"></div>
    </section>
    <!-- <? if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") !== false){?>
        <nav class="tourDeNavigation">
          <header class="tourDeNavigation__header">
            <button class="tdfMenuClose">Close</button>
          </header>
          <section class="tourDeNavigation__content">
            <ul>
              <li><a href="/tourdebrunsnaes/">Home</a></li>
              <li><a href="">News</a></li>
              <li><a href="/tourdebrunsnaes/discover/">Discover</a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul>
          </section>
        </nav>
      <?}?> -->
</header>