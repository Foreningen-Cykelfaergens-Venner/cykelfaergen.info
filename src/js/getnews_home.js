window.addEventListener("DOMContentLoaded", function(){
    var client = new XMLHttpRequest();
    client.open("GET", "/getnews_home.php", true);
    client.onreadystatechange = function(){
        if(client.readyState === 4 && client.status === 200) {
            document.getElementsByClassName("l_news-c")[0].innerHTML = client.responseText;
        }
    }
    client.send();
});

