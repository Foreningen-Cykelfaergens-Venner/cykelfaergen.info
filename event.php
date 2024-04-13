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

    //echo $ip;
    include($_SERVER["DOCUMENT_ROOT"] . "/db.php");
    

    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

    if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
        $title = "Eventsejlads | Flensborg fjord";

        $warning = "<h1>Book din tur</h1><br>
        <p>Valg en tur, til at fortsætte med</p>";
        $btn_info = "Accepteret og fortsæt";

        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord. Tag din egen mad og drikke med og få et par hyggelige stunder på Flensborg Fjord. Fra tre timer og til maks 12 personer.";

        $close_btn = "Luk";
    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
        $title = "Eventsegeln | Fahrradfähre Flensburger Förde";

        $warning = "<h1>Buche deine fahrt</h1><br>
        <p>Wähle sie eine rute aus mit der sie fortfahren möchten.</p>";
        $btn_info = "Akzeptiren und fortfahren";
        $close_btn = "Schließen";

        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord. Tag din egen mad og drikke med og få et par hyggelige stunder på Flensborg Fjord. Fra tre timer og til maks 12 personer.";

    }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
        $title = "Event tours | Bicycle ferry Flensburger Fjord";
        $warning = "<h1>WARNING COOKIES</h1><br>
        <p>by proceeding to booksonderjylland.dk App you accept the handling of personal data(name, e-mail etc.) and cookies by third parties(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accept and continue";
        $close_btn = "Close";

        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord. Tag din egen mad og drikke med og få et par hyggelige stunder på Flensborg Fjord. Fra tre timer og til maks 12 personer.";
    }else{
        $title = "Eventsejlads | Cykelfærgen Flensborg fjord";

        $warning = "<h1>ADVARSEL COOKIES</h1><br>
        <p>ved fortsættelse af booksonderjylland.dk App'en accepter du behandlinger af personlige informationer(name, e-mail etc.) og cookies af tredje partier(booksonderjylland.dk, facebook, twitter, google etc.)</p>";
        $btn_info = "Accepteret og fortsæt";
        $close_btn = "Luk";

        $description = "Hej og velkommen ombord. Nu kan du booke færgen MS Rødesand helt til dig alene. Hold en fest eller inviter nogle venner med ombord. Tag din egen mad og drikke med og få et par hyggelige stunder på Flensborg Fjord. Fra tre timer og til maks 12 personer.";
    }
?>
<?
    include($_SERVER["DOCUMENT_ROOT"]."/components/header.php");
?>
    <?
        if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){
            include("language/dk-DK/event-container.php");
            include("language/dk-DK/footer.php");
            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
            include("language/de-DE/event-container.php");
            include("language/de-DE/footer.php");
            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "en-GB"){
            include("language/en-GB/event-container.php");
            include("language/en-GB/footer.php");
            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
        }else{
            include("language/dk-DK/event-container.php");
            include("language/dk-DK/footer.php");
            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
        }
        include("scripts/script.php");
    ?>
</body>
</html>