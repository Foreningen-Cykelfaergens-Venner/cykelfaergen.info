let currentSlide = 0;

const Timer = function(callback, delay) {
    var timerId, start, remaining = delay;

    this.pause = function() {
        window.clearTimeout(timerId);
        timerId = null;
        remaining -= Date.now() - start;
    };

    this.resume = function() {
        if (timerId) {
            return;
        }

        start = Date.now();
        timerId = window.setTimeout(callback, remaining);
    };

    this.resume();
};

window.addEventListener("load", function () {
    "use strict";
    const slides = document.querySelectorAll(".hero__slider-slides");
    const slider = document.querySelectorAll(".hero__slider");
    let prevSlide = slides.length - 1;
    let timer;
    if (slides.length > 0) {
        function slide(num = 1) {
            
           /*  if (currentSlide < 0) currentSlide = 0;
            if (currentSlide > prevSlide) currentSlide = 0; */

            slides[prevSlide].style.left = "" + (slides[currentSlide].clientWidth) + "px";
            document.querySelectorAll(".indicator")[prevSlide].style.backgroundColor = "#e6e6e6";
            slides[prevSlide].style.zIndex = "-1";

            prevSlide = (prevSlide+1)%slides.length;
            slides[prevSlide].style.left = "-" + (slides[currentSlide].clientWidth) + "px";
            
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].style.zIndex = "";
            slides[currentSlide].style.left = "0em";

            let currentS = currentSlide + num;

            document.querySelector(".num-indicator").innerHTML = currentS + " / " + slides.length;
            document.querySelectorAll(".indicator")[prevSlide].style.backgroundColor = "#e6e6e6";
            document.querySelectorAll(".indicator")[currentSlide].style.backgroundColor = "#046c6d";

            timer = new Timer(() => {slide()}, 4000);
        }

        let currentS = currentSlide + 1;
        document.querySelector(".num-indicator").innerHTML = currentS + " / " + slides.length;
        for (let i = 0; i < slides.length; i++){
            document.querySelector(".num").innerHTML += "<div class='indicator'></div>";
            if (i == currentS) {
                document.querySelector(".indicator").style.backgroundColor = "#046c6d";
            }
        }

        timer = new Timer(() => {
            slide()
        }, 4000);

        slider.forEach((slider) => slider.addEventListener("mouseover", (e) => {
            timer.pause()
        }));

        slider.forEach((slider) => slider.addEventListener("mouseleave", (e) => {
            timer.resume()
        }));

        /* document.querySelector(".prev").addEventListener("click", function () {
            currentSlide--;
            slide(1);
        });
        document.querySelector(".next").addEventListener("click", function () {
            currentSlide++;
            slide(1);
        }); */
    }
});