@extends('layouts.front')

@section('css')

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


        @foreach ($collection as $item)
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
        @endforeach



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
<!-- swiper -->
<script src="./js/scenerydetail.js"></script>

<!-- 購物車 -->
<script>
    /* 加入購物車按鈕綁定 */
    $('.addcart').on('click',function () {
        var product_id = $(this).data('productid');
        console.log(product_id);
        // $('.cartTotalQuantity').effect("bounce");    // 點擊加入購物車後抖動一下（利用套件）


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/addCart',
            data: {product_id:product_id},
            success: function (res) {
                console.log(res);

                $('.cartTotalQuantity').text(res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    });

</script>

@endsection
