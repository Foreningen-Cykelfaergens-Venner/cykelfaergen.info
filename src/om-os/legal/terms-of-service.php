<?php

    $title = "Terms of service | Booking - Cykelfærgen Flensborg Fjord";
    $description = "The terms of servie for booking a ride on Cykelfærgen Flensborg Fjord";

    /* if(strpos($_SERVER['HTTP_REFERER'], "fahrradfaehre.info") > -1){
        setcookie("region", "de-DE");
    } */

    $root = str_replace("booking", "public_html", $_SERVER["DOCUMENT_ROOT"]);
    include($root."/components/header.php");
?>
<main class="content">
    <section class="breadCrumb">
        <a href="https://<?= $mainHost;?>">Forside</a> / <a href="/">Booking</a> / <a href="/terms/terms-and-privacy">Terms</a>
    </section>
    <section>
        <?php
            if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK" || !isset($_COOKIE["region"])){
        ?>
            <h1>Booking</h1>
            <section>
                <p>Als turbåde for</p>
                <h2>Cykelfærgen Flensborg Fjord</h2>
                <p>Handelsbetingelser og persondata politik</p>
                <h3>Booking</h3>
                <p>
                Alle priser i vores online bookingsystem er oplyst i Dkr. Inc. relevante afgifter. (person transport er ikke moms belagt)
                Betaling forgår ved at benytte de i online Bookingsystemet accepterede betalingskort, samt mobilepay.
                Ved ledig plads vil der også kunne købes billet under overfarten
                Kvittering/ billet fremsendes pr. mail, og skal kunne fremvises, enten elektronisk eller i form af print, også ved retur sejlads.
                Fremmøde senest 5 min før afgang, ellers bortfalder reservationen.
                </p>
                <h3>Fortrydelse</h3>
                <p>
                Du har mulighed for at om booke din købte billet i online booking systemet
                Du har mulighed for at annullere din billet indtil 48 timer før bestilte afgang ved fremsendelse af mail
                Gruppe dekort betragtes som manglende fremmøde og der refunderes ikke for den/ de manglende personer i gruppen
                Chartertur forfalder til betaling senest på afgangstidspunktet
                Chartertur kan om bokkes indtil 48 timer før afgang
                Chartertur kan afbestilles indtil 48 timer før afgang, administrationsgebyr 10% refunderes ikke
                Chartertur der afbestilles under 48 timer refunderes med 50 %</p>
                <h3>Handel på internettet</h3>
                <p>
                Du er som forbruger sikret i forhold til eventuel misbrug af dit betalingskort via internettet
                Du kan læse mere om hvordan du som forbruger, skal forholde dig til betalinger på nettet på følgende hjemmesider
                www.betaling.dk www.fdih.dk</p>
                <h3>Registrering af oplysninger</h3>
                <p>
                Als turbaade registrerer dit navn, din adresse, din e-mail, samt andre oplysninger afgivet i forbindelse med købet i kundekartotek.
                Oplysningerne gemmes i 5 år
                Oplysningerne videregives ikke
                Der anvendes cookies til statistikker og til at holde styr på de afgivne data i bookingforløbet
                Ved betaling med kreditkort sker betalingen via en sikker server, hvor oplysningerne krypteres, før de sendes over internettet.
                Der gemmes ingen kreditkort oplysninger på Cykelfærgens server
                </p>

                <h3>Reklamationsbehandling</h3>
                <p>
                Modtager du ikke en billet som bekræfter dit køb, og du ikke har modtaget en fejlmeddelelse fra systemet, så kan du kontakte os på nedenstående mail, evt. tlf nr
                Klage over bookingforløbet eller modtaget ydelse, skal ske inden for rimelig tid, efter du har opdaget fejlen, eller burde have opdaget fejlen ved almindelig gennemgang af din billet/ kvittering.
                </p>
                <p>Når rederiet modtager din klage, behandles klagen hurtigst muligt.</p>
                <h3>Virksomhedsoplysninger Drift</h3>
                <p>
                <address>
                    Als turbaade<br>
                    Namm2019 aps <br>
                    Svennesmølle 18a <br>
                    6470 Sydals
                </address>
                Mommark99@gmail.com<br>
                +4520256462<br>
                CVR 41260629
                </p>
            </section>
        <?}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){?>
            <h1>Buchung</h1>
            <section>
            <p>„Als Turbaade“ für</p>
                <h2>Fahrradfähre Flensburg Förde
(Cykelfærgen Flensborg Fjord)
</h2>
                <p>Allgemeine Geschäftsbedingungen und Datenschutzrichtlinien</p>
                <h3>Buchungen</h3>
                <p>
                Alle Preise in unserem Online-Buchungssystem sind in DKK angegeben. Einschließlich der entsprechenden Steuern. (Die Personenbeförderung unterliegt nicht der Mehrwertsteuer).
                Die Zahlung erfolgt mit den im Online-Buchungssystem akzeptierten Zahlungskarten sowie mit MobilePay.
                Bei vorhandenem Platz ist es auch möglich, ein Ticket während der Überfahrt zu kaufen.
                Die Quittung/der Fahrschein wird per E-Mail zugesandt und muss entweder elektronisch oder in Form eines Ausdrucks bei Hin- und Rückfahrt vorgelegt werden.
                Anwesenheit spätestens 5 Minuten vor der Abfahrt, sonst wird die Reservierung storniert.
                </p>
                <h3>Stornierungen</h3>
                <p>
                Sie haben die Möglichkeit, Ihr gekauftes Ticket im Online-Buchungssystem umzubuchen.
                Sie haben die Möglichkeit, Ihr Ticket bis zu 48 Stunden vor der gebuchten Abfahrt per E-Mail zu stornieren.
                Bei Gruppenbuchung erfolgt bei geringerer Teilnehmerzahl keine Rückerstattung. Ansonsten gelten die gleichen Bedingungen für Umbuchung und Stornierung wie für ein persönliches Ticket.
                Die Zahlung für die Chartertour ist spätestens zum Zeitpunkt der Abfahrt fällig.
                Die Chartertour kann bis zu 48 Stunden vor der Abfahrt umgebucht werden.
                Die Chartertour kann bis zu 48 Stunden vor der Abfahrt storniert werden. Die Verwaltungsgebühr von 10% wird nicht zurückerstattet.
                Für Chartertouren, die weniger als 48 Stunden vor Abfahrt storniert werden, erfolgt eine 50% Erstattung.</p>
                <h3>Handel im Internet</h3>
                <p>
                Als Verbraucher sind Sie vor einem möglichen Missbrauch Ihrer Zahlungskarte im Internet geschützt.
                Weitere Informationen darüber, wie Verbraucher mit Online-Zahlungen umgehen sollten, finden Sie auf den folgenden Websites www.betaling.dk; www.fdih.dk </p>
                <h3>Registrierung von Daten</h3>
                <p>
                „Als Turbaade“ speichert Ihren Namen, Ihre Anschrift, Ihre E-Mail-Adresse und andere im Zusammenhang mit dem Kauf gemachte Angaben in der Kundendatenbank.
                Diese Informationen werden 5 Jahre lang gespeichert.
                Die Daten werden nicht weitergegeben.
                Cookies werden für Statistiken und zur Nachverfolgung der im Buchungsprozess angegebenen Daten verwendet.
                Bei Zahlung per Kreditkarte erfolgt die Zahlung über einen sicheren Server, auf dem die Daten verschlüsselt werden, bevor sie über das Internet gesendet werden.
                Es werden keine Kreditkarteninformationen auf dem Server von „Cykelfærgen“ gespeichert.
                </p>

                <h3>Bearbeitung von Reklamationen</h3>
                <p>Sollten Sie kein Ticket erhalten haben, das Ihren Kauf betrifft und sollten Sie keine Fehlermeldung vom System erhalten haben, können Sie uns unter der unten angegebenen E-Mail-Adresse oder per Telefon kontaktieren.</p>
                <p>
                Beschwerden über den Buchungsvorgang oder den erhaltenen Service müssen, nachdem Sie den Fehler entdeckt haben oder durch eine gewöhnliche Überprüfung Ihres Tickets / Ihrer Quittung hätten entdecken müssen innerhalb eines angemessenen Zeitraums vorgebracht werden.
                </p>
                <p>Wenn die Reederei Ihre Beschwerde erhält, wird sie diese so schnell wie möglich bearbeiten.</p>
                <h3>Angaben zum Unternehmen</h3>
                <p>
                <address>
                    Als turbaade<br>
                    Namm2019 aps <br>
                    Svennesmølle 18a <br>
                    6470 Sydals
                </address>
                Mommark99@gmail.com<br>
                +4520256462<br>
                CVR 41260629
                </p>
            </section>
        <?}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){?>
            <h1>Booking</h1>
            <section>
                <p>“Als Turbaade” for</p>
                <h2>Bicycle ferry Flensburg Fjord
(Cykelfærgen Flensborg Fjord)</h2>
                <p>Terms and conditions and privacy policy</p>
                <h3>Bookings</h3>
                <p>
                All prices in our online booking system are quoted in DKK. Inc. relevant taxes (passenger transport is not subject to VAT).
                Payment is made by using the payment cards accepted in the online booking system, as well as MobilePay.
                If space is available, it will also be possible to buy a ticket during the tour.
                Receipt / ticket will be sent by e-mail and must be presented, either electronically or in the form of a printout, also on return journeys.
                Attendance no later than 5 minutes before departure, otherwise the reservation will be cancelled.
                </p>
                <h3>Cancellation</h3>
                <p>
                You have the possibility to rebook your purchased ticket in the online booking system.
                It is possible to cancel your ticket up to 48 hours before the booked departure by sending an email.
                In the case of group bookings, no refund will be made if the number of participants is lower. Otherwise, the same conditions for rebooking and cancellation apply as for a personal ticket.
                A charter tour is due for payment at the latest at the time of departure.
                A charter tour can be re-booked up to 48 hours before departure.
                A charter tour can be cancelled up to 48 hours before departure, the administration fee of 10% is non-refundable.
                A charter tour cancelled less than 48 hours, is 50% refundable.</p>
                <h3>Trading on the internet</h3>
                <p>
                As a consumer, you are protected against possible misuse of your payment card over the internet.
                You can read more about how you as a consumer should deal with online payments on the following websites www.betaling.dk; www.fdih.dk .</p>
                <h3>Registration of data</h3>
                <p>
                “Als Turbaade” registers your name, address, e-mail address and other information provided in connection with the purchase in the customer database.
                The information is stored for 5 years.
                The information is not passed on.
                Cookies are used for statistics and to keep track of the data provided in the booking process.
                When paying by credit card, payment is made via a secure server where the information is encrypted before being sent over the Internet.
                No credit card information is stored on “Cykelfærgen's” server.
                </p>

                <h3>Complaints handling</h3>
                <p>If you do not receive a ticket confirming your purchase, and you have not received an error message from the system, you can contact us at the email below, or by phone</p>
                <p>
                Complaints about the booking process or service received must be made within a reasonable time after you have discovered the error, or should have discovered the error by ordinary review of your ticket / receipt.
                </p>
                <p>When the shipping company receives your complaint, it will be dealt with as soon as possible.</p>
                <h3>Company & operation details</h3>
                <p>
                <address>
                    Als turbaade<br>
                    Namm2019 aps <br>
                    Svennesmølle 18a <br>
                    6470 Sydals
                </address>
                Mommark99@gmail.com<br>
                +4520256462<br>
                CVR 41260629
                </p>
            </section>
        <?}?>
    </section>
</main>
    <?
include($root."/components/footer.php");
include($root."/scripts/script.php");
?>