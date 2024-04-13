/* var stripe = Stripe('pk_test_51Jly9AEkBCWqt5ziTj4vIcrK4tKaDzqghCej9B1mQl8CiGYxGwj9JH9VQIEjldDNZxfvZNcjGheWrgtXc9N6zPDk00CEHvZYSY', {
    apiVersion: "2020-08-27",
});
var paymentRequest = stripe.paymentRequest({
    country: 'DK',
    currency: 'dkk',
    total: {
        label: 'Passiv medlem',
        amount: 10000,
    },
    requestPayerName: true,
    requestPayerEmail: true,
    requestShipping: true,
});

var elements = stripe.elements();
var prButton = elements.create('paymentRequestButton', {
paymentRequest: paymentRequest,
});

// Check the availability of the Payment Request API first.
paymentRequest.canMakePayment().then(function(result) {
    if (result) {
        prButton.mount('#payment-request-button');
    } else {
        document.getElementById('payment-request-button').style.display = 'none';
    }
});

paymentRequest.on('paymentmethod', function(ev) {
    // Confirm the PaymentIntent without handling potential next actions (yet).
    stripe.confirmCardPayment(
      clientSecret,
      {payment_method: ev.paymentMethod.id},
      {handleActions: false}
    ).then(function(confirmResult) {
      if (confirmResult.error) {
        // Report to the browser that the payment failed, prompting it to
        // re-show the payment interface, or show an error message and close
        // the payment interface.
        ev.complete('fail');
      } else {
        // Report to the browser that the confirmation was successful, prompting
        // it to close the browser payment method collection interface.
        ev.complete('success');
        // Check if the PaymentIntent requires any actions and if so let Stripe.js
        // handle the flow. If using an API version older than "2019-02-11"
        // instead check for: `paymentIntent.status === "requires_source_action"`.
        if (confirmResult.paymentIntent.status === "requires_action") {
          // Let Stripe.js handle the rest of the payment flow.
          stripe.confirmCardPayment(clientSecret).then(function(result) {
            if (result.error) {
              // The payment failed -- ask your customer for a new payment method.
            } else {
              // The payment has succeeded.
                $.ajax({
                    url: url,
                    type: 'post',
                    data:$('#payment_process').serialize(),
                    success:function(e){
                        document.querySelector(".subs_btn").innerText = "Tak for din understøttelse";                             
                    },
                    error:function(e){
                        document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-lock"></i> Betal';
                        console.log(e);
                    }
                });
            }
          });
        } else {
          // The payment has succeeded.
            $.ajax({
                url: url,
                type: 'post',
                data:$('#payment_process').serialize(),
                success:function(e){
                    document.querySelector(".subs_btn").innerText = "Tak for din understøttelse";                            
                },
                error:function(e){
                    document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-lock"></i> Betal';
                    console.log(e);
                }
            });
        }
      }
    });
  }); */

$('#email').on('keypress change', function () {
    
    break;
    $(this).val(function (index, val) {
        checkMember(val);
        return this.value = val;
    });
});

$('#ccnum').on('keypress change', function () {
    $(this).val(function (index, value) {
        let cards = document.querySelectorAll(".cards");

        for (let i = 0; i < cards.length; i++) {
            if (cards[i].getAttribute("data-card-type") == creditCardType(value)) {
                cards[i].style.filter = "saturate(1)";
                cards[i].style.display = "inline-flex";
            } else {
                cards[i].style.filter = "saturate(0)";
                cards[i].style.display = "none";
            }
        }
        if (this.value.length >= 18) {
            document.querySelector("#expmonth").focus();
        }
        return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
    });
});

$('#expmonth').on('keypress change', function () {
    $(this).val(function (index, value) {
        if (this.value.length >= 1) {
            document.querySelector("#expyear").focus();
        }
        return value.replace(/\W/gi, '').replace(/(.{2})/g, '$1');
    });
});

$('#expyear').on('keypress change', function () {
    $(this).val(function (index, value) {
        if (this.value.length >= 1) {
            document.querySelector("#cvv").focus();
        }
        return value.replace(/\W/gi, '').replace(/(.{2})/g, '$1');
    });
});

