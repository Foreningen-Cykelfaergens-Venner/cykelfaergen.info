<?

?>
<!DOCTYPE html>
<html>
  	<head>
    	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gewinnspiel</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="styles/reset.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/mobile.css">
        <link rel="stylesheet" href="styles/pressroom.css">
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
        <script src="https://www.intastellarsolutions.com/js/cookie-banner.js?v=<?= time();?>"></script>
        <script src="/js/setLocation.js"></script>
        <script>
          window.INT = {
              key: "6836650698",
              settings: {
                  color: "rgb(4, 108, 109)",
                  keepInLocalStorage: ["hideInfoBanner"]
              }
          }
        </script>
  	</head>
  <body>
    <? include("language/de-DE/header.php");?>
    <div class="main-container">
        <div class="content">
          	<h1>Gewinne 4 gratis Tickets in einem Wert von je 250 Kr </h1>
          	<form action="tilmeld.php" method="POST">
              	<label>
                	Name: <input name="name" type="text">  
              	</label>
          		<label>
                	Email: <input name="email" type="text">  
              	</label>
              	<p>Wieviele dänische Häfen erreicht die Fahrradfähre 2020?</p>
              	<label>
                	<input name="answer" type="radio" value="2"> 2<br>
              	</label>
              	<label>
                	<input name="answer" type="radio" value="3"> 3<br>
              	</label>
              	<label>
                	<input name="answer" type="radio" value="4"> 4<br>
              	</label>
              	<input type="submit" value="Svar">
          	</form>
        </div>
    </div>
  </body>
</html>