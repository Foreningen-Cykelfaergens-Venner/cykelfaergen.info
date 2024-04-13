<?
ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
session_start();
$mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
/* $img = "https://".$mainHost."/newsroom/news-img/IMG_1753-min.jpg"; */
$title = "Passenger Information";
?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
    <main>
        <article class="hero__slider search-container">
            <img class="search-container-bg" src="/assets/IMG_7212.jpg" alt="" srcset="">
            <div class="hero-overlay">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 809 419" class="css-jwstly eoe3qck2"><defs><linearGradient id="leftShaftGradA" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0%" stop-color="#C3E0F4" stop-opacity=".7" class="css-4tqk3n eoe3qck0"></stop><stop offset="100%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop></linearGradient><linearGradient id="leftShaftGradB" x1="100%" x2="24.236%" y1="50%" y2="50%"><stop offset="0%" stop-color="#FFF" stop-opacity=".5"></stop><stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop></linearGradient><linearGradient id="leftShaftGradC" x1="100%" x2="0%" y1="50%" y2="50%"><stop offset="0%" stop-color="#FFF"></stop><stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop></linearGradient><linearGradient id="leftShaftGradD" x1="100%" x2="0%" y1="50.002%" y2="50.002%"><stop offset="0%" stop-color="#FFF" stop-opacity=".3"></stop><stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop></linearGradient><linearGradient id="leftShaftGradE" x1="11.903%" y1="50%" y2="50%"><stop offset="0%" stop-color="#C3E0F4" class="css-4tqk3n eoe3qck0"></stop><stop offset="100%" stop-color="#C3E0F4" stop-opacity=".4" class="css-4tqk3n eoe3qck0"></stop></linearGradient><rect id="leftShaftGradF" width="372" height="419"></rect></defs><g fill="none" fill-rule="evenodd"><polygon fill="url(#leftShaftGradA)" fill-rule="nonzero" points="371 0 687 0 445.084 419 371 419"></polygon><polygon fill="url(#leftShaftGradB)" fill-rule="nonzero" points="664.828 0 739 0 490.172 419 416 419"></polygon><polygon fill="url(#leftShaftGradC)" fill-rule="nonzero" points="734.598 0 809 0 559.402 419 485 419" opacity=".1"></polygon><polygon fill="url(#leftShaftGradD)" fill-rule="nonzero" points="705.551 0 715 0 714.373 1.057 466.449 419 457 419 704.968 .983"></polygon><polygon fill="url(#leftShaftGradE)" fill-rule="nonzero" points="371 419 376.5 419 613 0 371 0"></polygon><rect fill="#046c6d" fill-rule="nonzero" width="372" height="419"></rect></g></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="300" height="419" viewBox="0 0 300 419" class="css-seqzpf eoe3qck1"><defs><rect id="righgtShaftExportA" width="300" height="419"></rect><linearGradient id="rightShaftExportB" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0%" stop-color="#C3E0F4" stop-opacity=".7" class="css-4tqk3n eoe3qck0"></stop><stop offset="100%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop></linearGradient><polygon id="rightShaftExportC" points="316 420 0 420 241.916 0 316 0"></polygon><linearGradient id="rightShaftExportD" x1="100%" x2="1.587%" y1="50%" y2="50%"><stop offset="0%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop><stop offset="100%" stop-color="#C3E0F4" stop-opacity=".4" class="css-4tqk3n eoe3qck0"></stop></linearGradient><polygon id="rightShaftExportE" points="74.172 419 0 419 248.828 0 323 0"></polygon><linearGradient id="rightShaftExportF" x1="100%" x2="20.222%" y1="50.002%" y2="50.002%"><stop offset="0%" stop-color="#FFF"></stop><stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop></linearGradient><linearGradient id="rightShaftExportG" x1="100%" x2="17.098%" y1="50%" y2="50%"><stop offset="0%" stop-color="#FFF" stop-opacity=".3"></stop><stop offset="100%" stop-color="#FFF" stop-opacity="0"></stop></linearGradient><linearGradient id="rightShaftExportH" x1="0%" x2="50%" y1="61.13%" y2="61.13%"><stop offset="0%" stop-color="#C3E0F4" stop-opacity="0" class="css-4tqk3n eoe3qck0"></stop><stop offset="100%" stop-color="#C3E0F4" class="css-4tqk3n eoe3qck0"></stop></linearGradient><polygon id="rightShaftExportI" points="242 0 236.5 0 0 420 242 420"></polygon></defs><g fill="none" fill-rule="evenodd"><mask id="rightShaftExportJ" fill="#fff"><use xlink:href="#righgtShaftExportA"></use></mask><g mask="url(#rightShaftExportJ)"><g transform="translate(6 -1)"><g transform="translate(121)"><use fill="url(#rightShaftExportB)" fill-rule="nonzero" xlink:href="#rightShaftExportC"></use></g><g transform="translate(68 1)"><use fill="url(#rightShaftExportD)" fill-rule="nonzero" xlink:href="#rightShaftExportE"></use></g><polygon fill="url(#rightShaftExportF)" fill-rule="nonzero" points="74.272 419.986 0 419.986 249.163 0 323.435 0" opacity=".1"></polygon><polygon fill="url(#rightShaftExportG)" fill-rule="nonzero" points="100.412 421 91 421 338.602 1 348 1"></polygon><g transform="translate(195)"><use fill="url(#rightShaftExportH)" fill-rule="nonzero" xlink:href="#rightShaftExportI"></use></g></g></g></g></svg>
            </div>
            <!-- ferry-promo-happy.jpeg -->
            <section class="search-container-content">
                <h2>Travel Updates</h2>
            </section>
        </article>
        <section class="content">
            <article class="twitter-updates">
                <h2>Twitter feed</h2>
                <a class="twitter-timeline" data-dnt="true" data-height="600" href="https://twitter.com/cykelfaergen?ref_src=twsrc%5Etfw">
                    Tweets by Twitter Dev
                </a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </article>
            <article class="ppad">
                <h2>Information about COVID-19</h2>
                <section class="grid">

                </section>
            </article>
            <section class="grid grid-3">

            </section>
        </section>
    </main>
<?
include($_SERVER["DOCUMENT_ROOT"] ."/scripts/script.php");
?>