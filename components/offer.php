<article class="offer">
    <header class="header">
        <section class="logo_container">
            <a href="https://www.cykelfaergen.info"><img src="https://www.cykelfaergen.info/assets/logo/logo.svg" width="88px" height="88px" alt="Cykelfærgen´s Logo"></a>
        </section>
    </header>
    <video class="offer__vid" poster="https://www.cykelfaergen.info/assets/Screenshot 2022-10-12 at 10.26.24.png" src="https://www.cykelfaergen.info/assets/vid/dji_fly_20220920_102936_363_1663664358521_video.MP4" playsinline autoplay muted loop></video>
    <!-- <img  class="offer__vid" width="100%" height="100%" src="/images/csm_180729-TdS-Groemitz_1__ad2173fc3f.jpg"> -->
    <section class="offer__c content ppad">
        <h2 class="offer__title">Welcome</h2>
        <p>We are happy to welcome you to the bicycle ferry Flensborg fjord.
            <br>
            Here you will be able to learn more and book you ferry trip on Flensborg Fjord.
        </p>
        <button class="btn js-btn btn-leftp">
            Go and book now
        </button>
        <button class="scrollDown" onClick="scrollInto()">
            Enter Website to learn more
            <div id="hint">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
            </div>
        </button>
    </section>
</article>
<script>
    function scrollInto(){
        document.querySelector("html").style.scrollPaddingTop = "0px";
        document.querySelector('.main-header').scrollIntoView();
        document.querySelector("html").style.scrollPaddingTop = "150px";
    }
</script>