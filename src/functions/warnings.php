<?
$root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html";

if(!isset($_COOKIE["region"])){
  if($_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" || $_SERVER['HTTP_REFERER'] == "https://www.fahrradfaehre.info/"){
    $lang = "de-DE";
  }else{
    $lang = "da-DK";
  }
}else{
  $lang = $_COOKIE["region"];
}

if($lang == "da-DK"){
  $serviceMessage = "På grund af vejrforholdene er alle ture aflyst tirsdag d 4/7 og ligeledes er turen 12.30 og resten af dage aflyst onsdag 5/7";
}else if($lang == "de-DE"){
  $serviceMessage = "Aufgrund der Wetterbedingungen entfallen alle Touren am Dienstag, den 4.7. - Mittwoch, den 5.7., abgesagt. Alle turen heute dem 3.7. sind auch abgesaget.";
}else if($lang == "en-GB"){
  $serviceMessage = "Due to the weather conditions, all tours are canceled on Tuesday 4/7 and also the 12.30 tour and the rest of the days are canceled on Wednesday 5/7";
}else{
  $serviceMessage = "På grund af vejrforholdene er alle ture aflyst tirsdag d 4/7 og ligeledes er turen 12.30 og resten af dage aflyst onsdag 5/7";
}
/* if($row_num > 0){ */
 ?>
    <article class="services-banner fixed-banner" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; min-height: 70px; padding: 5px; box-sizing: border-box; height: auto; display:flex;justify-content:center;align-items:center;background:rgba(108,0,0,1);color:#d9d9d9;z-index:10000;">
      <section class="services-banner-content">
          	<h3>INFORMATION</h3>
          	<p><?php echo $serviceMessage;?></p>
        </section>
        <button class="service-banner--close close">X</button>  
    </article>
    <style>
        .wss{
            width: calc(49% - 30px);
        }
      	.services-banner-content{
      		text-align: center;
      	}
      
        @media screen and (min-width: 320px) and (max-width: 900px){
            .wss{
                width: calc(90% - 30px);
            }
        }
    </style>
    <script>
        document.querySelector(".service-banner--close").addEventListener("click", function(){
          if(localStorage.getItem("hideInfoBanner")){
            if(localStorage.getItem("hideInfoBanner") == null || localStorage.getItem("hideInfoBanner") == "null"){
              localStorage.setItem("hideInfoBanner", "1");
              window.location.reload();
            }else if(localStorage.getItem("hideInfoBanner") == 1){
              document.querySelector(".fixed-banner").style.display = "none";
            }
          }else if(!localStorage.getItem("hideInfoBanner")){
            localStorage.setItem("hideInfoBanner", "1");
            window.location.reload();
          }
        });
        if(localStorage.getItem("hideInfoBanner") && localStorage.getItem("hideInfoBanner") == 1){
          document.querySelector(".fixed-banner").style.display = "none";
        }
    </script>
<?
/* } */
?>