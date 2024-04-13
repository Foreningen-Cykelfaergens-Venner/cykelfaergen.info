<script src="js/getnews.js"></script>
<main class="container">
    <?php include("./components/trustpilot-integration.php"); ?>
    <dialog class="send-review">
        <button class="closePopup" onclick="openReview()">Close</button>
        <iframe src="https://www.trustpilot.com/evaluate/embed/cykelfaergen.info" width="100%" height="1100px" style="overflow: hidden; margin-inline: auto;" frameborder="0"></iframe>
    </dialog>
    <section class="info_container">
        <div class="content">
          	<div class="first">
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
    </section>
    <div class="fullWidthImage image-1"></div>
    <section class="info_container">
        <section class="grid special-events ppad">
            <div class="welcomes-txt">
                <h2>Event trips on the Flensburg fjord</h2>
                <p>Now you can book our ferry "Rødsand" exclusively for private occasions and events. For example for family celebrations, a party with friends, a club meeting or a company event.</p>
                <a href="/event" class="btn">Further information and booking</a>
            </div>
            <img src="https://www.cykelfaergen.info/newsroom/news-img/IMG_1753-min.jpg" width="565px" height="286px" loading="lazy" alt="Cykelfærgen sejler på Flensborg fjord">
        </section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d146774.47378467923!2d9.508668437412604!3d54.9143739133283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b34727dccecc71%3A0xfe70c36a6a000f79!2sCykelf%C3%A6rgen%20Flensborg%20fjord!5e0!3m2!1sen!2sdk!4v1679496942748!5m2!1sen!2sdk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section class="sponsore_container --top">
        <? include($_SERVER["DOCUMENT_ROOT"]."/assets/sponsers/sponsers.php")?>
    </section>
    <section class="mail-container">
        <div class="content">
            <div class="newsletter" id="omnisend-embedded-v2-644e8028e54adad5ac574ab9"></div>
        </div>
    </section>
    <section class="content">
        <div class="news_room_container">
            <h2>Latest press releases <a href="pressroom">more press releases<i class="arrow down-arrow"></i></a></h2>
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
        <a class="intaad-link" href="https://booking.cykelfaergen.info?utm_campaign=Booking2023&utm_source=website-banner&utum_medium=banner&utm_content=WebsiteBanner">
            <img src="/assets/inta-ads/ad-2023.jpg" alt="booking ad">
        </a>
    </section>
    <section class="info_container" id="prices">
        <div class="content">
            <section class="ticket-grid">
                <? require_once($_SERVER["DOCUMENT_ROOT"]."/components/tickets.php");?>
                <? tickets($db); ?>
            </section>
            <div class="disclaimer">
                Note: International Border crossing. Please do not forget your passport. Small dogs are allowed with the required documents.
               <br> *Note: based on the exchange rate at the time of payment
            </div>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="autorelaxed"
                data-ad-client="ca-pub-0127874455675391"
                data-ad-slot="2670682792"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </section>
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
                <div class="accordion"><span class="arrow arrowDown"></span> Where can I buy tickets?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>
                        You can book you tickets at <a href="https://booking.cykelfaergen.info">booking.cykelfaergen.info</a>.<span>Don't forget to buy the ticket for each bike!</span><br>
                        Then space for you and your bike is reserved and already paid. It is also possible to buy a ticket at the ferry, but only while space is still available.
                        </p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Do I need my passport?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Yes, you need your identity card or passport if you want to cross the border.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> When should I be ready for boarding?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>At least 10 minutes before scheduled departure.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Can I buy drinks on board?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Yes, you can (e.g. beer and soft drinks).</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> When is the last day?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Our last cruise is on 3 September 2023.</p>
                    </section>
                </div>
            </article>
            <article>
                <div class="accordion"><span class="arrow arrowDown"></span> Can I bring my dog on board?</div>
                <div class="panel">
                    <section class="panel-ppad">
                        <p>Yes, dogs are welcome on board, but only with valid entry documents (EU pet passport, valid rabies vaccination, microchip).</p>
                    </section>
                </div>
            </article>
        </section>
    </section>
    
    <section class="info_container" id="about">
        <div class="content grid">
            <section>
                <h2>About the ferry</h2>
                <h3>Welcome aboard!</h3>
                <p>This summer, we will be operating two ferries on the Flensburg Fjord.</p>
                <p>Our new ferry “Thjalfe” will operate on the route from Egernsund via Marina Minde and Brunsnæs to Langballigau (Germany) and back. “Rødsand”, which has been used on this route since 2019, will sail on the route along the former “Sprittur” from Egernsund with stops in Sønderhav and on to Flensburg and back. Just like the “Rødsand”, the “Thjalfe” is licensed for 12 passengers and 12 bicycles. Her big advantage is that she offers more space and comfort in the front part for our guests and their bicycles to enjoy the journey on board. “Thjalfe” will start the season with weekend trips on 16, 17 and 18 June as well as on 23 and 24 and 25 June. From 30 June, she will sail daily on all weekdays until 1 September 2023.</p>
                <p>    
                There are many ways to combine the trip on the water with excursions on land. For example, take a walk along the beautiful Gendarme Trail from the pier in Brunsnæs. Enjoy an ice cream in Egernsund harbour, a glass of wine in Langballigau, while a delicious Danish hot dog awaits you in Sønderhav.
                </p>
                <p>You can take your bike with you on the ferry. Please remember to reserve a place for it, as there are only a limited number of parking spaces for bikes available.</p>
            </section>
            <img src="https://press.cykelfaergen.info/materials/pressemateriale/thjalfe/min/IMG_0690-min.jpg" loading="lazy" alt="Færge Thjalfe på Flensborg fjord lige foran Holnis i retning Egernsund">
        </div>
    </section>
    <img class="fullwidth-img" src="/assets/gendarmstien/IMG_1327.jpg" alt="Happy people enjoying a ferry ride" srcset="/assets/gendarmstien/IMG_1327-480w.jpg 480w, /assets/gendarmstien/IMG_1327-800w.jpg 800w, /assets/gendarmstien/IMG_1327.jpg 1200w">
    <?php include("./components/trustpilot-integration.php"); ?>
</main>