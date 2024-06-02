<?
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    $ip = getUserIpAddr();
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
        $title = "Presse Rum - Cykelfærgen Rødsand";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Presseraum - Fahrradfähre Rødsand";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Pressroom - Bicycle ferry Rødsand";
    }else{
        $title = "Pressroom - Bicycle ferry Rødsand";
    }

	include($_SERVER["DOCUMENT_ROOT"] . "/db.php");

        include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
    ?>
    <?
        if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
            include("language/dk-DK/pressroom.php");
            include("language/dk-DK/footer.php");
            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
            include("language/de-DE/pressroom.php");
            include("language/de-DE/footer.php");
            $link = "https://www.booksonderjylland.dk/de/buchen/aktivitat/1776117/erleben-sie-eine-unvergessliche-fahrt-mit-der-fahrradf%c3%a4hre-r/showdetails?page=2&refcur=EUR";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
            include("language/en-GB/pressroom.php");
            include("language/en-GB/footer.php");
            $link = "https://www.booksonderjylland.dk/en/book/to-do/1776117/experience-an-unforgettable-tour-on-the-bicycle-ferry-r%c3%b8dsan/showdetails?filter=t%3D&refcur=EUR";
        }else{
            include("language/dk-DK/pressroom.php");
            include("language/dk-DK/footer.php");
            $link = "https://www.booksonderjylland.dk/en/book/to-do/1776117/experience-an-unforgettable-tour-on-the-bicycle-ferry-r%c3%b8dsan/showdetails?filter=t%3D&refcur=EUR";
        }
    ?>
    <div class="overlay">
        <div class="modular">
            <div class="close">X</div>
            <div class="loading">
                <div class="loader"></div> 
                Rødsand is docking on, please wait... <span class="timer"></span>
            </div>
            <div class="warning">
                <?= $warning;?>
                <div class="contiune header-btn btn">
                    <?= $btn_info?>
                </div>
                <div class="close contiune header-btn btn">
                    <?= $close_btn;?>
                </div>
            </div>
            <iframe src="" frameborder="0" width="100%" height="100%" class="screen" style="display:none;"></iframe>
        </div>
    </div>
    <script src="/js/search.archive.js"></script>
    <? include("scripts/script.php")?>
</body>