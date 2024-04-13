<?
    $title = "le Tour de Brunsnæs 2022 | Cykelfærgen Flensborg Fjord";
    $description = "Cykelfærgen Flensborg fjord til Tour de France.";
    header("Location: /");
    die();
    include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="container">
    <?
        if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
            include( "da/index.php" );
        } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
            include( "de/index.php" );
        } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
            include( "en/index.php" );
        } else {
            include( "da/index.php" );
        }
    ?>
</main>
<script>
    window.addEventListener("scroll", function(){
        if(window.scrollY >= 500){
            document.querySelector(".tourdefrance .header").classList.add("bg");
        }else{
            document.querySelector(".tourdefrance .header").classList.remove("bg");
        }
    });

    /* document.querySelector(".sideMenu").addEventListener("click", function(){
        document.querySelector(".tourDeNavigation").classList.toggle("show");
    })

    document.querySelector(".tdfMenuClose").addEventListener("click", function(){
        document.querySelector(".tourDeNavigation").classList.toggle("show");
    }) */
</script>
<script>
    const countDownDate = new Date("June 25, 2022 10:00:00 GMT+02:00").getTime();

    // Update the count down every 1 second
    let x = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();
            
        // Find the distance between now and the count down date
        let distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        if(seconds < 10){
            seconds = "0" + seconds;
        }

        if(minutes < 10){
            minutes = "0" + minutes;
        }

        if(hours < 10){
            hours = "0" + hours;
        }

        // Output the result in an element with id="demo"
        document.querySelector(".tdfCounter .daysItem").innerHTML = days;
        document.querySelector(".tdfCounter .hoursItem").innerHTML = hours;
        document.querySelector(".tdfCounter .minsItem").innerHTML = minutes;
        document.querySelector(".tdfCounter .secItem").innerHTML = seconds;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.querySelector(".tdfCounter").innerHTML = "Welcome";
        }
    }, 1000);
</script>
<?
    include($_SERVER["DOCUMENT_ROOT"] . "/language/dk-DK/footer.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>