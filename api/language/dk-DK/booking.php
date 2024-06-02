<section class="booking_bg">
    <section class="booking__top">
        <h1 class="booking__title"><span class="booking__title--bg">OPLEV <span class="last-word">FLENSBORG FJORD</span></span> <span class="booking__title--bg">PÅ EN <span class="last-word">NYE MÅDE</span></span></h1>
        <section class="booking__weather">Loading weather...</section>
    </section>
    <article class="booking">
        <section class="booking__nav">
            <a onClick="openCity(event, 'oneway')" class="booking__navitem booking__navitem--selected" id="one-way"><span class="material-icons">
arrow_right_alt
</span> Enkelt</a>
            <a onClick="openCity(event, 'route')" class="booking__navitem" id="tur-retur"><span class="material-icons">swap_horiz</span>Tur-retur</a>
            <a onClick="openCity(event, 'eventsejl')" class="booking__navitem" id="event"><span class="material-icons">
event_available
</span> Event</a>
        </section>
        <section class="booking__form">
            <form id="bookingform" type="multipart/form-data">
                <article class="bookings bookings--active" id="oneway">
                    <label class="booking__label booking__label--rightcircle" for="from">
                        <span class="booking__labelsize">Fra:</span>
                        <select class="booking__input" name="from" id="from">
                            <option value="" selected disabled>Vælg havn</option>
                            <option value="Egernsund">Egernsund</option>
                            <option value="Rendbjerg(Marina Minde)">Rendbjerg(Marina Minde)</option>
                            <option value="Brunsnæs">Brunsnæs</option>
                            <option value="Langballig">Langballig</option>
                            <option value="Flensborg">Flensborg</option>
                        </select>
                    </label>
                    <span class="material-icons change">swap_horiz</span>
                    <label class="booking__label booking__label--indent booking__label--leftcircle" for="to">
                        <span class="booking__labelsize">Til:</span>
                        <select class="booking__input" name="to" id="to">
                            <option value="" selected disabled>Vælg havn</option>
                            <option value="Egernsund">Egernsund</option>
                            <option value="Rendbjerg(Marina Minde)">Rendbjerg(Marina Minde)</option>
                            <option value="Brunsnæs">Brunsnæs</option>
                            <option value="Langballig">Langballig</option>
                            <option value="Flensborg">Flensborg</option>
                        </select>
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Dato:</span>
                        <input placeholder="Valg dato" name="date" class="booking__input" type="date">
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Antal personer:</span>
                        <input placeholder="0" class="booking__input" name="number" pattern="[0-9]+" type="tel">
                    </label>
                </article>
                <article class="bookings" id="route">
                    <label class="booking__label booking__label--rightcircle" for="from">
                        <span class="booking__labelsize">Fra:</span>
                        <select class="booking__input" name="from" id="from2">
                            <option value="" selected disabled>Vælg havn</option>
                            <option value="Egernsund">Egernsund</option>
                            <option value="Rendbjerg(Marina Minde)">Rendbjerg(Marina Minde)</option>
                            <option value="Brunsnæs">Brunsnæs</option>
                            <option value="Langballig">Langballig</option>
                            <option value="Flensborg">Flensborg</option>
                        </select>
                    </label>
                    <span class="material-icons change">swap_horiz</span>
                    <label class="booking__label booking__label--indent booking__label--leftcircle" for="to">
                        <span class="booking__labelsize">Til:</span>
                        <select class="booking__input" name="to" id="to2">
                            <option value="" selected disabled>Vælg havn</option>
                            <option value="Egernsund">Egernsund</option>
                            <option value="Rendbjerg(Marina Minde)">Rendbjerg(Marina Minde)</option>
                            <option value="Brunsnæs">Brunsnæs</option>
                            <option value="Langballig">Langballig</option>
                            <option value="Flensborg">Flensborg</option>
                        </select>
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Dato:</span>
                        <input placeholder="Valg dato" name="date" class="booking__input" type="date">
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Antal personer:</span>
                        <input placeholder="0" class="booking__input" name="number" pattern="[0-9]+" type="tel">
                    </label>
                </article>
                <article class="bookings" id="eventsejl">
                    <label class="booking__label" for="from">
                        <span class="booking__labelsize">Fra:</span>
                        <select class="booking__input" name="from" id="from">
                            <option value="" selected disabled>Vælg havn</option>
                            <option value="Egernsund">Egernsund</option>
                            <option value="Rendbjerg(Marina Minde)">Rendbjerg(Marina Minde)</option>
                            <option value="Brunsnæs">Brunsnæs</option>
                            <option value="Langballig">Langballig</option>
                            <option value="Flensborg">Flensborg</option>
                        </select>
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Dato:</span>
                        <input placeholder="Valg dato" class="booking__input" name="date" type="date">
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Tid:</span>
                        <input placeholder="Valg tid" class="booking__input" name="time" type="time">
                    </label>
                    <label class="booking__label" for="">
                        <span class="booking__labelsize">Antal personer:</span>
                        <input placeholder="0" class="booking__input" name="number" pattern="[0-9]+" type="tel">
                    </label>
                </article>
                <input type="hidden" name="type" id="hiddentype" value="One Way">
                <div class="clear"></div>
                <button class="booking__submit" type="submit">Søg færge afgang <span class="material-icons">arrow_right_alt</span></button>
            </form>
        </section>
    </article>
