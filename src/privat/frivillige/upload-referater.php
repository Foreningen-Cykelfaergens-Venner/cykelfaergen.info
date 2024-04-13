<?
    ini_set("session_cookie.domain", ".".$_SERVER["HTTP_HOST"]);
    session_start();
    if($_SESSION["frivillig_login"] != 1){
        header("Location: ../../frivillige-login?url=". $_SERVER["REQUEST_URI"]);
    }

	$server = "mysql73.unoeuro.com";
    $user = "cykelfaergen_info";
    $password = "natwh9kp";
    $database = "cykelfaergen_info_db_website";

    $db = mysqli_connect($server, $user, $password,$database);
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex;">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offentliggører Referater |  Frivillig Panel</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../../styles/reset.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/mobile.css">
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
        <section class="content">
            <nav class="small_navigation">
                <ul>
                    <li><a href="admin">Tilbage</a></li>
                    <li><a href="admin?service-operation">Opdatere Operation tilstand af Færgen</a></li>
                    <li><a href="bestillinger">Se Bestilling status</a></li>
                    <li><a href="upload-referater">Offentliggør Referater</a></li>
                </ul>
            </nav>
            <h1>Offentliggører Referater fra bestyrelsesmøder</h1>
            <p>Her kan du offentliggører referater fra bestyrelsesmøder i "Foreningen Cykelfærgen´s Venner".</p>
            <p>Du bedes at kun uploade filen som en Word fil (<strong>.doc</strong> eller <strong>.docx</strong>)</p>
            <form action="uploadfile" method="post" enctype="multipart/form-data">
                <label for="title">Kort Title:</label>
                <input class="upload__title--input" type="text" name="title" id="title" placeholder="Kort title"><br><br>
                <label for="file" class="button">Valg filen</label>
                <article class="fileName"></article>
                <input type="file" id="file" name="fileToUpload" class="fileToUpload" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"><br><br>
                <button type="submit" class="btn banner-btn">Offentliggører</button>
            </form>
        </section>
    </main>
    <script>
        const fileInput = document.querySelector("#file");
        const fileName = document.querySelector(".fileName");

        fileInput.addEventListener("change", function(){
            fileName.textContent = this.value.replace("C:\\fakepath\\", ""); 
        })

    </script>
    <?
        include("../../language/dk-DK/footer.php");
    ?>
</body>