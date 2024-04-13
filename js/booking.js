const bookingForm = document.querySelector(".intastellarBooking");
const startHarbor = document.querySelector("#startHarbor");
const date = document.querySelector("#selectDate");

bookingForm.addEventListener("submit", function(e){
    e.preventDefault();
    const Harbor = startHarbor.value;
    const selectedDate = date.value;

    console.log(selectedDate)

    fetch(
        "https://apis.intastellarsolutions.com/booking/index.php",
        {
            method: "POST",
            body: JSON.stringify({
                harbor: Harbor,
                date: selectedDate
            })
        }
    ).then(
        (data) => {return data.json()}
        ).then(
            (data) => {
                console.log(data);
            }
        ).finally()
})