<?php
    /* include("../db.php"); */
    if(!isset($_COOKIE["region"])){
        if($_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" || isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/"){
          $lang = "de-DE";
        }else if($_SERVER["HTTP_HOST"] == "www.bicycleferry.com" || isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "https://www.bicycleferry.com/"){
            $lang = "en-GB";
        }else{
          $lang = "da-DK";
        }
    }else{
        $lang = $_COOKIE["region"];
    }

    if($lang == "da-DK"){
        $serviceMessage = array(
            "Storm 2023: Gendarmstien info: <a href='https://www.cykelfaergen.info/service/info/storm-gendarmstien'>Læs mere</a>",
            "Booking for sæson 2024 er åben! <a href='https://booking.cykelfaergen.info'>Book her.</a>",
            "Vi søger medlemmer! Vil du lære mere om vores forening så <a href='/om-os/forening/cykelfaergens-venner'>læs mere her.</a>"
        );
    }else if($lang == "de-DE"){
        $serviceMessage = array(
            "Buchung für die Saison 2024 ist geöffnet! <a href='https://booking.cykelfaergen.info'>Buchen Sie hier.</a>",
            "Wir segeln bis einschließlich 8. September gemäß dem Fahrplan"
        );
    }else if($lang == "en-GB"){
        $serviceMessage = array(
            "Booking for season 2024 is open! <a href='https://booking.cykelfaergen.info'>Book here.</a>",
            "We sail up to and including September 8 according to the sailing schedule"
        );
    }else{
        $serviceMessage = array(
            "Storm 2023: Gendarmstien info: <a href='https://www.cykelfaergen.info/service/info/storm-gendarmstien'>Læs mere</a>",
            "Booking for sæson 2024 er åben! <a href='https://booking.cykelfaergen.info'>Book her.</a>",
            "Vi søger medlemmer! Vil du lære mere om vores forening så <a href='/om-os/forening/cykelfaergens-venner'>læs mere her.</a>"
        );
    }

    $sql = "SELECT * FROM services_operation WHERE service_operation_stand = 0";
    $query = mysqli_query($db, $sql);
    $row_num = mysqli_num_rows($query);

    while($row = $query->fetch_assoc()){
        $msg = $row["service_operation_msg"];
        if(!isset($_COOKIE["region"])){
            if($_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info"){
              $lang = "de-DE";
            }else{
              $lang = "da-DK";
            }
          }else{
            $lang = $_COOKIE["region"];
          }

        if($lang != "da-DK"){
            $sql = "SELECT * FROM operation_dic WHERE from_lang = '$msg' AND lang = '$lang'";
            $query = mysqli_query($db, $sql);
            while($rows = $query->fetch_assoc()){
              $msg = $rows["to_lang"];
              array_push($serviceMessage, mb_convert_encoding($msg, 'UTF-8', 'HTML-ENTITIES'));
            }
            
        }else{
            array_push($serviceMessage, mb_convert_encoding($msg, 'UTF-8', 'HTML-ENTITIES'));
        }
    }
?>
<article class="services-banner" style="<?php if(empty($serviceMessage)){ echo "display: none;";}?>width: 100%; min-height: 70px; max-height: 350px; box-sizing: border-box; height: auto; display:flex; flex-direction:column; justify-content:center;align-items:center;background:rgb(4, 108, 109);color:#ffffff;top:0;left:0;z-index:1;">
    <section class="services-banner-content service-messages">
        <?php
        if(is_array($serviceMessage)){
            foreach($serviceMessage as $key){
                echo "<div class='service-message'>".$key."</div>";
            }
        }
        ?>
    </section>
</article>
<style>

    .slick-track{
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .services-banner-img{
        object-fit: cover;
    }
    .wss{
        width: calc(49% - 30px);
    }
    .services-banner-content{
        text-align: center;
        max-width: 1200px;
        width: 100%;
        overflow: hidden;
        display: flex;
    }

    .service-messages{
        font-size: 15px;
    }

    .service-messages a{
        display: inline-block;
        color: #c6c6c6;
        text-decoration: underline;
        padding: 0 5px;
    }

    .service-message{
        display: flex;
        justify-content: center;
    }

    .service-article{
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 54px !important;
        display: flex;
        flex-shrink: 0;
        width: 100%;
    }

    @media screen and (min-width: 320px) and (max-width: 900px){
        .wss{
            width: calc(90% - 30px);
        }
        .services-banner-content{
            width: 100%;
        }
    }
</style>