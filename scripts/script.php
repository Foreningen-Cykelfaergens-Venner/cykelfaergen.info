<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://<?= $mainHost;?>/js/jquery.migrate.js"></script>
<script type="text/javascript" src="https://<?= $mainHost;?>/js/slick/slick.min.js"></script>
<!-- <script src="https://<?= $mainHost;?>/js/reviews.js?v=<?php echo time(); ?>" async defer></script> -->
<script type="text/javascript" defer>
    let numbersOfSlides = 3;
    if(window.innerWidth <= 900){
        numbersOfSlides = 1;
    }
    
    $(document).ready(function() {
        /* $(".service-messages").slick({
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 3500,
        }); */
        $(".image-slider").slick({
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 3500,
        });
    });
</script>
</body>

</html>