<?php
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "apikey: GCcwN2QG9EJ0n3PRZLnFhXAQvZ0X5Aek"
        ]
    ];
    
    // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
    $context = stream_context_create($opts);
    $url = "https://api.trustpilot.com/v1/business-units/610ed3ed70a16b001e886877/reviews?page=1&perPage=20&stars=3,5&language=" . $_COOKIE["region"];
    $json_data = file_get_contents($url, false, $context);


    // Decodes the JSON data into a PHP array.
    $response_data = json_decode($json_data);

    $reviews = $response_data->reviews;

    if(empty($reviews)){
       /*  if(language == "de"){
            reviewsContainer.innerHTML = '<a class="trustpilot-review" href="https://de.trustpilot.com/evaluate/cykelfaergen.info" target="_blank">Bewerten Sie uns auf <img src="https://cdn.trustpilot.net/brand-assets/1.8.0/logo-black.svg" alt="Trustpilot"></a>';
        }else if(language == "en"){
            reviewsContainer.innerHTML = '<a class="trustpilot-review" href="https://en.trustpilot.com/evaluate/cykelfaergen.info" target="_blank">Review us on <img src="https://cdn.trustpilot.net/brand-assets/1.8.0/logo-black.svg" alt="Trustpilot"></a>';
        } */
        return;
    }

    $json_data2 = file_get_contents($response_data->links[0]->href, false, $context);
    $response_data2 = json_decode($json_data2);
    echo $response_data->links;
    print_r($response_data);

    /* fetch(e.links[0].href + "?locale=" + language, {headers: {
        apikey: API_KEY_2
    }}).then((e) => e.json()).then(e => {
        const starImageUrl = e.links[3].href;
        fetch(e.links[2].href, {headers: {
            apikey: "GCcwN2QG9EJ0n3PRZLnFhXAQvZ0X5Aek"
        }}).then((e) => e.json()).then(e => {
            document.querySelector(".trustpilot-review-state").innerHTML = e.string + " <img class='trustpilot_avg' alt='"+e.string+"'>";
            fetch(starImageUrl, {headers: {
                apikey: "GCcwN2QG9EJ0n3PRZLnFhXAQvZ0X5Aek"
            }}).then((e) => e.json()).then(e => {
                document.querySelector(".trustpilot_avg").src = e.star128x24.url;
                document.querySelector(".trustpilot_avg").width = e.star128x24.width;
                document.querySelector(".trustpilot_avg").height = e.star128x24.height;
            })
        })
        const basedOn = (language == "da") ? "basseret på " : (language == "en") ? "based on " : "bassierend auf ";
        const reviewsText = (language == "da") ? "anmeldelser" : (language == "en") ? "reviews" : "Bewertungen";

    }) */

    /* Reviews.forEach((review) => {
        fetch(review.links[2].href + "?language=" + language, {headers: {
            apikey: API_KEY_2
        }}).then((e) => e.json()).then((e) => {
            StarImage(e);
        });

        let experiencedAt = (review.experiencedAt == null) ? review.createdAt : review.experiencedAt;

        experiencedAt = new Date(experiencedAt).getUTCDate() + " " + month[language][new Date(experiencedAt).getMonth()] + " " + new Date(experiencedAt).getFullYear();

        const ReviewTitle = review.title;
        const ReviewText = review.text;
        const Stars = review.stars;
        const consumer = review.consumer;

        const consumerLocation = consumer.displayLocation;
        const consumerName = consumer.displayName;
        let ReviewSource = "<p class='reviewStatus'>"+review.reviewVerificationLevel+"</p>";
        if(review.reviewVerificationLevel == "not-verified"){
            ReviewSource = "";
        }else if(review.isVerified){
            ReviewSource = "<p class='reviewStatus'>"+review.reviewVerificationLevel+"</p>"
        }

        if(reviewsContainer == null) return
        reviewsContainer.innerHTML += `
            <article class="review">
                <section>
                    <header>
                        <section class="review-stars">
                            <img alt="Star rating: ${Stars} / 5" title="${Stars} / 5" width="128px" height="24px" class='starImage'>
                            ${ReviewSource}
                        </section>
                        <h4 class="review-title">${ReviewTitle}</h4>
                    </header>
                    <p class="review-content">${ReviewText}</p>
                </section>
                <footer class="review-footer">
                    <p><date>${experiencedAt}</date> - <span class="user">${consumerName}</span></p>
                </footer>
            </article>
        `;
    }) */

    /* echo <<<EOD
        <header class="Trustpilot-reviews-header">
            <h3>Vores gæster siger <span class="trustpilot-review-state"></span> <span class="trustScore"></span></h3>
        </header>
        <div class="reviewMainContainer">
            <section class="reviewContainer"></section>
        </div>
    EOD; */
?>