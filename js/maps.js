var userAgent = navigator.userAgent || navigator.vendor || window.opera;
//Havnepladsen i Egernsund kommer sener
var correction = "Havnevej 1";
var locations = [
    ['Egernsund Stop', correction + ', 6320 Egernsund, Denmark', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true],
    ['Marina Minde/Rendbjerg Stop', 'Marinavej 1, 6320 Egernsund, Denmark', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true],
    ['Brunsnæs Stop v/ Brunsnæs Strand', 'Fjordvejen, 6310 Broager, Denmark', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true],
    ['Langballig Stop', 'Strandweg, 24977 Langballig, Germany', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true],
    ['Flensburg Stop', 'Norderhofenden 14-15, 24937 Flensburg, Germany', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true],
    ['Sønderhav Stop v/ Annies Kiosk', 'Fjordvejen 67, 6340 Kruså, Denmark', '', '', 'https://maps.google.com/mapfiles/ms/icons/purple-dot.png', true]
];

var add = document.getElementById("address");

for (var i = 0; i < locations.length; i++) {
    var title = locations[i][0];
    var address = locations[i][1];
    var icon = locations[i][4];
    var active = locations[i][5];

    if (locations[i][2] !== "" && locations[i][3] !== "") {
        var tel = "Tel: " + locations[i][2];
        var email = "E-Mail: " + locations[i][3];
    } else {
        var email = "";
        var tel = "";
    }
    
    var a = address.split(",");

    if (a[1] == undefined && a[2] == undefined) {
        a = a[0];
    } else {
        a = a[0] + "<br>" + a[1] + "<br>" + a[2];
    }

    if (/iPad|iPhone|iPod|Mac/.test(userAgent) && !window.MSStream) {
        var dev = "maps://?dirflg=d&t=m&daddr=" + address;
    } else if (/android/i.test(userAgent)) {
        var dev = "google.navigation:" + address;
    }

    if(add !== null || undefined){
        if(icon !== ""){
            if(active){
                active = "Approach";
            }else{
                active = "No approach";
            }
        }else{
            active = "";
        }
        add.innerHTML += "<h2>" + title + "</h2><br><address>" + a + "</address><br>" + tel + "<br>" + email + "<br>"+active+"<br><a href='" + dev + "&travelmode=driving&dir_action=navigate' target='_blank'>Get direction</a>";
    }
}

let geocoder,
    map,
    bounds,
    z,
    markers = [],
    coords = [];

if (window.innerWidth >= 320 && window.innerWidth <= 900) {
    z = 10;
} else {
    z = 11;
}

function initMap() {
    map = map = new google.maps.Map(document.getElementById("map"), {
        zoom: z,
        zoomControl: true,
        center: { lat: 54.896479, lng: 9.623935 }
    });
    geocoder = new google.maps.Geocoder();

    for (i = 0; i < locations.length; i++) {
        geocodeAddress(locations, i);
    }
}


google.maps.event.addDomListener(window, "load", initialize);
function geocodeAddress(locations, i) {
    var title = locations[i][0];
    var address = locations[i][1];
    var tel = locations[i][2];
    var email = locations[i][3];
    var icons = locations[i][4];
    var active = locations[i][5];

    geocoder.geocode({
        'address': address
    },

        function (results, status) {
            bounds = new google.maps.LatLngBounds();
            if (status == google.maps.GeocoderStatus.OK) {

                var marker = new google.maps.Marker({
                    map: map,
                    icon: icons,
                    position: results[0].geometry.location,
                    title: title,
                    animation: google.maps.Animation.DROP,
                    address: address,
                    tel: tel,
                    email: email,
                    active: active
                });
                
                coords.push(results[0].geometry.location);
                markers.push(marker);
                infoWindow(marker, map, title, address, active, icons);
                bounds.extend(marker.getPosition());

                const flightPath = new google.maps.Polyline({
                    path: coords,
                    geodesic: true,
                    strokeColor: "#046c6d",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });
                flightPath.setMap(map);

            } else {
                alert("geocode of " + address + " failed:" + status);
            }
        });
}

function isInfoWindowOpen(infoWindow) {
    var map = infoWindow.getMarker();
    return (map !== null && typeof map !== "undefined");
}

function infoWindow(marker, map, title, address, active, icon) {

    google.maps.event.addListener(marker, 'click', function () {
        var a = address.split(",");
        a = a[0] + "<br>" + a[1] + "<br>" + a[2];
        if (/iPad|iPhone|iPod|Mac/.test(userAgent) && !window.MSStream) {
            var dev = "maps://?dirflg=d&t=m&daddr=" + address;
        } else if (/android/i.test(userAgent)) {
            var dev = "google.navigation:" + address;
        }

        if(icon !== ""){
            if(active){
                active = "Approach";
            }else{
                active = "No approach";
            }
        }else{
            active = "";
        }

        var html = "<div style='margin-bottom: 30px;'><div class='titleheader'><h3>" + title + "</h3></div><address>" + a + "</address></div>"+active+"<div><a href='" + dev + "' target='_blank'>Get direction</a></div>";
        iw = new google.maps.InfoWindow({
            content: html,
            maxWidth: 650
        });

        iw.open(map, marker);
    });
}

function createMarker(location) {
    bounds = new google.maps.LatLngBounds();
    var marker = new google.maps.Marker({
        map: map,
        position: location,
        title: title,
        animation: google.maps.Animation.DROP,
        address: address,
        email: email,
        tel: tel,
        active: active
    })

    bounds.extend(marker.getPosition());
    infoWindow(marker, map, title, address, active, "");
    return marker;
}