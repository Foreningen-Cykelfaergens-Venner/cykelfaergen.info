<?php
    if(!isset($_COOKIE["region"]) || isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
        $writeReviewText = "Skriv en anmeldelse";
        $nextBtn = "Næste";
        $prevBtn = "Tilbage";
    }

    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $writeReviewText  = "Schreibe eine Bewertung";
        $prevBtn = "Vorherrige";
        $nextBtn = "Nächste";
    }
    
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $writeReviewText  = "Write a review";
    
        $prevBtn = "Previous";
        $nextBtn = "Next";
    }
    
    
?>

<section class="Trustpilot-reviews">
    <header class="Trustpilot-reviews-header">
        <div class="trustScoreTotal"></div>
        <p class="trustScore-text"></p>
        <div class="reviews-header-review-stars">
            <span class="trustpilot-review-state"></span> <span class="trustScore"></span>
        </div>
        <section style="display: flex; flex-direction: column;">
            <button class="write-review" onclick="openReview()"><?php echo $writeReviewText; ?></button>
        </section>
    </header>
    <div class="tp-fading">
        <button class="verticalScroll-btn --prev"><?php echo $prevBtn ?><i class="arrow up-arrow"></i></button>
        <div class="intaMiniContentSlider">
            <section class="intaSliderContent reviewContainer"></section>
        </div>
        <button class="verticalScroll-btn --next"><?php echo $nextBtn ?><i class="arrow down-arrow"></i></button>
    </div>
</section><dialog class="send-review">
    <button class="closePopup" onclick="openReview()">Close</button>
    <iframe src="https://dk.trustpilot.com/evaluate/embed/cykelfaergen.info" width="100%" height="1100px" style="overflow: hidden; margin-inline: auto;" frameborder="0"></iframe>
</dialog>