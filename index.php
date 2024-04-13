<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
/* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<?
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
    if(new DateTime() <= new DateTime("2023-10-31 23:59:59", new DateTimeZone("Europe/Copenhagen"))){
        include("language/dk-DK/foreningen-banner.php");
    }else{
        include("language/dk-DK/banner.php");
    }
    include("language/dk-DK/home-container.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    if(new DateTime() <= new DateTime("2023-10-31 23:59:59", new DateTimeZone("Europe/Copenhagen"))){
        include("language/de-DE/foreningen-banner.php");
    }else{
        include("language/de-DE/banner.php");
    }
    include("language/de-DE/home-container.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB" || $_SERVER["HTTP_HOST"] == "www.bicycleferry.com" && !isset($_COOKIE["region"])) {
    include("language/en-GB/banner.php");
    include("language/en-GB/home-container.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
} else {
    if(new DateTime() <= new DateTime("2023-10-31 23:59:59", new DateTimeZone("Europe/Copenhagen"))){
        include("language/dk-DK/foreningen-banner.php");
    }else{
        include("language/dk-DK/banner.php");
    }
    include("language/dk-DK/home-container.php");
    $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
}
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
?>
<!-- <script>
    {
      "event": "add_to_cart",
      "value": 100,
      "currency": "DKK",
      "event_category": "Cykelfærgen - Bookig",
      "coupon": "",
      "payment_type": "",
      "affiliation": "Team Booking",
      'ecommerce': {
        "items": [
          {
            "item_id": "",
            "item_name": "",
            "price": "",
            "item_brand": "Cykelfærgen Flensborg Fjord",
            "item_category": "Rute Sejlads",
            "item_category2": "[Hvilken Rute f.eks. Egernsund-Langballig]",
            "coupon": "",
            "discount": "",
            "quanity": "",
            "item_variant": "[Cykel type]"
          }
        ]
      }
    },
    {
      "event": "view_item",
      "value": 100,
      "currency": "DKK",
      "event_category": "Cykelfærgen - Bookig",
      "coupon": "",
      "payment_type": "",
      "affiliation": "Team Booking",
      'ecommerce': {
        "items": [
          {
            "item_id": "",
            "item_name": "",
            "price": "",
            "item_brand": "Cykelfærgen Flensborg Fjord",
            "item_category": "Rute Sejlads",
            "item_category2": "[Hvilken Rute f.eks. Egernsund-Langballig]",
            "coupon": "",
            "discount": "",
            "quanity": "",
            "item_variant": "[Cykel type]"
          }
        ]
      }
    },
    {
      "event": "begin_checkout",
      "value": 100,
      "currency": "DKK",
      "event_category": "Cykelfærgen - Bookig",
      "coupon": "",
      "payment_type": "",
      "affiliation": "Team Booking",
      'ecommerce': {
        "items": [
          {
            "item_id": "",
            "item_name": "",
            "price": "",
            "item_brand": "Cykelfærgen Flensborg Fjord",
            "item_category": "Rute Sejlads",
            "item_category2": "[Hvilken Rute f.eks. Egernsund-Langballig]",
            "coupon": "",
            "discount": "",
            "quanity": "",
            "item_variant": "[Cykel type]"
          }
        ]
      }
    },
    {
      "event": "add_shipping_info",
      "value": 100,
      "currency": "DKK",
      "event_category": "Cykelfærgen - Bookig",
      "coupon": "",
      "payment_type": "",
      "affiliation": "Team Booking",
      'ecommerce': {
        "items": [
          {
            "item_id": "",
            "item_name": "",
            "price": "",
            "item_brand": "Cykelfærgen Flensborg Fjord",
            "item_category": "Rute Sejlads",
            "item_category2": "[Hvilken Rute f.eks. Egernsund-Langballig]",
            "coupon": "",
            "discount": "",
            "quanity": "",
            "item_variant": "[Cykel type]"
          }
        ]
      }
    },
    {
      "event": "refund",
      "transaction_id": "",
      "value": 100,
      "currency": "DKK",
      "event_category": "Cykelfærgen - Bookig",
      "coupon": "",
      "payment_type": "",
      "affiliation": "Team Booking",
      'ecommerce': {
        "items": [
          {
            "item_id": "",
            "item_name": "",
            "price": "",
            "item_brand": "Cykelfærgen Flensborg Fjord",
            "item_category": "Rute Sejlads",
            "item_category2": "[Hvilken Rute f.eks. Egernsund-Langballig]",
            "coupon": "",
            "discount": "",
            "quanity": "",
            "item_variant": "[Cykel type]"
          }
        ]
      }
    }
</script> -->