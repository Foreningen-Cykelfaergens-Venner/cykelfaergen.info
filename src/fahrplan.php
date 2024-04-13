<?
$title = "Fahrplan | Fahrradfähre Flensburger Förde";
$description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann nehmen Sie die Personen- & Fahrradfähre von Langballig aus nach Egernsund.";
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/components/timetable.php");
?>
<main class="container">
    <section class="content">
        <h1>Fahrplan</h1>
        <?php
            createTimetable(1);
            createTimetable(2);
        ?>
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
    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>