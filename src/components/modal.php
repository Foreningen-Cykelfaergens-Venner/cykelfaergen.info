<dialog id="modal" modal>
    <form method="dialog">
        <menu class="dialog-header">
            <img width="88px" height="88px" src="https://www.cykelfaergen.info/assets/logo/logo.svg">
            <button class="close-dialog">X</button>
        </menu>
        <?php
            if(!isset($_COOKIE["region"]) || $_COOKIE["region"] == "da-DK"){
        ?>
            <div class="grid">
                <?php 
                    if(new DateTime() <= new DateTime("2024-03-26 18:30:00", new DateTimeZone("Europe/Copenhagen"))){
                ?>
                <section>
                    <h1 class="dialog-headline">Generalforsamling 2024</h1>
                    <h3>Den 26. Marts 2024 - Kl. 18:30</h3>
                    <p>Foreningen er vært ved en lækkert aftensmad og øl/vand/vin kan købes til fordelagtige priser.</p>
                    <a href="https://forening.cykelfaergen.info/general-forsamling" class="cta">Læs mere og tilmeld</a>
                    <div aria-hidden="Yderlige infos" class="more-info --hideDesktop">
                        <p aria-hidden="Yderlige infos">Yderlige infos</p>
                        <span></span>
                        <span></span>
                    </div>
                </section>
                <?php
                    }
                ?>
                <section>
                    <h2 class="dialog-headline">
                        Sæson tyvstart med Pinseweekenden
                    </h2>
                    <p>I år kan du sejle fra Egernsund til Langballigau fra Pinse lørdag og hver weekend op til Juli.</p>
                    <p>Der er fuld kapacitet på færgen. Så skynd dig og book din plads til pinse og weekenderne.</p>
                    <section class="grid">
                        <article>
                            <h3>Mai</h3>
                            <time datetime="" class="date-highlight">18-20</time>
                            <time datetime="" class="date-highlight">25-26</time>
                        </article>
                        <article>
                            <h3>Juni</h3>
                            <time datetime="" class="date-highlight">1-2</time>
                            <time datetime="" class="date-highlight">8-9</time>
                            <time datetime="" class="date-highlight">15-16</time>
                            <time datetime="" class="date-highlight">22-23</time>
                        </article>
                    </section>
                </section>
            </div>
        <?php
            } else if(!isset($_COOKIE["region"]) || $_COOKIE["region"] == "de-DE"){
        ?>
            <div class="grid">
                <section>
                    <h1 class="dialog-headline">2024 Buchungen sind offen!</h1>
                    <p>Wir sind bereits jetzt für Buchungen im Jahr 2024 geöffnet. Segeln Sie mit uns am Pfingstwochenende.</p>
                    <p>Kommen Sie mit uns am Pfingswochenende nach Dänemark oder Langballigau. Wir freuen uns schon jetzt auf ihren besuch an Bord.</p>
                    <a class="cta" href="https://booking.cykelfaergen.info" onclick='gtag("event", "generate_lead", { "value": 100, "currency": "DKK", "event_category": "Cykelfærgen - Bookig", "event_label": "Buchen Sie ihr Ticket heute - Dialog" }),fbq("Lead", { "content_category": "Cykelfærgen - Bookig", "content_name": "Buchen Sie ihr Ticket heute - Dialog" })'>Buchen Sie ihr Ticket heute!</a>
                    <div aria-hidden="Weiter infos" class="more-info --hideDesktop">
                        <p aria-hidden="Weiter infos">Weitere infos</p>
                        <span></span>
                        <span></span>
                    </div>
                </section>
                <section>
                    <h2 class="dialog-headline">
                        Erweiterte Saison
                    </h2>
                    <p>Dieses Jahr können Sie zu Pfingsten und dann jedes Wochenende von Egernsund nach Langballigau segeln, bis wir am 28. Juni 2024 mit dem täglichen Segeln beginnen.</p>
                    <p>Die Fähre ist voll ausgelastet. Also beeilen Sie sich und reservieren Sie Ihren Platz für Pfingsten und die Wochenenden.</p>
                    <section class="grid">
                        <article>
                            <h3>Mai</h3>
                            <time datetime="" class="date-highlight">18-20</time>
                            <time datetime="" class="date-highlight">25-26</time>
                        </article>
                        <article>
                            <h3>Juni</h3>
                            <time datetime="" class="date-highlight">1-2</time>
                            <time datetime="" class="date-highlight">8-9</time>
                            <time datetime="" class="date-highlight">15-16</time>
                            <time datetime="" class="date-highlight">22-23</time>
                        </article>
                    </section>
                </section>
            </div>
        <?php
            } else if(!isset($_COOKIE["region"]) || $_COOKIE["region"] == "en-GB"){
        ?>
            <div class="grid">
                <section>
                    <h1 class="dialog-headline">2024 bookings are open now!</h1>
                    <p>We are open for booking 2024 already now. Sail with us on the Pentecost weekend.</p>
                    <a class="cta" href="https://booking.cykelfaergen.info" onclick='gtag("event", "generate_lead", { "value": 100, "currency": "DKK", "event_category": "Cykelfærgen - Bookig", "event_label": "Book your Ticket today - Dialog" }),fbq("Lead", { "content_category": "Cykelfærgen - Bookig", "content_name": "Book your Ticket today - Dialog" })'>Book your Ticket today</a>
                    <div aria-hidden="Yderlige infos" class="more-info --hideDesktop">
                        <p aria-hidden="Yderlige infos">Yderlige infos</p>
                        <span></span>
                        <span></span>
                    </div>
                </section>
                <section>
                    <h2 class="dialog-headline">
                        Expanded Saison
                    </h2>
                    <p>This year you can sail from Egernsund to Langballigau at Pentecost and then every weekend until we start daily sailing on 28 June 2024.</p>
                    <p>There is full capacity on the ferry. So hurry up and book your place for Pentecost and the weekends.</p>
                    <section class="grid">
                        <article>
                            <h3>May</h3>
                            <time datetime="" class="date-highlight">18-20</time>
                            <time datetime="" class="date-highlight">25-26</time>
                        </article>
                        <article>
                            <h3>June</h3>
                            <time datetime="" class="date-highlight">1-2</time>
                            <time datetime="" class="date-highlight">8-9</time>
                            <time datetime="" class="date-highlight">15-16</time>
                            <time datetime="" class="date-highlight">22-23</time>
                        </article>
                    </section>
                </section>
            </div>
        <?php
            }
        ?>
    </form>
</dialog>
<script>
    document.querySelector(".close-dialog").addEventListener("click", function(){
        gtag("event", "close_dialog", { "event_category": "Click events", "event_label": "Luk dialog"});
        const modalCloseExpire = new Date().getUTCDay();
        const modalDomain = window.location.hostname.split(".")[1] + "." + window.location.hostname.split(".")[2];
        document.cookie = "modal=1; expire="+modalCloseExpire+"; domain=."+modalDomain+"; path=/";
    })

    window.addEventListener("scroll", function(){
        if(window.scrollY > 750 && getCookie("modal") != 1 ){
            document.querySelector("#modal").showModal();
        } else if(window.scrollY < 750 && getCookie("modal") != 1 ){
            document.querySelector("#modal").close();
        }
    })
</script>