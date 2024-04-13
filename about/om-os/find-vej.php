<?
	  if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Find vej til Cykelfærgen Rødsand";

        $warning = "<h1>Book din tur</h1><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Finde den weg zur Fahrradfähre Rødsand";

        $warning = "<h1>Buche deine fahrt</h1><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Get directions to Bicycle ferry Rødsand";
        $warning = "<h1>WARNING COOKIES</h1><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";
    }else{
        $title = "Find vej til Cykelfærgen Rødsand";

        $warning = "<h1>ADVARSEL COOKIES</h1><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";
    }
    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
    }else{
        $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
    }
?>
    <?
	$root = str_replace("press", "public_html", $_SERVER["DOCUMENT_ROOT"]);
    include($root."/components/header.php");
	echo $root;
    ?>
  	<main class="content">
		<?if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
			echo "<h1>Find vej</h1>";
		}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
			echo "<h1>Wegbeschreibung</h1>";
		}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
			echo "<h1>Locations</h1>";
		}else{
			echo "<h1>Find vej</h1>";	
		}?>
		<div id="map" class="g-maps g-maps--full"></div>
      	<div id="address"></div>
  	</main>
	  <div class="clear"></div>
	  <?
		if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
			include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
			$link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
		}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
			include($_SERVER["DOCUMENT_ROOT"]."/language/de-DE/footer.php");
			$link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
		}else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
			include($_SERVER["DOCUMENT_ROOT"]."/language/en-GB/footer.php");
			$link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
		}else{
			include($_SERVER["DOCUMENT_ROOT"]."/language/dk-DK/footer.php");
			$link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
		}
	?>
		<script src="/js/maps.js"></script>
	<?
		include($_SERVER["DOCUMENT_ROOT"]."/scripts/script.php");
	?>
</body>