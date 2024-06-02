<?
    /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();
    //echo $ip;
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
    /* if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" && $_SERVER["REQUEST_URI"] !== "/mein-erlebnis"){
        header("Location: /mein-erlebnis");
    } */

    $img = "https://".$mainHost."/ images/bg/sonderborg/Byens havn (2).jpg";
    if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
        $title = "Guide: Erlebe Nordschleswig: Ein umfassender Reiseführer ";
        $description = "Entdecken Sie Nordschleswig mit unserem umfassenden Reiseführer. Erfahren Sie alles über die besten 	Sehenswürdigkeiten, Aktivitäten und Unterkünfte in der Region. Planen Sie Ihre perfekte Reise und erleben Sie die Schönheit von Nordschleswig. Klicken Sie hier, um den Reiseführer zu lesen und Ihre Abenteuer zu planen.";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
        $title = "Guide: Erlebe Nordschleswig: Ein umfassender Reiseführer";
        $description = "Entdecken Sie Nordschleswig mit unserem umfassenden Reiseführer. Erfahren Sie alles über die besten 	Sehenswürdigkeiten, Aktivitäten und Unterkünfte in der Region. Planen Sie Ihre perfekte Reise und erleben Sie die Schönheit von Nordschleswig. Klicken Sie hier, um den Reiseführer zu lesen und Ihre Abenteuer zu planen.";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
        $title = "Guide: Erlebe Nordschleswig: Ein umfassender Reiseführer ";
        $description = "Entdecken Sie Nordschleswig mit unserem umfassenden Reiseführer. Erfahren Sie alles über die besten 	Sehenswürdigkeiten, Aktivitäten und Unterkünfte in der Region. Planen Sie Ihre perfekte Reise und erleben Sie die Schönheit von Nordschleswig. Klicken Sie hier, um den Reiseführer zu lesen und Ihre Abenteuer zu planen.";
    } else {
        $title = "Guide: Erlebe Nordschleswig: Ein umfassender Reiseführer ";
        $description = "Entdecken Sie Nordschleswig mit unserem umfassenden Reiseführer. Erfahren Sie alles über die besten 	Sehenswürdigkeiten, Aktivitäten und Unterkünfte in der Region. Planen Sie Ihre perfekte Reise und erleben Sie die Schönheit von Nordschleswig. Klicken Sie hier, um den Reiseführer zu lesen und Ihre Abenteuer zu planen.";
    }
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container content">
    <h1 class="ppad">Guide: Erlebe Nordschleswig: Ein umfassender Reiseführer</h1>
    <section class="no-flex">
        <h2>Willkommen zu unserem umfassenden Reiseführer für Nordschleswig</h2>
        <p>Willkommen zu unserem umfassenden Reiseführer für Nordschleswig, eine faszinierende Region im südlichen Teil Dänemarks. Hier finden Sie alles, was Sie für eine unvergessliche Reise benötigen, einschließlich der Möglichkeit, mit der Fahrradfähre Flensburger Förde den Flensburger Fjord zu überqueren und neue Gebiete zu erkunden. Planen Sie Ihre Überfahrt mit dem internen Buchungslink der <a href="https://booking.cykelfaergen.info">Fahrradfähre Flensburger Förde</a>.</p>
    </section>
    <section>
        <h2>Entdecken Sie die Natur im UNESCO-Weltnaturerbe Wattenmeer</h2>
        <p>Nordschleswig bietet eine beeindruckende Vielfalt an Aktivitäten und Sehenswürdigkeiten, die jeden Besucher begeistern werden. Tauchen Sie ein in die atemberaubende Natur des UNESCO-Weltnaturerbes Wattenmeer, wo Sie geführte Wattwanderungen unternehmen und die einzigartige Tier- und Pflanzenwelt erkunden können.</p>
    </section>
    <section class="no-flex">
        <h2>Entdecken Sie die reiche Geschichte von Nordschleswig</h2>
        <p>Nehmen Sie sich Zeit, um die reiche Geschichte von Nordschleswig zu entdecken. Besichtigen Sie das Schloss Egeskov, eine gut erhaltene Wasserburg aus dem 16. Jahrhundert, oder das Schloss Frederiksborg, das als "dänisches Versailles" bekannt ist. Erfahren Sie mehr über die deutsche Minderheit in Dänemark im Historiecenter Dybbøl Banke.</p>
    </section>
    <section>
        <h2>Erleben Sie Outdoor-Abenteuer in Nordschleswig</h2>
        <p>Für Outdoor-Enthusiasten bietet Nordschleswig eine Vielzahl von Möglichkeiten. Nutzen Sie das gut ausgebaute Netz von Radwegen, um die Region auf dem Fahrrad zu erkunden und den Flensburger Fjord mit der Fahrradfähre Flensburger Förde zu überqueren. Unternehmen Sie Wanderungen durch schöne Waldgebiete, entlang von Flüssen und zu atemberaubenden Aussichtspunkten. Probieren Sie Wassersportarten wie Segeln, Windsurfen und Angeln aus oder spielen Sie eine Runde Golf inmitten der idyllischen Landschaft.</p>
    </section>
    <section class="no-flex">
        <h2>Genießen Sie die kulinarischen Genüsse von Nordschleswig</h2>
        <p>Die kulinarischen Genüsse von Nordschleswig dürfen Sie nicht verpassen. Probieren Sie frischen Fisch und Meeresfrüchte, traditionelle dänische Gerichte wie Smørrebrød (belegte Brote) und erkunden Sie die aufstrebende Craft-Bier-Szene.</p>
    </section>
    <section class="no-flex">
        <h2>Planen Sie Ihre Reise und Buchen Sie die Fahrradfähre Flensburger Förde</h2>
        <p>Nutzen Sie diesen umfassenden Reiseführer, um Ihre Reise nach Nordschleswig zu planen und die Vielfalt dieser Region voll auszukosten. Buchen Sie Ihre Fahrradfähre mit dem internen Buchungslink der <a href="https://booking.cykelfaergen.info" target="_blank">Fahrradfähre Flensburger Förde</a> und machen Sie sich bereit für unvergessliche Erlebnisse in Nordschleswig.</p>
    </section>
</main>
<script src="/js/form.js"></script>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include("scripts/script.php");