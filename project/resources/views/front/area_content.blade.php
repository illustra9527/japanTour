@extends('layouts.front')

@section('css')
<!-- Swiper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/filipelinhares/ress/master/dist/ress.min.css">

<!-- Bookstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/scenerydetail.css">
@endsection

@section('content')
<section id="section_1">
    <!-- Swiper -->
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./image/scenery/景點1.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/夜景.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/美瑛拼布之路-e1536427222760.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/小樽.jpg" alt="">
            </div>
        </div>
        <div class="introduction">
            <div class="title">
                <h2>北海道</h2>
                <h1>小樽運河</h1>
            </div>
            <div class="introductiontext">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, deserunt?</p>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./image/scenery/景點1.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/夜景.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/美瑛拼布之路-e1536427222760.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./image/scenery/小樽.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<section id="section_2">
    <img id="cloudL" src="./image/scenery/cloudL.png" alt="">
    <img id="cloudR" src="./image/scenery/cloudR.png" alt="">
    <div class="container">
        <div class="product">
            <div class="product_img">
                <img class="loveImg1" src="./image/love.png" alt="">
                <img src="./image/scenery/景點1.png" class="productImg" alt="...">
            </div>
            <div class="productText">
                <h2>入場券</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum facilis fuga voluptate ad sit libero
                    reiciendis assumenda et? Nemo quasi doloremque, eos nulla nostrum dicta quam quis nihil atque quia
                    veritatis eum doloribus hic et eaque consequuntur earum sint architecto aliquam vero impedit! Natus
                    iure culpa voluptatum aliquid illo quae!</p>
                <button class="btn btn-light">加入旅程</button>
            </div>
        </div>
        <div class="product">
            <div class="product_img">
                <img class="loveImg2" src="./image/love.png" alt="">
                <img src="./image/scenery/景點1.png" class="productImg" alt="...">
            </div>
            <div class="productText">
                <h2>入場券</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum facilis fuga voluptate ad sit libero
                    reiciendis assumenda et? Nemo quasi doloremque, eos nulla nostrum dicta quam quis nihil atque quia
                    veritatis eum doloribus hic et eaque consequuntur earum sint architecto aliquam vero impedit! Natus
                    iure culpa voluptatum aliquid illo quae!</p>
                <button class="btn btn-light">加入旅程</button>
            </div>
        </div>
    </div>
    <div class="wave_wrap">
        <img id="wave" src="./image/scenery/wave.png" alt="">
    </div>
</section>
@endsection

@section('js')
<!-- bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- swiper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js"></script>
<script src="./js/scenerydetail.js"></script>

@endsection
