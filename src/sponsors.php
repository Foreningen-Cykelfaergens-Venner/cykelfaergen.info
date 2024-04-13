<?
$title = "Sponsors";
$description = "Sie wanderen gerne und sind zu Fuß unterwegs? Dann fahren Sie mit uns als Personenfähre.";
include($_SERVER["DOCUMENT_ROOT"] . "/components/header.php");
?>
<main class="content">
    <h1>Our Sponspors</h1>
    <section class="main-sponsors grid">
        <div class="sponsoreLogo__container"><img loading="lazy" class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/interreg_logo.png" alt="Interreg" srcset=""></div>
        <div class="sponsoreLogo__container"><img loading="lazy" class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/tour-bo.png" alt="Tour-Bo" srcset=""></div>
        <div class="sponsoreLogo__container"><img loading="lazy" class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/Mobilitetsforeningen-Logo.png" alt="Mobilitets forening" srcset=""></div>
        <div class="sponsoreLogo__container"><img loading="lazy" class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/erhversstyrelsens-landsdistriktpulje.jpg" alt="Erhversstyrelsens Landsdistriktpulje" srcset=""></div>
        <a href="https://www.intastellarsolutions.com" target="_blank" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://www.intastellarsolutions.com/assets/intastellar_solutions.svg" alt="Intastellar Solutions, International" srcset=""></a>
    </section>
    <section>

    </section>
</main>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/components/footer.php");
include($_SERVER["DOCUMENT_ROOT"] . "/scripts/script.php");
?>