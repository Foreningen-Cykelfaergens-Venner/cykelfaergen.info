const apiKey = "7f58b0b29e6124649f3c0b055c72a08b";
const url = "https://api.openweathermap.org/data/2.5/forecast";
const dailyurl = "https://api.openweathermap.org/data/2.5/forecast/daily";
const container = document.querySelector(".weather");
const lat = "54.898683816905105";
const lon = "9.597868465963916";

/* https://pro.openweathermap.org/data/2.5/forecast/hourly?lat={lat}&lon={lon}&appid={API key} */

let lang = "da";
dateFormatLang = 'da-DK';

if (window.location.host.indexOf("bicycleferry.com") > - 1 || getCookie("region") == "en-GB"){
    lang = "en";
    dateFormatLang = (getCookie("region")) ? getCookie("region") : "en-GB";
} else if (window.location.host.indexOf("fahrradfaehre.info") > -1 || getCookie("region") == "de-DE") {
    lang = "de";
    dateFormatLang = (getCookie("region")) ? getCookie("region") : "de-DE";
}

fetch(`${url}?lat=${lat}&lon=${lon}&units=metric&lang=${lang}&appid=${apiKey}`).then((r) => {
    return r.json();
}).then((response) => {
    const weatherData = response.list[0];
    let options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
    };
    
    container.innerHTML = `
        <p>
            <img width="50px" height="30px" src="https://openweathermap.org/img/w/${weatherData.weather[0].icon}.png">
            <span class="temp">${ Math.round(weatherData.main.temp) } &#8451;</span> <br>
            ${  response.city.name }
        </p>
    `;
    if(document.querySelector(".weather-forcast") != null){
        response.list.forEach((element, i) => {
            document.querySelector(".weather-forcast").innerHTML += `
                <div class="forcast">
                    <p>${new Intl.DateTimeFormat(dateFormatLang, options).format(new Date(element.dt_txt))}</p>
                    <img width="50px" height="30px" src="https://openweathermap.org/img/w/${element.weather[0].icon}.png">
                    <p>
                        <span class="temp">${Math.round(element.main.temp)}&#8451;</span>
                    </p>
                </div>
            `;
        });
        document.querySelector(".city").innerText = response.city.name;
    }
})

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