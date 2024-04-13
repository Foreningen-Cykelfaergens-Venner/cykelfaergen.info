/* function greport(url, label, host) {
  if ('undefined' !== typeof gtag) {
    gtag('event', 'click', {
      'send_to': 'UA-179038498-3',
      'event_label': label,
      'event_category': 'Bookings',
      'transport_type': 'beacon',
      'event_callback': function() {
        if (typeof(url) != 'undefined') {
          //window.location.href = "https://"+host+"/redirect?link="+url;
        }
      }
    });
  } else {
    //window.location.href = "https://"+host+"/redirect?link="+url;
  }
  return false;
} */

function conversionTracking(type, label) {
  if ('undefined' !== typeof fbq && 'undefined' !== typeof twq && 'undefined' !== typeof gtag) {
    fbq('trackCustom', type, { product: label});
    /* fbq('track', "Purchase", { value: label.price, currency: "DKK" }); */
    twq('track', type, {
      product: label
    });
    gtag('event', 'conversion', {
      'send_to': 'UA-179038498-3',
      'event_label': label,
      'event_type': type,
      'event_category': 'Bookings',
      'transport_type': 'beacon',
      'event_callback': function() {
        if (typeof(url) != 'undefined') {
          alert("Reported")
        }
      }
    });
  }
  return false;
}