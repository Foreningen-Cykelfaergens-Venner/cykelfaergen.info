window.addEventListener("DOMContentLoaded", function(){
    var client = new XMLHttpRequest();
    client.open("GET", "/getnews.php", true);
    client.onreadystatechange = function(){
        if(client.readyState === 4 && client.status === 200) {
            document.getElementsByClassName("up")[0].innerHTML = client.responseText;
        }
    }
    client.send();
});
