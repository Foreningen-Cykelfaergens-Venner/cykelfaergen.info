<?
	require("db.php");
	if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["answer"])){
    	if($_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["answer"] !== ""){
        	$answer = $_POST["answer"];
          	$email = $_POST["email"];
          	$name = $_POST["name"];
          
          	$sql = "INSERT INTO gewinnspiel(name,email,answer) VALUES('$name', '$email', '$answer')";
          	$query = mysqli_query($db, $sql);
          
          	if($query){
            ?>
				<!DOCTYPE html>
                  <html lang="en">
                  <head>
                      <meta charset="UTF-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <title></title>
                      <meta name="description" content="">
                      <link rel="stylesheet" href="styles/reset.css">
                      <link rel="stylesheet" href="styles/style.css">
                      <link rel="stylesheet" href="styles/mobile.css">
                      <link rel="stylesheet" href="styles/pressroom.css">
                  </head>
                  <body>
                    <?
                    	if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "dk-DK"){
                            include("language/dk-DK/header.php");
                       ?>
                    		<div class="main-container">
                              <div class="content">
                                <h2>Du er nu tilmeldt vores konkurrence!</h2>
                                <p>Når du har vundet, kontaktere vi dig med det sammen.</p>
                              </div>
                    		</div>
                    	<?
                            include("language/dk-DK/footer.php");
                            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1776117/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand/showdetails";
                        }else if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE"){
                            include("language/de-DE/header.php");
                         ?>
                    		<div class="main-container">
                              <div class="content">
                                <h2>Sie sind jetzt beim Gewinnspiel Registriert!</h2>
                                <p>Wenn sie gewonnen haben bekommen sie eine nachricht von uns.</p>
                              </div>
                    		</div>
                         <?
                            include("language/de-DE/footer.php");
                            $link = "https://www.booksonderjylland.dk/da/bok/aktivitet/1928896/ta-med-p%c3%a5-en-uforglemmelig-sejltur-med-cykelf%c3%a6rgen-r%c3%b8dsand-2/showdetails";
                        }
                    ?>
                  </body>
				</html>    
			<?
            }else{
            	echo mysqli_error($db);
            }
        }else{
        	echo "Please provide: name, email and a answer";
        }
    }else{
    	echo "Please submit a answer";
    }
?>