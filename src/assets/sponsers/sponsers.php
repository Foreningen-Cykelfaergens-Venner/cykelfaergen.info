<?
    if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK") {
        $sponsorTitle = "Vores sponsorer";
        $partnerTitle = "Partner";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])) {
        $sponsorTitle = "Unsere Sponsoren";
        $partnerTitle = "Partner";
    } else if (isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB") {
        $sponsorTitle = "Our sponsors";
        $partnerTitle = "Partners";
    } else {
        $sponsorTitle = "Sponsor";
        $partnerTitle = "Partner";
    }
?>
<p class="sponsore__title"><?= $sponsorTitle; ?></p>
<section class="sponsore-container">
    <article class="sponsore">
        <a href="https://www.nordschleswiger.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/nordschleswiger.svg"  alt="Der Nordschleswiger"></a>
        <a href="https://bdn.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/BDN.svg"  alt="Bund Deutscher Nordschleswiger - BDN"></a>
        <a href="https://marinaminde.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/marinaminde.png"  alt="Marina Minde"></a>
        <a href="https://www.interreg-de-dk.eu/dk/" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/interreg_logo.png"  alt="Interreg Deutschland-Danmark"></a>
        <a href="https://www.tour-bo.eu" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/tour-bo.png"  alt="Tour-Bo"></a>
        <div class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/Mobilitetsforeningen-Logo.png"  alt="Mobilitets forening"></div>
        <div class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/erhversstyrelsens-landsdistriktpulje.jpg"  alt="Erhversstyrelsens Landsdistriktpulje"></div>
        <a href="https://www.intastellarsolutions.com" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://www.intastellarsolutions.com/assets/logos/intastellar-logo-new.svg"  alt="Intastellar Solutions, International"></a>
        <a href="https://www.feriepartner.dk/soenderborg/" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/feriepartner-sonderborg.png"  alt="Feriepartner Sønderborg"></a>
        <a href="https://www.hpt.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/hpt.jpg"  alt="HPT - Hurtig Præcis Transport"></a>
        <a href="https://www.gfforsikring.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/GF_logo_m_payoff_bredformat_RBG.png"  alt="GF Forsikring - Overskud til hinanden"></a>
        <a href="https://lag-soenderborg-aabenraa.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/LAG_logosamling_Horisontal.png"  alt="GF Forsikring - Overskud til hinanden"></a>
    </article>
    <article class="sponsore" aria-hidden="true">
        <a href="https://www.nordschleswiger.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/nordschleswiger.svg"  alt="Der Nordschleswiger"></a>
        <a href="https://bdn.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/BDN.svg"  alt="Bund Deutscher Nordschleswiger - BDN"></a>
        <a href="https://marinaminde.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/marinaminde.png"  alt="Marina Minde"></a>
        <a href="https://www.interreg-de-dk.eu/dk/" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/interreg_logo.png"  alt="Interreg Deutschland-Danmark"></a>
        <a href="https://www.tour-bo.eu" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/tour-bo.png"  alt="Tour-Bo"></a>
        <div class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/Mobilitetsforeningen-Logo.png"  alt="Mobilitets forening"></div>
        <div class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/erhversstyrelsens-landsdistriktpulje.jpg"  alt="Erhversstyrelsens Landsdistriktpulje"></div>
        <a href="https://www.intastellarsolutions.com" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://www.intastellarsolutions.com/assets/logos/intastellar-logo-new.svg"  alt="Intastellar Solutions, International"></a>
        <a href="https://www.feriepartner.dk/soenderborg/" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/feriepartner-sonderborg.png"  alt="Feriepartner Sønderborg"></a>
        <a href="https://www.hpt.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/hpt.jpg"  alt="HPT - Hurtig Præcis Transport"></a>
        <a href="https://www.gfforsikring.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/GF_logo_m_payoff_bredformat_RBG.png"  alt="GF Forsikring - Overskud til hinanden"></a>
        <a href="https://lag-soenderborg-aabenraa.dk" target="_blank" rel="noopener nofollow external" class="sponsoreLogo__container"><img class="sponsoreLogo" src="https://<?= $mainHost;?>/assets/logo/sponsores/LAG_logosamling_Horisontal.png"  alt="GF Forsikring - Overskud til hinanden"></a>
    </article>
</section>
<!-- <h2><?= $partnerTitle; ?></h2>
<article class="sponsore">
    <a href="https://www.visitsonderjylland.dk" class="sponsoreLogo__container" target="_blank"><img class="sponsoreLogo" src="https://www.visitsonderjylland.dk/sites/visitsonderjylland.com/files/2019-04/visitsønderjylland-logo.png" alt="Destination Sønderjylland"></a>
    <a href="https://www.flensburger-foerde.de" class="sponsoreLogo__container" target="_blank"><img class="sponsoreLogo" src="https://www.flensburger-foerde.de/typo3conf/ext/h2template/Resources/Public/Images/logo.svg" alt="Tourismus Agentur Flensburger Förde GmbH"></a>
</article> -->