<script src="js/getnews_home.js"></script>
<main class="container">
    <svg class="bgFlow" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3262.82 1886.02">
        <defs>
            <style>.uuid-8a559af5-71f7-42b9-a491-37a65dc99d98{fill:none;stroke:#056c6d;stroke-miterlimit:10;stroke-width:7px;}</style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07"/>
    </svg>  
    <?php include("./components/trustpilot-integration.php"); ?>
    <section class="info_container" id="rodsand">
        <div class="content">
          	<div class="first">
              <div class="second">
                <? require_once($_SERVER["DOCUMENT_ROOT"]."/components/timetable.php");?>
                <section class="ppad ppad-10 no-flex">
                    <?php
                        createTimetable("Egernsund - Langballigau");
                    ?>
                </section>
                <section>
                    <?php
                        createTimetable("Egernsund - Flensburg");
                    ?>
                </section>
                <div class="newsletter" id="omnisend-embedded-v2-6530eac3c6d9c8e0e6cbcad8"></div>
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
              </div>
          </div>
        </div>
    </section>
    <section class="info_container" id="prices">
        <div class="content">
            <section class="ticket-grid">
                <? require_once($_SERVER["DOCUMENT_ROOT"]."/components/tickets.php");?>
                <? tickets($db); ?>
            </section>
            <div style="clear:both;"></div>
            <div class="disclaimer">
                <p>*Die Umrechnung basiert auf dem Wechselkurs zum Zeitpunkt der Zahlung</p>
                Hinweis: Überquerung der Bundesgrenze. Bitte deinen Personalausweis oder deinen Reisepass nicht vergessen. Kleine Hunde dürfen auch mitgeführt werden, wenn die erforderlichen Papiere vorliegen.
            </div>
            <!-- <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="autorelaxed"
                data-ad-client="ca-pub-0127874455675391"
                data-ad-slot="2670682792"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script> -->
        </div>
    </section>
    <div class="fullWidthImage image-1"></div>
    <svg class="bgFlow" style="margin-top: 450px;" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3262.82 1886.02">
        <defs>
            <style>.uuid-8a559af5-71f7-42b9-a491-37a65dc99d98{fill:none;stroke:#056c6d;stroke-miterlimit:10;stroke-width:7px;}</style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07"/>
    </svg>
    <section class="info_container">
        <section class="grid special-events ppad">
            <div class="welcomes-txt">
                <h2>Event-Fahrten auf der Flensburger Förde</h2>
                <p>Jetzt kannst du unsere Fähre “Rødesand“ auch exklusiv für private Anlässe und Veranstaltungen buchen. Zum Beispiel für Familienfeiern, eine Party mit Freunden, ein Vereinstreffen oder eine Firmenveranstaltung.</p>
                <p>Verwöhne deine Liebsten!
Bringe deine eigenen Speisen und Getränke mit an Bord und genieße ein paar "hyggelige" Momente auf der Flensburger Förde. Buchungen sind ab drei Stunden und für maximal 12 Personen möglich.</p>
                <a href="/event" class="btn">Weitere Information und Buchung einer Event-Fahrt</a>
            </div>
            <img src="https://www.cykelfaergen.info/newsroom/news-img/IMG_1753-min.jpg" width="565px" height="286px" loading="lazy" alt="Cykelfærgen sejler på Flensborg fjord">
        </section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d146774.47378467923!2d9.508668437412604!3d54.9143739133283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b34727dccecc71%3A0xfe70c36a6a000f79!2sCykelf%C3%A6rgen%20Flensborg%20fjord!5e0!3m2!1sen!2sdk!4v1679496942748!5m2!1sen!2sdk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section class="sponsore_container --top">
        <? include($_SERVER["DOCUMENT_ROOT"]."/assets/sponsers/sponsers.php")?>
    </section>
    <svg class="bgFlow" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3262.82 1886.02">
        <defs>
            <style>.uuid-8a559af5-71f7-42b9-a491-37a65dc99d98{fill:none;stroke:#056c6d;stroke-miterlimit:10;stroke-width:7px;}</style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07"/>
    </svg>
    <section class="mail-container">
        <div class="content">
            <div id="omnisend-embedded-v2-644e7f94e54adad5ac574ab8"></div>
        </div>
    </section>
    <section class="content">
        <div class="news_room_container">
            <h2>Pressemitteilungen <a href="pressroom">weitere mitteilungen <i class="arrow down-arrow"></i></a></h2>
            <div class="press_container">
            	<div class="l_news-c">
                  <div>
                    <div class="up group">
                      <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="i-arrow-right" version="1.0" width="1em" height="1em" viewBox="0 0 128 128" xml:space="preserve">
                          <g><path d="M59.6 0h8v40h-8V0z" fill-opacity="1" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(30 64 64)" fill="#787878"/>
                            <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(60 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(90 64 64)" fill="#787878"/>
                            <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.2" transform="rotate(120 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.3" transform="rotate(150 64 64)" fill="#787878"/>
                            <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.4" transform="rotate(180 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.5" transform="rotate(210 64 64)" fill="#787878"/>
                            <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.6" transform="rotate(240 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.7" transform="rotate(270 64 64)" fill="#787878"/>
                            <path d="M59.6 0h8v40h-8V0z" fill-opacity="0.8" transform="rotate(300 64 64)" fill="#787878"/><path d="M59.6 0h8v40h-8V0z" fill-opacity="0.9" transform="rotate(330 64 64)" fill="#787878"/>
                            <animateTransform attributeName="transform" type="rotate" values="0 64 64;30 64 64;60 64 64;90 64 64;120 64 64;150 64 64;180 64 64;210 64 64;240 64 64;270 64 64;300 64 64;330 64 64" calcMode="discrete" dur="1080ms" repeatCount="indefinite"/></g>
                      </svg> Getting the latest news please wait...
                    </div>
                  </div>
              	</div>
            </div>
        </div>
    </section>
    <div class="fullWidthImage"></div>
    <section class="intaad">
        <a class="intaad-link" href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=website-banner&utum_medium=banner&utm_content=WebsiteBanner">
            <img src="/assets/inta-ads/ad-2023.jpg" alt="booking ad">
        </a>
    </section>
    <svg class="bgFlow" style="margin-top: -450px;" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3262.82 1886.02">
        <defs>
            <style>.uuid-8a559af5-71f7-42b9-a491-37a65dc99d98{fill:none;stroke:#056c6d;stroke-miterlimit:10;stroke-width:7px;}</style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07"/>
    </svg>
    <svg class="bgFlow" style="margin-top: 450px;" id="uuid-1e4377d2-38c0-407c-b373-e061c816eeb2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3262.82 1886.02">
        <defs>
            <style>.uuid-8a559af5-71f7-42b9-a491-37a65dc99d98{fill:none;stroke:#056c6d;stroke-miterlimit:10;stroke-width:7px;}</style>
        </defs>
        <path class="uuid-8a559af5-71f7-42b9-a491-37a65dc99d98" d="m146.63,0s-479.4,1034.59,1208.89,1003.34c1682.09-31.14,485.22,974.91-648.04,974.91-977.15,0-734.31,907.77,1115.92,873.07"/>
    </svg>
    <section class="info_container faq-bg" id="faq">
        <span class="grdin-overlay"></span>
        <section class="content">
            <h2>FAQ - Frequent Asked Questions!</h2>
            <!-- <article>
                <div class="accordion"><span class="arrow arrowDown <? if(isset($_GET["covid-19"])){?>arrowUp<?}?>"></span> Wie sehen die ak­tu­ellen COVID-19 regeln aus?</div>
                <div class="panel <? if(isset($_GET["covid-19"])){?>panelShow<?}?>">
                    <section class="panel-ppad">
                        <p class="strong">Regeln für Deutschland</p>
                        <p>Maskenpflicht in Räumen wie Restaurants, Geschäfte und Museen. Dort muss man Kontaktdaten angeben.</p>
                        <p class="strong">Regeln für Dänemark</p>
                        <p>Keine Maskenpflicht, nur im öffentlichen Nahverkehr. In Restaurants muss auf Wunsch der Coronapas oder ein Negativtest gezeigt werden</p>
                    </section>
                </div>
            </article> -->
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Wo kann ich Tickets kaufen?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>
                        Du kannst deine Tickets unter <a href="https://booking.cykelfaergen.info">booking.cykelfaergen.info</a> buchen. <span>Vergiss bitte nicht das Ticket für jedes Fahrrad zu kaufen!</span><br>
                        Dann sind die Plätze reserviert und schon bezahlt.<br>
                        Es gibt auch die Möglichkeit direkt vor Ort ein Ticket zu kaufen, solange Plätze noch frei sind.
                        </p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Ich habe mein Ticket gebucht, kann aber dass Ticket nicht finden?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Nachdem du dein Ticket gebucht hast bekommst du eine Bestätigungs mail woran ihr Ticket als PDF Datei angehängt ist.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Brauche ich meinen Pass?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Ja, du brauchst deinen Personalausweis oder deinen Reisepass, wenn du die Grenze überqueren willst.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Wann soll ich bereitstehen?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Spätestens 10 Minuten vor geplanter Abfahrt.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Kann ich an Bord Getränke kaufen?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Ja, z.B. Bier und Softdrinks.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Wann ist der letzte Tag?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Unsere letzte Fahrt findet am 08. September 2024 statt.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Darf ich meinen Hund mit an Bord nehmen?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Ja, Hunde sind willkommen an Bord, jedoch nur mit gültigen Einreise-Dokumenten (EU-Heimtierpass, gültige Tollwutimpfung, Mikrochip).</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Darf ich mein Mofa / Scooter etc. mit an Bord nehmen?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Nein. Dafür haben wir an Bord keinen Platz, sowie teile der Anlieger an den Häfen es nicht hergeben können.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Ich möchte meine Buchung ändern/stornieren</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Um Ihre Buchung zu stornieren oder zu ändern, finden Sie einen Link in der Bestätigungs-E-Mail, der auch Ihr Ticket beigefügt ist.</p>
                    </section>
                </div>
            </article>
        </section>
    </section>
    <section class="info_container" id="about">
        <section class="content grid">
            <section>
                <h2>Über die Fähre</h2>
                <h3>Willkommen an Bord!</h3>
                <p>In diesem Sommer fahren wir mit zwei Fähren auf der Flensburger Förde.
                    Unsere  neue Fähre "Thjalfe" wird auf der Route von Egernsund über Marina Minde und Brunsnæs nach Langballigau (Deutschland) und zurück eingesetzt. Die "Rødsand", die seit 2019 auf dieser Route gefahren ist, setzen wir nun für die Strecke entlang der früheren "Butterfahrten" von Egernsund mit Stopps in Sønderhav und weiter nach Flensburg und zurück ein.</p>
                <p>    
                Genau wie die "Rødsand" ist auch die "Thjalfe" für 12 Passagiere und 12 Fahrräder zugelassen. Ihr großer Vorteil ist, dass sie im vorderen Teil mehr Platz und Komfort für unsere Gäste und ihre Fahrräder bietet, um die Fahrt an Bord zu genießen. Die "Thjalfe"  beginnt die Saison mit Wochenendfahrten am 16., 17. und 18. Juni sowie am 23. und 24. und 25. Juni. Ab dem 30. Juni wird sie dann bis zum 1. September 2023 täglich an allen Wochentagen fahren.
                </p>
                <p>Es gibt viele Möglichkeiten die Fahrt auf dem Wasser mit Ausflügen an Land zu kombinieren. Mache zum Beispiel von der Anlegestelle in Brunsnæs aus einen Spaziergang auf dem wunderschönen Gendarmenpfad. Genieße ein Eis im Hafen von Egernsund, ein Glas Wein im Hafen von Langballigau, während in Sønderhav ein leckerer dänischer Hotdog auf dich wartet.</p>
                <p>Du kannst dein Fahrrad auf der Fähre mitnehmen. Bitte denke daran einen Platz dafür zu reservieren, da nur eine begrenzte Anzahl an Abstellmöglichkeiten zur Verfügung steht.</p>
            </section>
            <img src="https://press.cykelfaergen.info/materials/pressemateriale/thjalfe/min/IMG_0690-min.jpg" loading="lazy" alt="Færge Thjalfe på Flensborg fjord lige foran Holnis i retning Egernsund">
        </section>
    </section>
    <section class="info_container">
        <section class="content grid">
            <div>
                <h2>Foreningen Cykelfærgens Venner</h2>
                <h3>Til gavn for Cykelfærgen på Flensborg fjord</h3>
                <p>Foreningen´s formål er at arbejde til gavn for projektet Cykelfærgen der sejler på Flensborg fjord i Sommer perioden.</p>
                <p>Som medlem i foreningen kan du vælge mellem:</p>
                <ul>
                    <li>Passiv medlem</li>
                    <li>Aktiv medlem</li>
                </ul>
                <p>medlemsskab. Som passiv medlem støtter du med dit bidrag vores formål og driften af færgen. Vælger du der i mod aktivt medlemsskab, hjælper du aktivt ombord i sommerperioden, med at betjene vores gæster.</p>
                <p>Passiv og aktive medlemmer hjælper os med at udvikle og holde gang i færgen´s driften på Flensborg fjord.</p>
            </div>
            <!-- <section style="display: flex; gap: 10px;">
                <script async
                src="https://js.stripe.com/v3/buy-button.js">
                </script>

                <stripe-buy-button
                buy-button-id="buy_btn_1NwGicEkBCWqt5zijHr2Wb9O"
                publishable-key="pk_live_51Jly9AEkBCWqt5ziZUus9VnBBsbKg7uP9tupHnx30p1FHEEmh3QReJLj5UgyurEICHL4DfRBWZ8IWJcyDAiACnjs00JdEDRN8A"
                >
                </stripe-buy-button>

                <stripe-buy-button
                buy-button-id="buy_btn_1NwL0AEkBCWqt5ziuPKZnsVb"
                publishable-key="pk_live_51Jly9AEkBCWqt5ziZUus9VnBBsbKg7uP9tupHnx30p1FHEEmh3QReJLj5UgyurEICHL4DfRBWZ8IWJcyDAiACnjs00JdEDRN8A"
                >
                </stripe-buy-button>
            </section> -->
        </section>
    </section>
    <img class="fullwidth-img" src="/assets/gendarmstien/IMG_1327.jpg" alt="Happy people enjoying a ferry ride" srcset="/assets/gendarmstien/IMG_1327-480w.jpg 480w, /assets/gendarmstien/IMG_1327-800w.jpg 800w, /assets/gendarmstien/IMG_1327.jpg 1200w">
    <?php include("./components/trustpilot-integration.php"); ?>
</main>