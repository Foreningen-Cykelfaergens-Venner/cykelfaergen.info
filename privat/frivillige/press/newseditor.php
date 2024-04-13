<? 
	
	ini_set('session.cookie_domain', '.intastellarsolutions.com');
    session_start();
    $allowdEmails = [
        "intastellar.com",
        "intastellarsolutions.com"
    ];
    $allowdStatus = [
        "admin"
    ];
    
    $item = explode("@", $_SESSION["email"])[1];
    
    if($_SESSION["logged_in"] !== 1){
        header("Location: https://employee.intastellaraccounts.com/signin/v1/ws/identifier?continue=".urlencode("www.intastellarsolutions.com/". $_SERVER["REQUEST_URI"])."&service=Intastellar Admin&entryFlow=".base64_encode("www.intastellarsolutions.com/". $_SERVER["REQUEST_URI"])."&passive=true&flowName=GeneralOAuthFlow&Entry=ServiceSignin");
    }else if(in_array($_SESSION["status"], $allowdStatus) != 1 || in_array($item, $allowdEmails) != 1){
        header("Location: https://www.intastellarsolutions.com");
    }

    $host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($hos, $username, $password, $dbname);

	date_default_timezone_set('Europe/Copenhagen');
	$time = date("H:i");

	if ($time < "12:00") {
        $date = "good morning";
    } else if ($time >= "12:00" && $time < "16:59") {
        $date = "good afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17:00" && $time < "21:59") {
        $date = "good evening";
    } else if ($time > "22:00") {
        $date = "good night";
	}

	$written_by = $_SESSION["name"];
	$_SESSION["HTTP_REFERER"] = "www.intastellarsolutions.com/". $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex, nofollow" />
		<title>Admin Dashboard</title>
		<link rel="icon" type="image/png" sizes="16x16" href="https://assets.intastellar-clients.net/fav-icon/favicon-16x16.png">
		<link rel="apple-touch-icon" sizes="57x57" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi01N3g1Ny5wbmc=">
		<link rel="apple-touch-icon" sizes="60x60" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi02MHg2MC5wbmc=">
		<link rel="apple-touch-icon" sizes="72x72" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi03Mng3Mi5wbmc=">
		<link rel="apple-touch-icon" sizes="76x76" href="https://assets.intastellar-clients.net/ZmF2LWljb24vYXBwbGUtaWNvbi03Nng3Ni5wbmc=">
		<link rel="apple-touch-icon" sizes="114x114" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="https://assets.intastellar-clients.net/fav-icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="https://assets.intastellar-clients.net/fav-icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="https://assets.intastellar-clients.net/fav-icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="https://assets.intastellar-clients.net/fav-icon/favicon-96x96.png">
		<link rel="stylesheet" href="https://www.intastellarsolutions.com/css/reset.css">
		<link rel="stylesheet" href="https://apis.intastellar.com/styles/nav_container.css">
		<link rel="stylesheet" href="https://www.intastellarsolutions.com/css/style.css">
		<link rel="stylesheet" href="https://www.intastellarsolutions.com/css/mobile.css">
		<link rel="stylesheet" href="https://www.intastellarsolutions.com/css/newsroom.css?v=<?= time(); ?>">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	</head>
	<body class="container">
	<header class="header">
        <section class="header__content">
            <img class="header__content-logo" src="https://assets.intastellar-clients.net/bG9nb3MvaW50YXN0ZWxsYXJfc29sdXRpb25zQDJ4LnBuZw==" alt="Intastellar Solutions Logo" srcset="">
            <div class="user_container">
                <div class="user_profile_image">
                    <img src="<?= $_SESSION["image"]?>" alt="" srcset="">
                </div>
                <div class="services_overview">
                    <svg class="gb_We" focusable="false" viewBox="0 0 24 24"><path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path></svg>
                </div>
                <div class="services-overview-container">
                    <iframe src="https://doc.intastellaraccounts.com/services-overview" frameborder="0"></iframe>
                </div>
                <div class="user_content">
                    <div class="dropdown-image-name">
                        <img src="<?= $_SESSION["image"]?>" alt="" srcset="" class="content-img">
                        <div class="dropdown-name">
                            <div class="dpdn"><?= $_SESSION["name"];?></div>
                            <div class="dpde"><?= $_SESSION["email"];?></div>
                            <div class="acc">
                                <a href="https://my.intastellaraccounts.com" target="_blank">Manage Your Intastellar Account</a>
                            </div>
                            <div class="accp">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-links">
                    </div>
                    <div class="sign_out_btn_container">
                        <a class="sign_out_btn" href="https://accounts.intastellarsolutions.com/empolyee_logout.php">
                            Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </header>
    	<main class="content">
			<section class="saved_container">
				<div class="saved_content"></div>
			</section>
			<section class="container">
                <? if(isset($_GET["id"]) && isset($_GET["title"]) && isset($_GET["edit"]) && $_SESSION["logged_in"] == 1){
					$sql = mysqli_query($db, "SELECT * FROM news_draft WHERE news_id = ". $_GET["id"]);
					
					if($sql){
						$row_num = $sql->num_rows;
					}

					while($row = $sql->fetch_assoc()){
						$title = $row["title"];
						$news = $row["main_text"];
						$byline = $row["byline"];
						$id = $row["news_id"];
						$img = $row["img"];
						$imgDescription = $row["imgDescription"];

						$pub = $row["published"];

						$category = $row["category"];
						$place = $row["place"];
						$link_title = $row["link_title"];
						$link_category = $row["link_category"];
						$department = $row["department"];
						if($department == "all" || $department == ""){
							$imgUrl = "/newsroom/news-img/";
							$folder = "/newsroom/";
						}else{
							$imgUrl = "/ecommerce/news/news-img/";
							$folder = "/ecommerce/news/";
						}
						
						$url = $row["link_category"] . "/" . $row["y"] . "/" . $row["m"] . "/" . $row["link_title"];

						if($row["published"] == "0"){
							$online = "rgb(152, 152, 152)";
						}else{
							$online = "rgb(44, 187, 0)";
						}
					}
					
                ?>
					<div class="user">
						<a href="/admin/dashboard">Back</a><br>
						<? if($pub == "1"){?>
							<a href="<?= $folder;?><?= $url;?>" target="_blank">Visit article</a>
						<?} ?>
					</div>
					<h1>Your editing: <?= $title?></h1>
					<div class="editor">
						<form class="edit-form" action="" method="POST">
							<button id="publish" class="sbtn_news">Publish</button>
							<select name="department" id="">
								<option value="all" <? if($department == "all"){?>selected<?}?>>Group</option>
								<option value="ecommerce" <? if($department == "ecommerce"){?>selected<?}?>>E-Commerce</option>
							</select>
							<select name="category" id="">
								<option value="Pressemeddelse" <? if($category == "Pressemeddelse"){?>selected<?}?>>Pressemeddelse</option>
								<option value="Update" <? if($category == "Update"){?>selected<?}?>>Update</option>
							</select>
							<input type="text" class="fields headline" name="title" placeholder="Edit title" value="<?= $title; ?>">
							Written by:
							<input type="text" class="fields" name="written_by" value="<?= $written_by;?>">
							Place:
							<input type="text" class="fields" name="place" value="<?= $place?>">
							<img class="newsimg" src="<?= $imgUrl;?><?= $img?>">
							Image Alt & info text:
							<input type="text" class="fields byline" name="imgDescription" placeholder="Add image description" value="<?= $imgDescription;?>">
							Byline:
							<input type="text" class="fields byline" placeholder="Byline" name="byline" value="<?= $byline; ?>">
							<input type="hidden" name="news_id" value="<?= $id?>">
							<input type="hidden" name="link_title" value="<?= $link_title?>">
							<input type="hidden" name="img" class="fields byline" value="<?= $img?>">
							Main text:
							<div name="msg" id="t_field" class="t_field fields" contentEditable="true">
								<img src="/img/index.ajax-spinner-preloader.svg">
								Downloading news please wait...
							</div>
							<textarea name="msg" style="display: none;"></textarea>
							<button id="save" class="sbtn_news">Save</button>
						</form>
					</div>
				<?}else if(isset($_GET["new"]) && $_GET["new"] == "True"){?>
					<div class="user">
						<a href="/admin/dashboard">Back</a><br>
						<? if($pub == "1"){?>
							<a href="<?= $folder;?><?= $url;?>" target="_blank">Visit article</a>
						<?} ?>
					</div>
					<h1>Add a new article</h1>
					<div class="editor">
						<form class="edit-form" method="POST">
							<select name="department" id="">
								<option disabled selected>Select a depratment</option>
								<option value="all">Group</option>
								<option value="ecommerce">E-Commerce</option>
							</select>
							<select name="category" id="">
								<option disabled selected>Select a type</option>
								<option value="Pressemeddelse">Pressemeddelse</option>
								<option value="Update">Update</option>
							</select>
							<input type="text" class="fields headline" name="title" placeholder="Edit title" value="<?= $title; ?>">
							Written by:
							<input type="text" class="fields" name="written_by" value="<?= $written_by;?>">
							Place:
							<input type="text" class="fields" name="place" value="<?= $place?>">
							<img class="newsimg" src="">
							Image Alt & info text:
							<input type="text" class="byline" name="imgDescription" placeholder="Add image description" value="<?= $imgDescription;?>">
							Byline:
							<input type="text" class="fields byline" placeholder="Byline" name="byline" value="<?= $byline; ?>">
							<input type="file" name="fileToUpload" class="fields hidden img" value="<?= $img?>">
							Main text:
							<div name="msg" id="t_field" class="t_field fields" contentEditable="true">

							</div>
							<textarea name="msg" style="display: none;"></textarea>
							<button id="save" class="sbtn_news">Save</button>
						</form>
					</div>
				<?}?>
				<div style="clear: both;"></div>
			</section>
		</main>
		<div class="popup hide" style="display: none;">
			<div class="popup-container">
				<div style="width: 100%; height: 100%;">
					<button id="btn">X</button>
					<div class="pop-content-center">
						<div class="popup-content"></div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var publish = document.getElementById("publish");
			var save = document.getElementById("save");
			var form = document.querySelector(".edit-form");
			var pop_up = document.querySelector(".popup");
			var btn = document.getElementById("btn");
			
			<? if(isset($_GET["new"]) == "True"){?>
				let img = document.querySelector(".newsimg");
				let imgInput = document.querySelector(".img");

				img.addEventListener("click", function(){
					imgInput.click();
				});

				imgInput.addEventListener("change", function() {
					if (imgInput.value) {
						var reader = new FileReader();

						reader.addEventListener("load", function(e){

							var img = new Image();

							localStorage.setItem("image", e.target.result);

							var newIMG = localStorage.getItem("image");

							document.querySelector(".newsimg").src = e.target.result;
						});
						reader.readAsDataURL(imgInput.files[0]);
					} else {
						customTxt.innerHTML = "No file chosen, yet.";
					}
				});
			<? }?>

			function saveFile(){

				var news = document.querySelector(".edit-form .t_field").innerText.replace('""', '');
				document.querySelector(".edit-form textarea").innerHTML = news + "\n";

				var http = new XMLHttpRequest();

				<? if(isset($_GET["new"]) == "True"){?>
				var url = "save_new.php";
				<?}else{?>
				var url = "save.php";
				<?}?>

				

				var para = new FormData(document.querySelector('.edit-form'));
				
				http.open("POST", url, true);

				http.onreadystatechange = function() {//Call a function when the state changes.
					if(http.readyState == 4 && http.status == 200) {
						form.blur();
						document.querySelector(".saved_container").querySelector(".saved_content").innerHTML = http.responseText;
						document.querySelector(".saved_container").style.visibility = "visible";
						document.querySelector(".saved_container").style.top = "0";

						setTimeout(() => {
							document.querySelector(".saved_container").style.top = "-45px";
							document.querySelector(".saved_container").style.visibility = "hidden";
						}, 1500);
					}
				}
				http.send(para);
			}

			btn.addEventListener("click", function(){
				pop_up.classList.add("hide");
			});

            function processReqChange() { 
                // only if req shows "loaded" 
                if (req.readyState == 4) { 
                    // only if "OK" 
                    if (req.status == 200) { 
                        document.querySelector(".edit-form .t_field").value = req.responseText; 
                    } else { 
                        alert("There was a problem retrieving the XML data:n" + req.statusText); 
                    } 
                } 
            }
			
			var timerout;
			window.addEventListener("load", function(){
				$(".edit-form .t_field").load("get_data.php?id=<?= $_GET["id"]?>&" + new Date().getTime() + "");
			})
			<? if(!isset($_GET["new"])){?>
		    document.querySelector(".edit-form").addEventListener("keyup", function(e){

				var ctsave = (window.navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)  && e.keyCode == 83;
		        
		        if (!ctsave) {
					saveFile();
				}
		    });
			<?}?>
			
			function publishFile(){

				var news = document.querySelector(".edit-form .t_field").innerText.replace('""', '');
				document.querySelector(".edit-form textarea").innerHTML = news;

				var http = new XMLHttpRequest();
				<? if(isset($_GET["new"]) == "True"){?>
					var url = "publish_new.php";
				<?}else{?>
					var url = "publish.php";
				<?}?>
				var para = new FormData(document.querySelector('.edit-form'));
				
				http.open("POST", url, true);

				http.onreadystatechange = function() {//Call a function when the state changes.
					if(http.readyState == 4 && http.status == 200) {
						form.blur();
						document.querySelector(".saved_container").querySelector(".saved_content").innerHTML = http.responseText;
						document.querySelector(".saved_container").style.visibility = "visible";
						document.querySelector(".saved_container").style.top = "0";

						/* setTimeout(() => {
							document.querySelector(".saved_container").style.top = "-45px";
							document.querySelector(".saved_container").style.visibility = "hidden";
						}, 2000); */
					}
				}
				http.send(para);
			}

			save.addEventListener("click", function(e){
				e.preventDefault();
				saveFile();
			});

			publish.addEventListener("click", function(e){
				e.preventDefault();
				publishFile();
			});

			<? if(!isset($_GET["new"])){?>
				setTimeout(function(){
					saveFile();
				}, 5 * 60 * 1000);
			<?}?>
			<? if(!isset($_GET["new"])){?>
			document.addEventListener("keydown", function(e) {
				if ((window.navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)  && e.keyCode == 83) {
					e.preventDefault();
					saveFile();
				}
			}, false);
			<? }?>
			document.addEventListener("keydown", function(e) {
				if (e.keyCode == 13) {
					pop_up.classList.add("hide");
				}
			});

			function dropin(){
				if(document.querySelector(".nav").style.transform === "translate(-105%)"){
					document.querySelector(".nav").style.transform = "translate(0px)";
				}else if(document.querySelector(".nav").style.transform == ""){
					document.querySelector(".nav").style.transform = "translate(0px)";
				}else{
					document.querySelector(".nav").style.transform = "translate(-105%)";
				}
			}

			/* var searchicon = document.querySelector(".search-icon");

			searchicon.addEventListener("click", function(){
				if(document.querySelector(".search-form").style.opacity == "0" && document.querySelector(".search-form").style.visibility == "hidden"){
					document.querySelector(".search-form form label input").focus();
					document.querySelector(".search-form").style.opacity = "1";
					
					document.querySelector(".search-form").style.visibility = "visible";
				}else{
					document.querySelector(".search-form").style.opacity = "0";
					document.querySelector(".search-form").style.visibility = "hidden";
				}
			}); */

			/* window.addEventListener("mouseup", function(e){
				var searchForm = document.querySelector(".search-form");
				var input = document.querySelector(".search-form form label input");
				if(e.target != searchForm && e.target != input){
					document.querySelector(".search-form").style.opacity = "0";
					document.querySelector(".search-form").style.visibility = "hidden";
				}
			});

			window.addEventListener("scroll", function(){
				if(document.querySelector(".search-form").style.opacity == "1" && document.querySelector(".search-form").style.visibility == "visible"){
					document.querySelector(".search-form").style.opacity = "0";
					document.querySelector(".search-form").style.visibility = "hidden";
				}
			}); */
		</script>	
		<script>
        var image = document.querySelector(".user_profile_image");
        var usercontent = document.querySelector(".user_content");

        var services = document.querySelector(".services_overview");
        var servicesoverview = document.querySelector(".services-overview-container");

        services.addEventListener("click", function(){
            if(servicesoverview.style.display === "" || servicesoverview.style.display === "none"){
                servicesoverview.style.display = "block";
                services.classList.add("hover_effect_services");
                if(usercontent.style.display === "block"){
                    usercontent.style.display = "none";
                    image.classList.remove("hover_effect_profile");
                }
            }else{
                servicesoverview.style.display = "none";
                services.classList.remove("hover_effect_services");
            }
        });

        image.addEventListener("click", function(){
            if(usercontent.style.display === "" || usercontent.style.display === "none"){
                usercontent.style.display = "block";
                image.classList.add("hover_effect_profile");
                if(servicesoverview.style.display === "block"){
                    servicesoverview.style.display = "none";
                    services.classList.remove("hover_effect_services");
                }
            }else{
                usercontent.style.display = "none";
                image.classList.remove("hover_effect_profile");
            }
        });

        document.addEventListener("mouseup", function(e){

            if(e.currentTarget !== services || e.currentTarget !== image){
                usercontent.style.display = "none";
                servicesoverview.style.display = "none";
                image.classList.remove("hover_effect_profile");
                services.classList.remove("hover_effect_services");
            }else if(e.currentTarget == services && servicesoverview.style.display == "block" || e.currentTarget == image && usercontent.style.display == "block"){
                usercontent.style.display = "none";
                servicesoverview.style.display = "none";
                image.classList.remove("hover_effect_profile");
                services.classList.remove("hover_effect_services");
            }
        });
    </script>
	</body>
</html>