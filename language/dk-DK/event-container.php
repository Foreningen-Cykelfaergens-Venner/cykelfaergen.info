<?
    $sql = "SELECT bookings__date FROM event_bookings";
    $query = mysqli_query($db, $sql);
?>
<main class="container">
    <article class="banner event__banner">
        <div class="grdin-overlay dark"></div>
        <section class="banner_container grid">
            <section class="banner_txt">
                <h1 class="banner__headline">Forkæl dine kære!</h1>
                <p>Book et eventsejlads for dig og dem du holder mest af. Nyd i sommeren 2023 en 3 timers ophold på cykelfærgen og sejl langs Flensborg Fjord.</p>
            </section>
            <section>
                <h2 class="banner__headline2">Reserver din sejlads via <b>(kun)</b> telefon i dag!</h2>
                <a class="banner__headline2" href="tel: +45 20256462">Ring til Skipper Palle Heinrich på: <br><b>+45 20256462</b></a>
            </section>
        </section>
    </article>
    <section class="content">
        <!-- <? include("components/bookingSystem/showCalendar.php");?> -->
        <h2>Eventsejlads</h2>
        <p>Book en tur til dig og din familie eller bestil en firmaudflugt på Flensborg Fjord!</p>
        <article class="info">
            <h2>Generelle informationer</h2>
            <p>Læs her om vores generelle informationer.</p>
            <ul>
                <li><strong>Maks 12 personer!</strong></li>
                <li>fra kl. 18:00</li>
                <li>Mindst 3 timer</li>
            </ul>

            <h4>Priser:</h4>
            <p>pr. planlagt 3 timers event-sejlads min. 2.800,00 kr.</p>
            <p>950,00 kr. i timen</p>
        </article>
    </section>
</main>