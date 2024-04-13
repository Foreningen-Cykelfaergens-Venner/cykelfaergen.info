function getCookie(cname) {
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
var isExternal = function (url) {
    var domain = function (url) {
        return url.replace("http://", "").replace("https://", "").split("/")[0];
    };
    return domain(window.location.href) !== domain(url);
};

function listCookies() {
    var theCookies = document.cookie.split(";");
    var aString = "";
    for (var i = 1; i <= theCookies.length; i++) {
        aString += i + " " + theCookies[i - 1] + "\n";
    }
    return aString;
}
const expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
const reg = new RegExp(expression);
const array = [
    "www.google-analytics.com",
    "connect.facebook.net"
]

const observer = new MutationObserver((mutations) => {
    mutations.forEach(({ addedNodes }) => {
        addedNodes.forEach((node) => {
            if (node.nodeType === 1 && node.tagName === "SCRIPT") {
                const src = node.src || "";
                const type = node.type;

                const matches = src.search(reg);



                addedNodes.forEach((node) => {
                    var dc = getCookie("allowCookie");

                    var thirdC = getCookie("_vis_opt");
                    if (dc == "no" || (thirdC == "0" && dc == "no") || dc == "") {
                        if (
                            !src.includes(window.location.hostname) &&
                            node.hasAttribute("src") &&
                            !src.includes("code.jquery.com") && !src.match(/([maps.googleapis.com])\w+/g)
                        ) {
                            if (
                                matches != -1
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }

                            if (
                                
                                node.innerText.match(reg)
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }
                        }
                    } else if (dc == "not-set") {
                        if (
                            matches != -1
                        ) {
                            node.type = "text/plain";
                            node.parentElement.removeChild(node);
                        }

                        if (
                            node.match(reg)
                        ) {
                            node.type = "text/plain";
                            node.parentElement.removeChild(node);
                        }
                    } else if(dc == "necessery") {
                        if (
                            !src.includes(window.location.hostname) &&
                            node.hasAttribute("src") &&
                            !src.includes("code.jquery.com") && !src.match(/([maps.googleapis.com])\w+/g)
                        ) {
                            if (
                                matches != -1
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }
                        }
                    } else if (dc == "yes" && thirdC == "0") {
                        if (
                            !src.includes(window.location.hostname) &&
                            node.hasAttribute("src") &&
                            !src.includes("code.jquery.com")
                        ) {
                            if (
                                matches != -1
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }

                            if (
                                node.innerText.match(reg)
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }
                        }
                    } else if (dc == "no" || thirdC == "0" || dc == "") {
                        if (
                            !src.includes(window.location.hostname) &&
                            node.hasAttribute("src") &&
                            !src.includes("code.jquery.com")
                        ) {
                            if (
                                matches != -1
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }

                            if (
                                node.match(reg)
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }
                        }
/* 
                        document.__defineGetter__("cookie", function () {
                            return "";
                        });
                        document.__defineSetter__("cookie", function () { });

                        if (!document.__defineGetter__) {
                            Object.defineProperty(document, "cookie", {
                                get: function () {
                                    return "";
                                },
                                set: function () {
                                    return true;
                                },
                            });
                        } else {
                            document.__defineGetter__("cookie", function () {
                                return "";
                            });
                            document.__defineSetter__("cookie", function () { });
                        } */
                        document.body.style.overflow = "auto";
                    }

                    const beforeScriptExecuteListener = function (event) {
                        if (
                            dc == "no" ||
                            (dc == "" &&
                                !src.includes(window.location.hostname) &&
                                node.hasAttribute("src") &&
                                !src.includes("code.jquery.com"))
                        ) {
                            if (
                                node.innerText.match(reg)
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }

                            if (
                                node.innerText.match(reg)
                            ) {
                                node.type = "text/plain";
                                node.parentElement.removeChild(node);
                            }
                        } else if(dc == "necessery") {
                            if (
                                !src.includes(window.location.hostname) &&
                                node.hasAttribute("src") &&
                                !src.includes("code.jquery.com")
                            ) {
                                if (
                                    matches != -1
                                ) {
                                    node.type = "text/plain";
                                    node.parentElement.removeChild(node);
                                }else if(src.match(/([maps.googleapis.com])\w+/g)){
                                    node.type = "text/javascript";
                                }
                            }
                        }

                        if (node.getAttribute("type") === "text/plain")
                            event.preventDefault();
                        node.removeEventListener(
                            "beforescriptexecute",
                            beforeScriptExecuteListener
                        );
                    };
                    node.addEventListener(
                        "beforescriptexecute",
                        beforeScriptExecuteListener
                    );
                });
            } else if (node.nodeType === 1 && node.tagName === "NOSCRIPT") {
                var dc = getCookie("allowCookie");
                var thirdC = getCookie("_vis_opt");

                if (dc == "no" || (thirdC == "0" && dc == "no") || dc == "") {
                    if (
                        node.innerText.match(reg)
                    ) {
                        node.type = "text/plain";
                        node.parentElement.removeChild(node);
                    }
                } else if (dc == "not-set") {
                    if (
                        node.innerText.match(reg)
                    ) {
                        node.type = "text/plain";
                        node.parentElement.removeChild(node);
                    }
                } else if (dc == "yes" && thirdC == "0") {
                    if (
                        node.innerText.match(reg)
                    ) {
                        node.type = "text/plain";
                        node.parentElement.removeChild(node);
                    }
                } else if (dc == "no" || thirdC == "0" || dc == "") {
                    if (
                        node.innerText.match(reg)
                    ) {
                        node.type = "text/plain";
                        node.parentElement.removeChild(node);
                    }

                    document.__defineGetter__("cookie", function () {
                        return "";
                    });
                    document.__defineSetter__("cookie", function () { });

                    if (!document.__defineGetter__) {
                        Object.defineProperty(document, "cookie", {
                            get: function () {
                                return "";
                            },
                            set: function () {
                                return true;
                            },
                        });
                    } else {
                        document.__defineGetter__("cookie", function () {
                            return "";
                        });
                        document.__defineSetter__("cookie", function () { });
                    }
                    document.body.style.overflow = "auto";
                }

                const beforeScriptExecuteListener = function (event) {
                    if (dc == "no" || dc == "") {
                        if (
                            node.innerText.match(reg)
                        ) {
                            node.type = "text/plain";
                            node.parentElement.removeChild(node);
                        }
                    }

                    if (node.getAttribute("type") === "text/plain")
                        event.preventDefault();
                    node.removeEventListener(
                        "beforescriptexecute",
                        beforeScriptExecuteListener
                    );
                };
                node.addEventListener(
                    "beforescriptexecute",
                    beforeScriptExecuteListener
                );
            }
        });
    });
});
observer.observe(document.documentElement, {
    childList: !0,
    subtree: !0,
});

window.addEventListener("load", function () {
    function cookieEnabled() {
        var cookieEnabled = navigator.cookieEnabled;
        if (!cookieEnabled) {
            document.cookie = "test";
            cookieEnabled = document.cookie.indexOf("test") !== -1;
        }
        return cookieEnabled;
    }

    function slideUp(el) {
        var elem = document.getElementById(el);
        elem.style.transition = "all 2s ease-in-out";
        elem.style.bottom = "-1500px";
    }

    function slideDown(el) {
        var elem = document.getElementById(el);
        elem.style.transition = "all 2s ease-in-out";
        elem.style.bottom = "0";
    }
    var domain = (function () {
        "use strict";
        var i = 0,
            domain = document.domain || window.location.host,
            p = domain.split("."),
            s = "_inta" + new Date().getTime();
        while (i < p.length - 1 && document.cookie.indexOf(s + "=" + s) === -1) {
            domain = p.slice(-1 - ++i).join(".");
            document.cookie = s + "=" + s + ";domain=" + domain + "; path=/;";
        }
        document.cookie =
            s +
            "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;domain=" +
            domain +
            "; path=/;";
        return domain;
    })();

    var cookiesOn = getCookie("allowCookie");
    var cookieSet = getCookie("_inta");

    if (cookiesOn == "yes" || cookiesOn == "no") {
        var banner = document.getElementById("cb");
        document.body.removeChild(banner);
    }

    if(document.getElementById("accept-cookie") != null || document.getElementById("accept-cookie") != undefined){
        document.getElementById("accept-cookie").addEventListener("click", function () {
            var cV = 0;

            document.cookie =
                "_inta=1; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.cookie =
                "allowCookie=yes; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.cookie =
                "_vis_opt=" +
                cV +
                "; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.body.style.overflow = "auto";
            slideUp("cb");
            //window.location.reload();
        });
    }
    /* document.querySelector(".block-cookie").addEventListener("click", function () {
    var cV = 0;
    document.cookie = '_inta=1; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.cookie = 'allowCookie=no; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.cookie = '_vis_opt=' + cV + '; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.body.style.overflow = "auto";
    slideUp("cb");
    }); */

    var thirdC = getCookie("_vis_opt");

    if (cookiesOn == "no" || thirdC == "0") {
        if (!document.__defineGetter__) {
            Object.defineProperty(document, "cookie", {
                get: function () {
                    return "";
                },
                set: function () {
                    return !0;
                },
            });
        } else {
            document.__defineGetter__("cookie", function () {
                return "";
            });
            document.__defineSetter__("cookie", function () { });
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            }
            document.body.style.overflow = "auto";
        }
    } else if (cookiesOn == "yes") {
        document.cookie = "allowCookie=yes; expires=" +
            new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() +
            "; path=/; domain=." +
            domain +
            "";
        document.body.style.overflow = "auto";
    } else if (cookiesOn == "no-set") {
    }

    if(document.getElementById("accept-cookie") != null || document.getElementById("accept-cookie") != undefined){
        document.getElementById("accept-cookie").addEventListener("click", function () {
            var cV = 1;
            document.cookie =
                "_inta=1; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.cookie =
                "allowCookie=yes; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.cookie =
                "_vis_opt=" +
                cV +
                "; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.body.style.overflow = "auto";
            var addedNodes = document.getElementsByTagName("script");
            for (var i = 0; i < addedNodes.length; i++) {
                addedNodes.type = "";
            }
            slideUp("cb");
            window.location.reload();
        });
    }

    if(document.getElementById("accept-cookie") != null || document.getElementById("accept-cookie") != undefined){
        document.getElementById("necessery").addEventListener("click", function () {
            var cV = 1;
            document.cookie =
                "_inta=1; expires=" +
                new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
                document.cookie =
                "allowCookie=necessery; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.cookie =
                "_vis_opt=" +
                cV +
                "; expires=" +
                new Date(
                    new Date().getTime() + 60 * 60 * 1000 * 24 * 100
                ).toGMTString() +
                "; path=/; domain=." +
                domain +
                "";
            document.body.style.overflow = "auto";
            slideUp("cb");
        });
    }
    /* document.querySelector(".save").addEventListener("click", function(){
    var analytics = document.getElementById("analytics");
    if(!analytics.checked){
    document.cookie = '_inta=1; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.body.style.overflow = "auto";
    slideUp("cb")
    }else{
    var cV = 1;
    document.cookie = '_inta=1; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.cookie = 'allowCookie=yes; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    document.cookie = '_vis_opt=' + cV + '; expires=' + new Date(new Date().getTime() + 60 * 60 * 1000 * 24 * 100).toGMTString() + '; path=/; domain=.' + domain + '';
    }
    }); */
});
