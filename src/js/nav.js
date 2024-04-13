let domain = "";
if(window.location.host.indexOf("www") != -1 || window.location.host.indexOf("press") != -1 || window.location.host.indexOf("forening") != -1 || window.location.host.indexOf("booking") != -1){
    domain = window.location.host.split(".")[1] + "." + window.location.host.split(".")[2];
}else{
    domain = window.location.host.split(".")[0] + "." + window.location.host.split(".")[1];
}
function updateLanguageSettings(lgn) {
    const d = new Date();
    const exdays = 365;
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = `region=${lgn}; ${expires}; path=/; domain=.${domain}`;
}
window.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelectorAll(".js-btn");
    const overlay = document.querySelector(".booking__overlay");
    const closeIcon = document.querySelectorAll(".close");
    const frame = document.querySelector(".screen");
    
    const menu_icon = document.querySelector(".menu_icon");
    const menu = document.querySelector(".navigation");
    const subSubMenu = document.querySelectorAll(".subSubMenu");
    const subMenuAnchor = document.querySelectorAll(".subMenu__anchor");
    
    const header = document.querySelector(".main-header");
    const offer = document.querySelector(".test");
    const banner = document.querySelector(".hero__slider");
    const container = document.querySelector(".container");

    const sprog = document.querySelectorAll(".lang_chooser");
    const sprog_container = document.querySelectorAll(".lang_container");
    
    const afer = document.querySelector(".faqs_c");
    const faqs = document.querySelector(".faq_content");
    const afc = document.querySelector("#afc");
    const navicon = document.querySelectorAll(".navigation ul li a");
    const lang = document.querySelectorAll(".regionSelector-items a[data-language]");
    const regionSelector = document.querySelector(".regionSelector");
    const regionSelector_items = document.querySelector(".regionSelector-items");
    const sideNavigation__menu = document.querySelectorAll(".sideNavigation");
    let headerHeight;
    if(window.clientWidth >= 250 && window.clientWidth <= 800){
        headerHeight = document.querySelector(".main-header").clientHeight + document.querySelector(".test").clientHeight;
    }

    if(window.location.hash != "" && window.location.hash != null){
        let hashtag = window.location.hash;
        document.querySelector(hashtag).scrollIntoView();
    }

    window.addEventListener("scroll", function (e) {
        if(window.location.host.indexOf("forening") == -1 && window.location.href.indexOf("/om-os/forening") == -1 && window.location.href.indexOf("tourdebrunsnaes") == -1){
            if(window.pageYOffset > offer.clientHeight){
                header.classList.add("--fixedHeader");
                if(container != null){
                    container.style.marginTop = header.clientHeight + "px"
                }
                if (banner != null) {
                    banner.style.top = header.clientHeight + "px";
                }
            }else if(window.pageXOffset < offer.clientHeight){
                header.classList.remove("--fixedHeader");
                if(container != null){
                    container.style.marginTop = null;
                }
                if (banner != null) {
                    banner.style.top = null;
                }
            }
            if(window.innerWidth >= 250 && window.innerWidth <= 800){
                if(document.querySelector(".main-header").classList.contains("--fixedHeader")){
                    headerHeight = document.querySelector(".main-header").clientHeight;
                }else{
                    headerHeight = document.querySelector(".main-header").clientHeight + document.querySelector(".test").clientHeight;
                }
                menu.style.height = "calc(100vh - "+ headerHeight +"px)";
            }
        }

        if (sideNavigation__menu !== null) {
            sideNavigation__menu.forEach((header) => {
                if (window.pageYOffset > 
                    document.querySelector(".small-topHeader").clientHeight + 
                    document.querySelector(".header").clientHeight + 
                    document.querySelector(".small-topHeader").clientHeight
                ) {
                    header.classList.add("--fixed");
                } else if(window.pageXOffset < header.clientHeight){
                    header.classList.remove("--fixed");
                }
            });
        }
    })
    
    navicon.forEach((nav) => {
        nav.addEventListener("click", function (e,i) {
            if(!this.classList.contains("lang_chooser")){
                this.classList.toggle("--active");
            }
            /* this?.parentNode?.previousElementSibling.classList.remove("--active");
            this?.parentNode?.nextElementSibling.classList.remove("--active"); */
            if(this.href === undefined || this.href === "") return;
            
            let hashtag = this?.href?.match(/#[a-z]+/gi)[0];
            document.querySelector(hashtag).scrollIntoView();
            
            if(this.parentNode.parentNode.parentNode.classList.contains("lang_container")){
                this.parentNode.parentNode.parentNode.classList.remove("--active");
                this.parentNode.parentNode.parentNode.parentNode.querySelector(".arrow").classList.toggle("arrowUp");
            }

            /* document.addEventListener("click", function(e){
                if(this.parentNode.parentNode.parentNode.classList.contains("lang_container")){
                    this.parentNode.parentNode.parentNode.classList.remove("--active");
                    this.parentNode.parentNode.parentNode.querySelector(".arrow").classList.toggle("arrowUp");
                    this.parentNode.parentNode.classList.toggle("--active");
                }
            }) */
        })
    })

    for(let i=0; i<subMenuAnchor.length; i++){
        subMenuAnchor[i].addEventListener("click", function (e) {
            this.querySelector(".arrow").classList.toggle("arrowUp");
            subSubMenu[i].classList.toggle("--active");            
        });

        document.addEventListener("click", function(e){
            if(e.target != subSubMenu[i].parentNode.classList.contains("nav")){
                if(subSubMenu[i].parentNode.classList.contains("nav")){
                    subSubMenu[i].parentNode.parentNode.classList.remove("--active");
                    subSubMenu[i].parentNode.parentNode.querySelector(".arrow").classList.toggle("arrowUp");
                    subSubMenu[i].parentNode.classList.toggle("--active");
                }      
            }
        })
    }
    
    regionSelector.addEventListener("click", function(){
        regionSelector_items.classList.toggle("--open");
    })


    for(let i=0; i<lang.length; i++){
        lang[i].addEventListener("click", function(){
            let language = this.getAttribute("data-language");
            updateLanguageSettings(language);
            window.location.reload();
        })
    }

    if(faqs !== null){
        var height = faqs.clientHeight + document.getElementById("afc").clientHeight;
    
        faqs.addEventListener("click", function(){
            if(afer.style.height == height + "px"){
                afer.style.height = "90px";
                afer.style.bottom = "10px";
                afer.style.right = "10px";
                afer.style.width = "90px";
                afer.style.borderRadius = "50%";
                faqs.style.textAlign = "center";
                afc.style.marginTop = "42px";
                faqs.innerHTML = '?';
            }else{
                faqs.style.textAlign = "left";
                afer.style.bottom = "0px";
                faqs.innerHTML = "FAQ'S!";
                afer.style.width = "100%";
                afer.style.height = height + "px";
                afer.style.borderRadius = "0%";
                afc.style.marginTop = "0px";
            }
        });
    }
    
    menu_icon.addEventListener("click", function () {
        /* menu.style.height = "calc(100vh - " +header.clientHeight + "px)"; */
        if(document.querySelector(".sideNavigation__menu") !== null && document.querySelector(".sideNavigation__menu").classList.contains("active") !== true){
            menu.classList.toggle("--active");
            document.body.classList.toggle("--hidden");
            document.querySelector("html").classList.toggle("--hidden");
            menu_icon.classList.toggle("--active");
        }else{
            menu.classList.toggle("--active");
            document.body.classList.toggle("--hidden");
            document.querySelector("html").classList.toggle("--hidden");
            menu_icon.classList.toggle("--active");
        }
    })
    
    for(var i=0; i< navicon.length; i++){
        navicon[i].addEventListener("click", function(){
            if(!this.classList.contains("lang_chooser")){
                if(document.querySelector(".sideNavigation__menu") !== null && document.querySelector(".sideNavigation__menu").classList.contains("active") !== true){
                    menu.classList.toggle("--active");
                    document.body.classList.toggle("--hidden");
                    document.querySelector("html").classList.toggle("--hidden");
                    menu_icon.classList.toggle("--active");
                }else{
                    menu.classList.toggle("--active");
                    document.body.classList.toggle("--hidden");
                    document.querySelector("html").classList.toggle("--hidden");
                    menu_icon.classList.toggle("--active");
                }
            }
        });
    }
    
    for(let i=0; i<sprog.length; i++){
        sprog[i].addEventListener("click", function () {
            this.classList.toggle("--active");
            this.querySelector(".arrow").classList.toggle("arrowUp");
            sprog_container[i].classList.toggle("--active");

            /* if(sprog_container[i].classList.contains("--active")){
                this.classList.remove("--active");

            } */
        });
    }

   /*  btn.forEach((overLayBtn) => {
        overLayBtn.addEventListener("click", function (e) {
            e.preventDefault();
            window.location.href = "https://booking." + e.target.getAttribute("data-host").split(".")[1] +"." + e.target.getAttribute("data-host").split(".")[2];

        })
    }) */

    closeIcon.forEach((close) => {
        close.addEventListener("click", () => {
            overlay.style.display = "";
        })
    })
});