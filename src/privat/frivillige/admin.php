<?
    ini_set("session_cookie.domain", ".".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]));
    session_start();
    if($_SESSION["frivillig_login"] != 1){
        header("Location: ../../frivillige-login");
    }

	$server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
    $mainHost = "www.".preg_replace("/^(.*?)\.(.*)$/","$2", $_SERVER["HTTP_HOST"]);
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frivillig Panel</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/mobile.css">
    <link rel="stylesheet" href="../../styles/reset.css">
  	<link rel="apple-touch-icon" sizes="57x57" href="/assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.5.207/pdf.min.js"></script>
  	<script   src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
</head>
<body>
<?
    include("../../language/dk-DK/header.php");
?>
    <main class="main-container">
        <nav class="small_navigation">
          	<ul>
              <li><a href="?service-operation">Opdatere Operation tilstand af Færgen</a></li>
              <li><a href="bestillinger">Se Bestilling status</a></li>
              <li><a href="upload-referater">Offentliggør Referater</a></li>
              <li><a href="online-bookinger">Eventsejlads bookinger</a></li>
            </ul>
        </nav>
        <div class="content">
          <p>Velkommen <?= $_SESSION["user"];?></p>
          <? if(!isset($_GET["service-operation"])){?>
          <h1>Vagtplan</h1>
          <a href="press?utm=login">Presse</a><br>
          <iframe src="viewer.php?file=vagtplan.pdf&v=<?= time()?>" width="100%" height="950px" frameborder="0"></iframe>
          <h1>Medlemmer</h1>
          <iframe src="viewer.php?file=medlemmer.pdf&v=<?= time()?>" width="100%" height="1050px" frameborder="0"></iframe>  
          <?}else{
          ?>
          <a href="admin">Tilbage</a>
          <br>
          <p>Rød + ingen flueben: Færgen køre ikke, der opstod en hindring i at Færgen kan køre, information er sendt ud på siden.</p>
          <p>Grønt + flueben: Færgen kan køre normalt, der er ingen problem sendt ud.</p>
          	<table>
            <tr>
                <th>Operation meddelelse</th>
                <th>Status</th>
            </tr>
            <?	
                $q = "?";
  				
  				$result = "SELECT * FROM services_operation";
  				$query = mysqli_query($db, $result);
                while($row = mysqli_fetch_assoc($query)){
                    $agent = $row['service_operation_msg'];
					$agent = mb_convert_encoding($agent, "UTF-8", "HTML-ENTITIES");
                    if($row["service_operation_stand"] == 0){
                      	$status = "1";
                        $active = "<span style='color: white;'><input type='checkbox' id='statusupdate' style='float:left; width:auto;' class='status' name='activate' data-user='".$row["id"]."' data-status='".$status."'></span>";
                        $color = "red";
                        $fontcolor = "white";
                    }else{
                      	$status = "0";
                        $active = "<span style='color: black;'><input type='checkbox' id='statusupdate' name='activate' style='float:left; width:auto;' class='status' data-user='".$row["id"]."' data-status='".$status."' checked></span>";
                        $color = "green";
                        $fontcolor = "white";
                    }
                    
                    echo "<tr>
                        <td style='background: ".$color."; color: ".$fontcolor.";'>". $agent ."</td>
                        <td style='background: ".$color.";'>".$active."</td>
                    </tr>";
                }
            ?>
        </table>
          <?
			}?>
        </div>
      	<script>
          var rows = document.querySelectorAll('#statusupdate');
            rows.forEach(row => {
                row.addEventListener('click', function(){
                	var user = row.getAttribute("data-user");
                  	var status = row.getAttribute("data-status");
                  
                  	$.ajax({
                        "url": "changeactivationstatus.php",
                        "type": "POST",
                        "data": {
                            "user": user,
                            "status": status
                        },
                        "success": function(data){
                            window.location.reload();
                        },
                      	"error": function(data){
                        	window.location.reload();
                        }
                    });
                });   
            });
            /* header("Location: https://support.intastellar.com/services-support/?services=Nordic Taggers"); */
      </script>
    </main>
    <?
    include("../../language/dk-DK/footer.php");
    include("../../scripts/script.php");
?>