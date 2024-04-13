const form =document.querySelector("#contact_form");
const successMessage = document.querySelector(".successMessage");
form.addEventListener("submit", function(e){
    e.preventDefault();
    const form_data = new FormData(form);
    let contact_reson = "general";
    let category = "Kontakt";
    if(document.querySelector("#to") != null || document.querySelector("#to") != undefined){
        const contact_resonValue = document.querySelector("#to").value;
        if(contact_resonValue == "info@cykelfaergen.info"){
            contact_reson = "general";
        } else if (contact_resonValue == "booking@cykelfaergen.info"){
            contact_reson = "booking";
        } else if (contact_resonValue == "webmaster@cykelfaergen.info"){
            contact_reson = "website";
        } else if (contact_resonValue == "forening@cykelfaergen.info"){
            contact_reson = "organization";
        } else if (contact_resonValue == "press.dk" || contact_resonValue == "press.de"){
            contact_reson = "press";
        }
    }else{
        contact_reson = "Del oplevelsen";
        category = "Del oplevelsen"
    }

    fetch(
        this.action,
        {
            method: "POST",
            body: form_data,
        }
    ).then((re) => {
        if(re.status == 401){
            successMessage.innerText = re.statusText;
        }

        if(re.status == 403){
            successMessage.innerText = re.statusText;
        }

        if(re.status == 415){
            successMessage.innerText = re.statusText;
        }

        if(re.status == 900){
            successMessage.innerText = "Please fill out the recaptcha!";
        }

        if(re.status != 200) return re.text();
        if(re.ok && re.status == 200) return re.text();
    }).then((data) => {
        if(data != undefined && data.indexOf("successfully") > -1){
            successMessage.innerText = "Mail afsendt";
            gtag("event", "generate_lead", {
                "value": 100,
                "currency": "DKK",
                "event_category": category,
                "event_label": contact_reson
            });
            if(typeof fbq != undefined){
                fbq("track", "Contact", {
                    "content_category": category,
                    "content_name": contact_reson
                })
            }
            form.reset();
            grecaptcha.reset();
        }
    }).catch((error) => {
        successMessage.innerText = error;
    }).finally(() => {

    })
});