<?
    require("stoet-os/lib/stripe/init.php");
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Støt os | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Book din tur</h2><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Støt os | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>Buche deine fahrt</h2><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Støt os | Foreningen Cykelfaergen's Venner";
        $warning = "<h2>WARNING COOKIES</h2><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Støt os | Foreningen Cykelfaergen's Venner";

        $warning = "<h2>ADVARSEL COOKIES</h2><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }

    $price = "100,00";

    $liveProductId = "prod_KUuncJvcJo8II0";
    $testProductId = "prod_KR7mMkVLL1inXh";

    $productId = $liveProductId;
    $description = "Bliv nu en del af cykelfærgen! Ved at støtte os med et årligt bidrag på ". $price . " kr. kan du blive en del og hjælpe med udvikling af Cykelfærgen på Flensborg Fjord.";
?>
<?
        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
    <main class="content mt">
        <header class="underpage__header">
            <h1 class="board__headline --green">Støt os!</h1>
            <h2 class="board__headline --green --small_Headline">Nu kan du blive en del af Cykelfærgen Flensborg Fjord!</h2>
            <p>Du kan støtte Foreningen Cykelfærgen's Venner med et årligt bidrag på <?= $price;?> kr.<sup>1)</sup> som passiv medlem af foreningen.</p>
            <p>pt. har vi udfordringer med dopplet betalinger - derfor er det ikke muligt at bliv medlem via hjemmesiden!</p>
        </header>
        <section>
            <form class="payment__grid" id="payment_process" method="post">
                <section>
                    <p>Kort vi accepterer</p>
                    <i class="cards visa cards__block"></i>
                    <i class="cards mastercard cards__block"></i>
                    <h3>Personlig informationer</h3>
                    <label for="email">
                        Email
                        <input type="email" name="email" id="email" autocomplete="email">
                    </label>
                    <section class="newCards" style="display: none;">
                        <label for="name">
                            Navn
                            <input type="text" name="name" id="name" autocomplete="name">
                        </label>
                        <label for="password">
                            Kodeord <sup>2)</sup>
                            <input type="password" name="password" id="password" autocomplete="off">
                        </label>
                        <h3>Adresse</h3>
                        <section class="address">
                            <label for="street">
                                Vej og nummer
                                <input type="text" name="street" id="street" placeholder="Eksemple Vej 10 st. tr." autocomplete="shipping street-address">
                            </label>
                            <div class="row">
                                <div class="col-50">
                                    <label for="postcode">Post nummer</label>
                                    <input type="text" id="postcode" name="postcode" placeholder="eks. 6310" autocomplete="shipping postal-code">
                                </div>
                                <div class="col-50">
                                    <label for="city">By</label>
                                    <input type="text" id="city" name="city" placeholder="eks. Broager" autocomplete="shipping locality">
                                </div>
                            </div>
                            <label for="country">
                                Land
                                <input type="text" name="country" id="country" placeholder="Danmark" autocomplete="shipping country">
                            </label>
                        </section>
                        <h3>Kort detaljer</h3>
                        <label for="ccnum">Kort nummer</label>
                        <section class="cardNumber">
                            <div class="icon-container">
                                <i class="cards visa" data-card-type="Visa"></i>
                                <i class="cards mastercard" data-card-type="Mastercard"></i>
                            </div>
                            <input type="tel" id="ccnum" name="cardnumber" placeholder="4262 2323 4242 5434" maxlength="19" autocomplete="cc-number">
                        </section>
                        <div class="row newCards">
                            <div class="col-33">
                                <label for="expmonth">Exp Månede</label>
                                <input type="tel" id="expmonth" name="expmonth" placeholder="September" maxlength="2" autocomplete="cc-exp">
                            </div>
                            <div class="col-33">
                                <label for="expyear">Exp År</label>
                                <input type="tel" id="expyear" name="expyear" placeholder="2018" maxlength="4" autocomplete="cc-exp">
                            </div>
                            <div class="col-33">
                                <label for="cvv">CVV / CVC</label>
                                <input type="tel" id="cvv" name="cvv" placeholder="CVC" maxlength="3" autocomplete="cc-csc">
                            </div>
                            <input type="hidden" name="amount" value="<?= $price;?>">
                        </div>
                    </section>
                    <input type="hidden" name="prodcut_id" value="<?= $productId;?>">
                    <label for="newsletter" style="padding: 10px 0px; display: block;">
                        <input type="checkbox" name="newsletter" id="newsletter">
                        Tilmeld mig nyhedsbreven
                    </label>
                    <label for="privacy" style="padding: 10px 0px; display: block;">
                        <input type="checkbox" name="privacy" id="privacy" required>
                        Jeg har læst & accepter <a href="/om-os/legal/privacy" target="_blank">privat politiken</a>
                    </label>
                    <div class="payment__warning" style="width: 100%;"></div>
                    <button type="submit" disabled class="payment__btn subs_btn"><i class="fa fa-lock"></i> Betal</button>
                    <p>Dine informationer bliver sendt <i class="fa fa-lock"></i> crypteret til og gemt hos vores betalings partner Stripe.</p>
                </section>
                <section class="cart">
                    <h2>Bestillings oversigt</h2>
                    <hr>
                    <div class="product" style="float: left; max-width: 60%;">
                        <h3>Passiv medlem</h3>
                        <p>Som passiv medlem støtter du Foreningen Cykelfærgen´s Venner og der med Cykelfærgen på Flensborg fjord. Dit bidrag hjælper foreningen til at udvikle vider på konceptet.</p>
                    </div>
                    <div class="total_price" style="float: right; text-align: right;">
                        <h2><?= $price;?> kr.</h2>
                    </div>
                </section>
            </form>
            <sup>1) Dit bidrag på <?= $price;?> kr. bliver hævet automatisk på dit kredit kort på et årligt basis.</sup><br>
            <sup>2) Kodeordet bruges til at du kan få adgang til <a href="https://forening.cykelfaergen.info" target="_blank">medlem panel</a>.</sup>
        </section>
    </main>
    <?
        include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
        include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
    ?>
</body>
</html>