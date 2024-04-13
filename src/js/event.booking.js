function submit(){
    $.ajax({
        url: "/components/bookingSystem/book.php",
        type: 'post',
        data:$('#bookingForm').serialize(),
        success:function(e){
            if(e == "Booking succeed"){
                alert("Tak for din bestilling! Vi har sendt dig en kvitering.");
                if (localStorage.getItem("intStatics") != "false") {
                    gtag('event', 'conversion', {
                        'send_to': 'UA-179038498-3',
                        'event_label': "Event Sejlads",
                        'event_category': 'Bookings'
                    });
                }
                conversionTracking("Complete registration","Event Sejlads");
                $('#bookingForm').reset();
            }else{
                alert(e);
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

document.getElementById("bookingForm").addEventListener("submit", function(e){
    e.preventDefault();
    submit();
}); 