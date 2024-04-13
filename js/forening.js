window.addEventListener("DOMContentLoaded", function(){
    let height = document.querySelector(".main-header").clientHeight;
    
    if(document.querySelector(".mt") !== null){
        let c = document.querySelector(".mt");

        c.style.marginTop =  "0px";
    }

    let icon = document.querySelector(".sideNavigation__menu_icon");
    let menu = document.querySelector(".sideNavigation__menu");
    let forHeader = document.querySelector(".sideNavigation");

    icon.addEventListener("click", function(e){
        if(document.querySelector(".navigation").classList.contains("--active") !== true){
            menu.classList.toggle("active");
            document.body.classList.toggle("--hidden");
            document.querySelector("html").classList.toggle("--hidden");
            icon.classList.toggle("--active");
        }
    })
});