$('#cvv').on('keypress change', function () {
    if ($('#expmonth').val() !== ""
        && $('#expyear').val() !== ""
        && $('#name').val() !== ""
        && $('#ccnum').val() !== ""
        && $('#email').val() !== ""
        && $('#cvv').val() !== ""
        && document.querySelector("#privacy").checked) {
        document.querySelector(".subs_btn").disabled = false;
    }
})

const process = document.getElementById("payment_process");
const yourContainer = document.querySelector(".threeDCheck");
const cardChooser = document.querySelectorAll(".choose__cards");

for (let i = 0; i < cardChooser.length; i++) {
    cardChooser[i].addEventListener("change", function () {
        if (this.value == "new") {
            document.querySelector(".newCards").style.display = "block";
        } else {
            document.querySelector(".newCards").style.display = "none";
        }
    });
}

function checkMember(i) {
    const xhttp = new XMLHttpRequest();
    const url = "https://www.cykelfaergen.info/om-os/forening/cykelfaergens-venner/find__medlemmer.php";
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let message = JSON.parse(xhttp.responseText);
            if (message.exists) {
                document.querySelector(".newCards").style.display = "none";
                let stripeCustomerId = message.stripeCustomerId;
                let stripeSubsId = message.subscriptionID;
                let username = message.name;
                let cardId = message.cardId;

                let existsInput = document.createElement("input");
                existsInput.type = "hidden";
                existsInput.name = "exists";
                existsInput.value = message.exists;
                $('#payment_process').append(existsInput);

                if (stripeCustomerId !== "" || cardId !== "") {
                    let stripeCustomerIdForm = document.createElement("input");
                    stripeCustomerIdForm.type = "hidden";
                    stripeCustomerIdForm.value = stripeCustomerId;
                    stripeCustomerIdForm.name = "stripeCustomer";
                    stripeCustomerIdForm.id = "stripeCustomer";

                    let stripeSubsIdForm = document.createElement("input");
                    stripeSubsIdForm.type = "hidden";
                    stripeSubsIdForm.value = stripeSubsId;
                    stripeSubsIdForm.name = "stripeSubsId";
                    stripeSubsIdForm.id = "stripeSubsId";

                    let cardIdForm = document.createElement("input");
                    cardIdForm.type = "hidden";
                    cardIdForm.value = cardId;
                    cardIdForm.name = "cardId";
                    cardIdForm.id = "cardId";

                    $('#payment_process').append(stripeCustomerIdForm);
                    $('#payment_process').append(stripeSubsIdForm);
                    $('#payment_process').append(cardIdForm);

                } else {
                    document.querySelector(".newCards").style.display = "block";
                    document.querySelector(".subs_btn").disabled = false;
                }
            } else {
                document.querySelector(".newCards").style.display = "block";
            }
        } else {
            document.querySelector(".payment__warning").innerHTML = this.textResponse;
        }
    }

    xhttp.send("email=" + i);
}

/* document.querySelector("#password").addEventListener("keypress", function(){
    let myInput = this;
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");


    var lowerCaseLetters = /[a-z]/g;

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    // Validate numbers
    var numbers = /[0-9]/g;

    if(myInput.value.match(lowerCaseLetters) && myInput.value.length >= 8 && myInput.value.match(numbers) && myInput.value.match(upperCaseLetters) && myInput.value.match(lowerCaseLetters)){
        document.querySelector(".valid").style.backgroundColor = "green";
    }else{
        document.querySelector(".valid").style.backgroundColor = "";
    }
}) */

