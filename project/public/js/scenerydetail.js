// Banner Swiper

var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs,
    },
});

// 願望清單
var img1 = "./image/Heart-PNG-HD.png",
    img2 = "./image/love.png";
var change_img = document.querySelector('.loveImg1');
change_img.onclick = function () {
    var mySrc = change_img.getAttribute('src');
    console.log(change_img);

    if (mySrc == img1) {
        change_img.setAttribute('src', img2);
    } else {
        change_img.setAttribute('src', img1);
    }
}
var imgA = "./image/Heart-PNG-HD.png",
    imgB = "./image/love.png";
var change_img2 = document.querySelector('.loveImg2');
change_img2.onclick = function () {
    var mySrc2 = change_img2.getAttribute('src');
    console.log(change_img);

    if (mySrc2 == imgA) {
        change_img2.setAttribute('src', imgB);
    } else {
        change_img2.setAttribute('src', imgA);
    }
}

// 雲朵效果

var cloudL = document.getElementById('cloudL')
scroll = window.pageYOffset;
document.addEventListener('scroll', function () {
    var offset = window.pageYOffset
    scroll = offset;
    cloudL.style.width = (30 + scroll / 20) + '%';
    cloudL.style.right = scroll / 50 + '%';
})

var cloudR = document.getElementById('cloudR')
scroll = window.pageYOffset;
document.addEventListener('scroll', function () {
    var offset = window.pageYOffset
    scroll = offset;
    cloudR.style.width = (10 + scroll / 20) + '%';
    cloudR.style.right = scroll / 60 + '%';
})