<?php
    $ads = true;
    if($ads){
        echo '
        <a class="intaad-link" href="https://booking.cykelfaergen.info?utm_campaign=Booking2024&utm_source=article&utum_medium=banner&utm_content='.$main_title.'">
            <span class="inta-adSign">Ad</span>
            <img src="/assets/inta-ads/ad-2023.jpg" loading="lazy" alt="booking ad">
        </a>
        ';
    }else{
        echo "";
    }