function submit() {
    document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-spinner fa-spin-pulse"></i> processing...';
    var url = "stoet-os/charge";

    let creditCardData = document.querySelector("#ccnum").value;
    let expireMonth = document.querySelector("#expmonth").value;
    let expireYear = document.querySelector("#expyear").value;
    let cvv = document.querySelector("#cvv").value;
    let password = document.querySelector("#password").value;
    if (creditCardData != "" || password != "" || expireMonth != "" || expireYear != "" || cvv != "" || document.querySelector("#cardId") != null && document.querySelector("#cardId") != "") {
        $.ajax({
            url: url,
            type: 'post',
            data: $('#payment_process').serialize(),
            success: function (e) {
                if (IsJsonString(e)) {
                    let data = JSON.parse(e);
                    document.querySelector(".subs_btn").innerText = "We are about to processing your data...";
                    if (data.type == "3DSecure") {
                        document.querySelector(".subs_btn").innerText = "We are about to redirect you...";
                        let url = data.url;
                        window.location.href = url;
                    }

                    if (e.indexOf("Subscribed") != -1 || e.indexOf("Renewed") != -1) {
                        document.querySelector("#payment_process").reset();
                        window.location.href = "tak";
                    } else if (data.type != "3DSecure") {
                        window.location.href = "tak";
                        document.querySelector(".payment__warning").style.display = "flex";
                        document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-lock"></i>  Betal';
                    }

                } else {
                    document.querySelector(".payment__warning").style.display = "flex";
                    document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-lock"></i>  Betal';

                    if (e.indexOf("Subscribed") != -1 || e.indexOf("Renewed") != -1) {
                        document.querySelector("#payment_process").reset();
                        document.querySelector(".subs_btn").disabled = false;
                        window.location.href = "tak";
                    } else {
                        document.querySelector(".payment__warning").innerHTML = e;
                    }
                }
            },
            error: function (e) {
                document.querySelector(".subs_btn").innerHTML = '<i class="fa fa-lock"></i> Betal';
                console.log(e);
            }
        });
    } else {
        document.querySelector(".payment__warning").innerHTML = "Please fill out all information!";
        document.querySelector(".payment__warning").style.display = "flex";
        document.querySelector(".subs_btn").innerText = "Subscribe";
    }
}

if (process !== null) {
    process.addEventListener("submit", function (e) {
        e.preventDefault();
        gtag('event', 'conversion', {
            'send_to': 'UA-179038498-3',
            'event_label': 'Subscription to Foreningen Cykelfærgen´s Venner',
            'event_category': 'Subscription',
            'event_callback': function () {
                submit();
            }
        });
    });
}

$('#email, #name, #expmonth, #expyear, #ccnum, #cvv, #privacy').on('keypress change', function () {
    if ($('#email').val() != "" || $('#name').val() != "" && $('#expmonth').val() !== ""
        && $('#expyear').val() !== ""
        && $('#name').val() !== ""
        && $('#ccnum').val() !== ""
        && $('#email').val() !== ""
        && $('#cvv').val() !== "") {
        if (document.querySelector("#privacy").checked) {
            document.querySelector(".subs_btn").disabled = false;
        } else {
            document.querySelector(".subs_btn").disabled = true;
        }
    } else {
        document.querySelector(".subs_btn").disabled = true;
    }
})

/* function on3DSComplete() {
    // Hide the 3DS UI
    yourContainer.remove();

    // Check the PaymentIntent
    stripe.retrievePaymentIntent('{{PAYMENT_INTENT_CLIENT_SECRET}}')
    .then(function(result) {
        if (result.error) {
        // PaymentIntent client secret was invalid
        } else {
            if (result.paymentIntent.status === 'succeeded') {
                // Show your customer that the payment has succeeded
                document.querySelector(".payment__warning").innerHTML = "Payment Succeed";
                document.querySelector(".payment__warning").style.display = "flex";
                    document.querySelector(".overlay").style.display = "flex";
            } else if (result.paymentIntent.status === 'requires_payment_method') {
                // Authentication failed, prompt the customer to enter another payment method
            }
        }
    });
} */

/* window.addEventListener('message', function(ev) {
    if (ev.data === '3DS-authentication-complete') {
    on3DSComplete();
    }
}, false); */



function creditCardType(cc = "") {
    // visa
    var re = new RegExp("^4");
    if (cc.match(re) != null)
        return "Visa";

    // Mastercard 
    // Updated for Mastercard 2017 BINs expansion
    if (/^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/.test(cc))
        return "Mastercard";

    // AMEX
    re = new RegExp("^3[47]");
    if (cc.match(re) != null)
        return "AMEX";

    // Discover
    re = new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)");
    if (cc.match(re) != null)
        return "Discover";

    // Diners
    re = new RegExp("^36");
    if (cc.match(re) != null)
        return "Diners";

    // Diners - Carte Blanche
    re = new RegExp("^30[0-5]");
    if (cc.match(re) != null)
        return "Diners - Carte Blanche";

    // JCB
    re = new RegExp("^35(2[89]|[3-8][0-9])");
    if (cc.match(re) != null)
        return "JCB";

    // Visa Electron
    re = new RegExp("^(4026|417500|4508|4844|491(3|7))");
    if (cc.match(re) != null)
        return "Visa";

    return "";
}

function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}