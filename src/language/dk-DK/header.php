<?php
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
<div id="fb-root"></div>
<header class="main-header <?= $tourdefranceClass;?>">
    <section class="small-topHeader">
      <a href="<?= $mainHost;?>/service/weather" class="paymentMethods weather" width="109px" height="53px">
      </a>
      <a class="trustpilot-review" href="https://dk.trustpilot.com/evaluate/cykelfaergen.info" target="_blank">Bedøm os på <img src="https://cdn.trustpilot.net/brand-assets/1.8.0/logo-black.svg" alt="Trustpilot"></a>
      <a href="http://alsturbaade.dk" target="_blank" rel="noopener" class="operator">
        Booking via:
        <img class="operator-logo" src="/assets/logo/als-turbaade.png" title="Als Turbåde" alt="Als Turbåde" class="alsturbaade">
      </a>
    </section>
    <section class="header">
      <!-- <? if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") === false){?>
        <a href="https://www.cykelfaergen.info/tourdebrunsnaes/" class="promoBanner tdf-font">
          <p>Le´ Tour de Brunsnæs</p>
        </a>
        <?}?> -->
        <section class="logo_container">
          <a href="">
            <img src="/assets/logo/logo.svg" width="88px" height="88px" alt="Cykelfærgen´s Logo">
          </a>
        </section>
      	<section class="menu_icon">
          <section class="menu_container">
            <div class="menu_line"></div>
            <div class="menu_line"></div>
            <div class="menu_line"></div>
          </section>
      	</section>
        <nav class="navigation">
            <a class="btn header-btn js-btn mobile-visible" href="https://booking.cykelfaergen.info?utm_campaign=Booking2023&utm_source=header-mobile&utm_medium=banner&utm_content=Book+dk<?php echo $fbClId; ?>" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book - da"
            }),fbq("Lead", {
                "content_name": "Book - da",
                "content_category": "Cykelfærgen - Bookig"
            })'>
              Book
            </a>
            <ul>
                <li class="lang"><a class="lang_chooser">Sejlplaner <i class="arrow right-arrow"></i></a>
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
                            echo "<li class='dropdown-item'>Ingen sejlplaner online!</li>";
                            /* return; */
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
                            <li><a href="/#'. str_replace("-", "",str_replace(" ", "",$route)) .'">'. explode("-",mb_convert_encoding($route, "utf-8", "HTML-ENTITIES"))[0]. $via . explode("-",mb_convert_encoding($route, "utf-8", "HTML-ENTITIES"))[1] .'</a></li>
                            ';
                          }
                        ?>
                      </ul>
                  </div>
                </li>
                <li><a href="/#prices">Priser</a></li>
                <li class="lang"><a class="lang_chooser">Special Tours <i class="arrow right-arrow"></i></a>
                  <div class="lang_container nav">
                    <ul class="">
                      <li><a href="/event">Event sejlads</a></li>
                    </ul>
                  </div>
                </li>
                <li class="lang"><span class="lang_chooser">Cykelservice & Oplev <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="/service/repair-and-service-stations">Cykelservice</a></li>
                      <li><a href="/service/weather">Vejrudsigt</a></li>
                      <li><span class="subMenu__anchor">Oplev <i class="arrow right-arrow"></i></span>
                        <div class="subSubMenu">
                          <ul>
                            <li><a href="/oplev">Overnatning / Lej af cykel / Resturant og indkøb</a></li>
                            <li><a href="/langballigau-sonderborg-paa-en-time">Sønderborg - Langballig</a></li>
                            <li><a href="/attraktioner">Attraktioner</a></li>
                          </ul>
                          <!-- <li><a href="/discover/flensburg-fjord-route">Flensburg Fjord Route</a></li> -->
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="lang"><span class="lang_chooser">Færger <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="/ferry/rodsand">Rødsand</a></li>
                      <li><a href="/ferry/thjalfe">Thjalfe</a></li>
                    </ul>
                  </div>
                </li>
                <li><a href="/om-os/find-vej">Find vej</a></li>
                <li class="lang"><span class="lang_chooser">Om os <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <ul>
                      <li><a href="/contact">Kontakt</a></li>
                      <li><a href="/#faq">FAQ</a></li>
                      <li><a href="/#about">Om Færgen</a></li>
                      <li><span class="subMenu__anchor">Foreningen <i class="arrow right-arrow"></i></span>
                        <div class="subSubMenu">  
                          <ul>
                              <li><a href="/om-os/forening/cykelfaergens-venner">Om foreningen</a></li>
                              <li><a href="https://forening.cykelfaergen.info/medlemsskab">Meld dig ind</a></li>
                            </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
            </ul>
        </nav>
        <section class="btn_container <?= $hidden;?>">
          <a class="btn header-btn js-btn" href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=header&utm_medium=banner&utm_content=Book+oplevelsen<?php echo $fbClId; ?>" onclick='gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": "Cykelfærgen - Bookig",
                "event_label": "Book oplevelsen"
            }),fbq("Lead", {
                "content_name": "Book oplevelsen",
                "content_category": "Cykelfærgen - Bookig"
            })'>
            Book <span class="mobile-hide">oplevelsen</span>
          </a>
          <!-- <a class="btn header-btn js-btn" href="https://forening.cykelfaergen.info/medlemsskab">Støt os</a> -->
      	</section>
        <section class="regionSelectorContainer">
            <button class="regionSelector" title="Vælg sprog"><img src="/assets/icons/flag-denmark.jpg" width="44px" height="44px" alt="Dansk flag"> <span class="currentRegion">Dansk</span></button>
            <div class="regionSelector-items">
              <div class="regionSelector-items-container">
                <a href="javascript:void(0);" rel="nofollow" data-language="en-GB" title="English"><img class="flag" width="44px" height="44px" alt="UK flag - Valg engelsk sprog" src="/assets/icons/uk.webp"> English</a>
                <a href="javascript:void(0);" rel="nofollow" data-language="de-DE" title="Deutsch"><img class="flag" width="44px" height="44px" alt="Tysk flag - Valg tysk sprog" src="/assets/icons/flag-germany.jpg"> Deutsch</a>
              </div>
            </div>
        </section>
        <div style="clear:both;"></div>
      </section>
      <div style="clear:both;"></div>
      <?php
        if(strpos($_SERVER["REQUEST_URI"], "forening") !== false && strpos($_SERVER["REQUEST_URI"], "om-os") !== false || strpos($_SERVER["HTTP_HOST"], "forening.cykelfaergen.info") !== false){
          if(strpos($_SERVER["HTTP_HOST"], "forening") !== false){
            $host = str_replace("forening", "www", $_SERVER["HTTP_HOST"]);
          }else{
            $host = $_SERVER["HTTP_HOST"];
          }
          $baseUrl = "https://".$host."/om-os/forening/cykelfaergens-venner";
      ?>
        <aside class="sideNavigation">
          <section class="sideMenu">
            <a href="<?= $baseUrl?>" class="forenings__logo">
              <img src="<?= $mainHost;?>/assets/logo/cykelfaergens_forening__logo.svg" alt="Foreningen Cykelfærgen´s Venner">
            </a>
            <section class="menu_icon sideNavigation__menu_icon">
              <section class="menu_container">
                <div class="menu_line"></div>
                <div class="menu_line"></div>
                <div class="menu_line"></div>
              </section>
            </section>
            <nav class="sideNavigation__menu">
                <a class="sideNavigation__menu__links" href="<?= $baseUrl?>/bestyrelsen">Bestyrelsen</a>
                <!-- <a class="sideNavigation__menu__links" href="https://forening.cykelfaergen.info/hvorfor-medlemsskab">Hvorfor et medlemskab?</a> -->
                <!-- <li class="lang"><span class="lang_chooser">Dokumenter <i class="arrow right-arrow"></i></span>
                  <div class="lang_container nav">
                    <section class="ngo__content">
                      <a class="sideNavigation__menu__links --dropdown" href="<?= $baseUrl?>/referater">Referater</a>
                      <a class="sideNavigation__menu__links --dropdown" href="<?= $baseUrl?>/vedtaegter">Vedtægter</a>
                    </section>
                  </div>
                </li> -->
                <a class="sideNavigation__menu__links" href="<?= $baseUrl?>/projekter">Projekter</a>
                <a href="https://forening.cykelfaergen.info/medlemsskab" class="support__us-btn">Støt os!</a>
            </nav>
          </section>
        </aside>
        <script src="/js/forening.js"></script>
      <?php
        }
      ?>
      <!-- <? if(strpos($_SERVER["REQUEST_URI"], "tourdebrunsnaes") !== false){?>
        <nav class="tourDeNavigation">
          <header class="tourDeNavigation__header">
            <button class="tdfMenuClose">Close</button>
          </header>
          <section class="tourDeNavigation__content">
            <ul>
              <li><a href="/tourdebrunsnaes/">Home</a></li>
              <li><a href="">News</a></li>
              <li><a href="/tourdebrunsnaes/discover/">Oplev</a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul>
          </section>
        </nav>
      <?}?> -->
</header>