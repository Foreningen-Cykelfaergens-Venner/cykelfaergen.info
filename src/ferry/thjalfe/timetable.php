<?
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
//echo $ip;
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
$img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg";
if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"])) {
    $title = "Færge Thjalfe";
    $description = "Hvad gøre Cykelfærgen bedre end MS Feodora II? Eller er de begge lige godt? Find det ud af her!";
}else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
    $title = "Fähre Thjalfe";
    $description = "Hvad gøre Cykelfærgen bedre end MS Feodora II? Eller er de begge lige godt? Find det ud af her!";
} else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
    $title = "Ferry Thjalfe";
    $description = "Hvad gøre Cykelfærgen bedre end MS Feodora II? Eller er de begge lige godt? Find det ud af her!";
}
require_once($_SERVER["DOCUMENT_ROOT"]."/components/timetable.php");
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?><main class="container content">
    <?php createTimetable(1); ?>
    <script>
        document.querySelectorAll(".harbor").forEach((harbor, i) => {
            harbor.addEventListener("click", function() {
                this.querySelector(".arrow").classList.toggle("arrowUp");
                document.querySelectorAll(".departureTime")[i].classList.toggle("show");

            })
        })
        const isOpen = document.querySelectorAll(".current");
        isOpen.forEach((isOpen) => {
            if(isOpen != null){
                isOpen.parentElement.parentElement.parentElement.querySelectorAll(".arrowDown").forEach((arrow) => {
                    arrow.classList.add("arrowUp");
                });
            }
        })
    </script>
  </main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>