</section>
<section class="content">
    <section class="results">

    </section>
</section>
<script>

        var place = "Broager, DK";
        var server1 = "https://dmigw.govcloud.dk/metObs/v1/observation?api-key=f8f841fd-513e-4804-80a5-5430d074ab4f";
        var server2 = "https://api.openweathermap.org/data/2.5/weather?q="+place+"&appid=7f58b0b29e6124649f3c0b055c72a08b&units=metric&lang=da";
        fetch(server2).then(response => response.json()).then(data => {
            console.log(data);
            var data = data;

            if(data.cod == 200){
                var main = data.main;
                var temp = Math.round(main.temp);

                if(temp < 10 && temp > 0){
                    temp = "" + temp;
                }

                var condition = data.weather[0].description;
                var icon;
                var sunset = new Date(data.sys.sunset * 1000);
                var sunrise = new Date(data.sys.sunrise * 1000);
                var city = data.name;
                var currentTime = new Date().getTime();
                currentTime = new Date(currentTime);

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                
                var weekday = new Array(7);
                weekday[0] = "Søndag";
                weekday[1] = "Mandag";
                weekday[2] = "Tirsdag";
                weekday[3] = "Onsdag";
                weekday[4] = "Torsdag";
                weekday[5] = "Fredag";
                weekday[6] = "Lørdag";

                var n = weekday[today.getDay()];

                var date = n + ' ' + dd + '.' + mm + ' ' + yyyy;

                if(sunset < currentTime && currentTime > sunrise){
                    if(condition == "skydække"){
                        icon = "/assets/icons/weather/fullcloudy.svg";
                    }else{
                        icon = "/assets/icons/weather/night.svg";
                    }
                }else if(sunrise <= currentTime){
                    if(condition == "solskin"){
                        icon = "/assets/icons/weather/sunny.svg";
                    }else if(condition == "spredte skyer" || condition == "få skyer"){
                        icon = "/assets/icons/weather/cloudy.svg";
                    }else if(condition == "regner" || condition == "let regn"){
                        icon = "/assets/icons/weather/rain.svg";
                    }else if(condition == "klar himmel"){
                        icon = "/assets/icons/weather/sunny.svg";
                    }else if(condition == "dis" || condition == "tåge"){
                        icon = "/assets/icons/weather/dist.svg";
                    }else if(condition == "sne" || condition == "let snevejr"){
                        icon = "/assets/icons/weather/snow.svg";
                    }else{
                        icon = "/assets/icons/weather/clouds.svg";
                    }
                }

                var html = "<article class='weather'><img class='weather__icon' src='"+icon+"'><p class='weather__place'><span class='material-icons'>location_on</span>"+ city +"</p><p class='weather__temp'>"+temp+"<span class='degree'></span></p><p class='condition'>"+condition+"</p><p class='date'>"+date+"</p></article>";

                document.querySelector(".booking__weather").innerHTML = html;
            }else{
                document.querySelector(".booking__weather").innerHTML = "<article class='weather'>We couldn't load the weather!</article>";
            }

        });

    setInterval(() => {
        var place = "Broager, DK";
        var server1 = "https://dmigw.govcloud.dk/metObs/v1/observation?api-key=f8f841fd-513e-4804-80a5-5430d074ab4f";
        var server2 = "https://api.openweathermap.org/data/2.5/weather?q="+place+"&appid=7f58b0b29e6124649f3c0b055c72a08b&units=metric&lang=da";
        fetch(server2).then(response => response.json()).then(data => {
            console.log(data);
            var data = data;
            var main = data.main;
            var temp = Math.round(main.temp);

            if(temp < 10 && temp > 0){
                temp = "" + temp;
            }

            var condition = data.weather[0].description;
            var icon;
            var sunset = new Date(data.sys.sunset * 1000);
                var sunrise = new Date(data.sys.sunrise * 1000);
                var city = data.name;
                var currentTime = new Date().getTime();
                currentTime = new Date(currentTime);

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            
            var weekday = new Array(7);
            weekday[0] = "Søndag";
            weekday[1] = "Mandag";
            weekday[2] = "Tirsdag";
            weekday[3] = "Onsdag";
            weekday[4] = "Torsdag";
            weekday[5] = "Fredag";
            weekday[6] = "Lørdag";

            var n = weekday[today.getDay()];

            var date = n + ' ' + dd + '.' + mm + ' ' + yyyy;

            if(sunset < currentTime && currentTime > sunrise){
                if(condition == "skydække"){
                    icon = "/assets/icons/weather/fullcloudy.svg";
                }else{
                    icon = "/assets/icons/weather/night.svg";
                }
            }else if(sunrise <= currentTime){
                if(condition == "solskin"){
                    icon = "/assets/icons/weather/sunny.svg";
                }else if(condition == "spredte skyer" || condition == "få skyer"){
                    icon = "/assets/icons/weather/cloudy.svg";
                }else if(condition == "regner" || condition == "let regn"){
                    icon = "/assets/icons/weather/rain.svg";
                }else if(condition == "klar himmel"){
                    icon = "/assets/icons/weather/sunny.svg";
                }else if(condition == "dis" || condition == "tåge"){
                    icon = "/assets/icons/weather/dist.svg";
                }else if(condition == "sne" || condition == "let snevejr"){
                    icon = "/assets/icons/weather/snow.svg";
                }else{
                    icon = "/assets/icons/weather/clouds.svg";
                }
            }

            var html = "<article class='weather'><img class='weather__icon' src='"+icon+"'><p class='weather__place'><span class='material-icons'>location_on</span>"+ city +"</p><p class='weather__temp'>"+temp+"<span class='degree'></span></p><p class='condition'>"+condition+"</p><p class='date'>"+date+"</p></article>";

            document.querySelector(".booking__weather").innerHTML = html;
        });
    }, 50000);

    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;
        
        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("bookings");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            document.getElementById("bookingform").reset();
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("booking__navitem");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" booking__navitem--selected", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        document.getElementById("hiddentype").value= cityName;

        if(evt.currentTarget != undefined){
            evt.currentTarget.className += " booking__navitem--selected";
        }else{
            document.getElementById(evt).className += " booking__navitem--selected";
        }
    }
    
    var change = document.querySelectorAll(".change");

    if(window.location.hash == "#event"){
        openCity('event', 'eventsejl');
    }

    for(var i=0; i<change.length; i++){
        change[i].addEventListener("click", function(){
            var from = this.previousElementSibling.childNodes[3];
            var to = this.nextElementSibling.childNodes[3];
            
            var temp = this.previousElementSibling.childNodes[3].value;
            from.value = to.value;
            to.value = temp;
        });
    }

    document.getElementById("bookingform").addEventListener("submit", function(e){
        e.preventDefault();
        var results = document.querySelector(".results");
        var form = $("form :input[value!='']").serialize();
        form = form.replace(/&?[^=]+=&|&[^=]+=$/g,'');

        if(form.date !== "" || form.time !== "" || form.number !== ""){
            
            $.ajax({
                method: "POST",
                data: form,
                url: "https://cykelfaergen.info/booking/test.php",
                success: function(e){
                    console.log(e);
                    document.querySelector(".results").innerHTML = e;
                },
                error: function(e){
                    console.log(e);
                }
            })
        }

    });

</script>