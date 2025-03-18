document.addEventListener("DOMContentLoaded", function () {
    console.log("Swiper script is running...");

    // Ensure Swiper exists before initializing
    if (typeof Swiper === "undefined") {
        console.error("Swiper.js is not loaded!");
        return;
    }

    var swiper = new Swiper(".heroSwiper", {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        effect: "fade",
    });

    console.log("Swiper initialized successfully!");
});


var swiper = new Swiper(".swiper-container", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});




