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
        header("Location: https://employee.intastellaraccounts.com/signin/v1/ws/identifier?continue=".urlencode("www.intastellarsolutions.com/admin/dashboard")."&service=Intastellar Admin&entryFlow=".base64_encode("www.intastellarsolutions.com/admin/dashboard")."&passive=true&flowName=GeneralOAuthFlow&Entry=ServiceSignin");
    }else if(in_array($_SESSION["status"], $allowdStatus) != 1 || in_array($item, $allowdEmails) != 1){
        header("Location: https://www.intastellarsolutions.com");
    }

    $host       = "intastellarsolutions.com.mysql";
    $username   = "intastellarsolutions_comblog";
    $password   = "65N8e?7*mQ8jHc+=yuTqDzHd3-xART";
    $dbname     = "intastellarsolutions_comblog"; // will use later

    $db = mysqli_connect($hos, $username, $password, $dbname);
    $_SESSION["HTTP_REFERER"] = "www.intastellarsolutions.com/admin/dashboard";
?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://www.intastellarsolutions.com/css/newsroom.css">
    <link rel="stylesheet" href="https://www.intastellarsolutions.com/css/mobile.css">
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
        <section>
            <a href="newseditor?new=True">Write news</a>
        </section>
        <?php
            $sql = mysqli_query($db, "SELECT * FROM news_draft ORDER BY published_at DESC");
    
            if($sql){
                $row_num = $sql->num_rows;
            }
        
            while($row = $sql->fetch_assoc()){
                $main_title = $row["title"];
                $img = $row["img"];
                $byline = $row["byline"];
                $plain = $row["main_text"];
                $category = $row["category"];
                $department = $row["department"];
                $plublished = date("d.m.Y", strtotime($row["published_at"]));
                if($row["published"] == "1"){
                    $banner = "<div class='publish_banner'>Published</div>";
                }

                if($department == "all" || $department == ""){
                    $imgUrl = "/newsroom/news-img/";
                    $folder = "/newsroom/";
                    $department = "Group";
                }else{
                    $imgUrl = "/ecommerce/news/news-img/";
                    $folder = "/ecommerce/news/";
                    $department = "E-Commerce";
                }
        
                $url = "newseditor?id=". $row["news_id"]."&title=".$main_title."&edit=true";
                ?>
                <a href="<?= $url?>" class="news-content-link col">
                    <div class="news-content-front">
                        <p>Department: <?= $department;?></p>
                        <div class="news-header-front"><img src="<?= $imgUrl?><?= $img; ?>" class="news-img" alt=""></div>
                        <div class="news-c">
                            <div class="cate"><span class="cat-span"><?= $category; ?></span></div>
                            <div class="title ow">
                                <?= $main_title; ?>
                            </div>  
                            <time class="time"> <?= $plublished; ?></time>
                        </div>
                    </div>
                </a>
        <?
            }
        ?>
    </main>
    <footer style="padding: 50px 0px;">

    </footer>
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