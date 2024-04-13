<?
    $dkUrlFlensborg = "https://www.booksonderjylland.dk/da/bok/aktivitet/1761580/på-¨sprittur¨-over-den-smukke-fjord-til-flensborg/showdetails?filter=t%3DFlensborg";
    $deUrlFlensborg = "https://www.booksonderjylland.dk/da/bok/aktivitet/1761580/på-¨sprittur¨-over-den-smukke-fjord-til-flensborg/showdetails?filter=t%3DFlensborg";
    $enUrlFlensborg = "https://www.booksonderjylland.dk/da/bok/aktivitet/1761580/på-¨sprittur¨-over-den-smukke-fjord-til-flensborg/showdetails?filter=t%3DFlensborg";

    $dkUrlNormal = "https://www.booksonderjylland.dk/da/ta-med-pa-en-uforglemmelig-sejltur-med-cykelfaergen-rodsand";
    $deUrlNormal = "https://www.booksonderjylland.dk/de/erleben-sie-eine-unvergessliche-fahrt-mit-der-fahrradfahre-rodsand";
    $enUrlNormal = "https://www.booksonderjylland.dk/en/experience-unforgettable-tour-bicycle-ferry-rodsand";

    if($_GET["tur"] == "flensborg"){
        if($_COOKIE["region"] == "dk-DK"){
            $urlFlensborg = $dkUrlFlensborg;
        }else if($_COOKIE["region"] == "de-DE"){
            $urlFlensborg = $deUrlFlensborg;
        }else if($_COOKIE["region"] == "en-GB"){
            $urlFlensborg = $enUrlFlensborg;
        }
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <script type="text/javascript" language="Javascript">window.open('<?= $urlFlensborg;?>');</script>
            </head>
            </html>
        <?
    }else{
        if($_COOKIE["region"] == "dk-DK"){
            $url = $dkUrlNormal;
        }else if($_COOKIE["region"] == "de-DE"){
            $url = $deUrlNormal;
        }else if($_COOKIE["region"] == "en-GB"){
            $url = $enUrlNormal;
        }
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <script type="text/javascript" language="Javascript">window.open('<?= $url;?>');</script>
            </head>
            </html>
        <?
    }
?>