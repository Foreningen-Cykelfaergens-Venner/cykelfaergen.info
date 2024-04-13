/* function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

if(!window.ads){
    //alert("Please disable ad blocker, to support us!");
}

if(window.location.href.indexOf("fahrradfaehre.info") !== -1 && !getCookie("region") || window.location.href.indexOf("fahrradfaehre.info") !== -1 && getCookie("region") == ""){
    let language = "de-DE";
    const d = new Date();
    const exdays = 365;
    let domain = "";
    if(window.location.host.indexOf("www") != -1){
        domain = window.location.host.split(".")[1] + "." + window.location.host.split(".")[2];
    }else{
        domain = window.location.host.split(".")[0] + "." + window.location.host.split(".")[1];
    }
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = `region=${language}; ${expires}; path=/; domain=.${domain}`;
    window.location.reload();
}else if(window.location.href.indexOf("xn--cykelfrgen-i6a.info") != -1 && !getCookie("region") || window.location.href.indexOf("xn--cykelfrgen-i6a.info") !== -1 && getCookie("region") == ""){
    let language = "da-DK";
    const d = new Date();
    const exdays = 365;
    let domain = "";
    if(window.location.host.indexOf("www") != -1){
        domain = window.location.host.split(".")[1] + "." + window.location.host.split(".")[2];
    }else{
        domain = window.location.host.split(".")[0] + "." + window.location.host.split(".")[1];
    }
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = `region=${language}; ${expires}; path=/; domain=.${domain}`;
    window.location.reload();
}else if(window.location.href.indexOf("cykelfaergen.info") != -1 && !getCookie("region") || getCookie("region") == ""){
    let language = "da-DK";
    const d = new Date();
    const exdays = 365;
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    let domain = "";
    if(window.location.host.indexOf("www") != -1){
        domain = window.location.host.split(".")[1] + "." + window.location.host.split(".")[2];
    }else{
        domain = window.location.host.split(".")[0] + "." + window.location.host.split(".")[1];
    }
    document.cookie = `region=${language}; ${expires}; path=/; domain=.${domain}`;
    window.location.reload();
} */