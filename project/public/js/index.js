// banner parallax


// 地圖SVG
var svg = document.querySelector("svg");
var paths = document.querySelectorAll("path");

var i = paths.length;
while (i--) {
    paths[i].addEventListener("mouseenter", function (e) {
        paths.appendChild(e.target);
    });
}

// swiper
var mySwiper = new Swiper(".swiper-container", {
    direction: "vertical",
    loop: false,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    grabCursor: true,
    speed: 1000,
    parallax: true,
    autoplay: false,
    effect: "slide",
    mousewheel: {
        invert: false,
    },
});
