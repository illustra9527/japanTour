@extends('layouts.front_layout')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">

<style>
    .swiper-container {
        width: 100%;
        height: calc(100vh - 56px);
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .slider_product_img img {
        width: 100%;
        height: 250px;
    }

    ul {
        width: 100%;
    }
</style>

@endsection

@section('content')

<section id="section_1">
    <!-- Swiper of banner-->
    <div class="swiper-container swiperBanner">
        <div class="swiper-wrapper">
            @foreach ($swipers as $swiper)
            <div class="swiper-slide"><img src="{{ $swiper-> img }}" alt=""></div>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>

<section id="section_2">
    <div class="container">
        <!-- Swiper of proudcts-->
        <div class="swiper-container swpier_products">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                <div class="swiper-slide flex-wrap">
                    <div class="slider_product_img">
                        <img src="{{ $product->img }}" alt="">
                    </div>
                    <div class="slider_product_title"> {{ $product->title }} </div>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    </div>
</section>

<section id="section_3">
    <div class="container">
        <h2>News</h2>
        <div class="news_list">
            <div class="news d-flex justify-content-between">
                <ul class="list-group">
                    @foreach ($news as $new)
                    <li class="list-group-item">
                        <a class="d-flex justify-content-between" href="/news/{{ $new->id }}">
                            <div class="news_title"> {{ $new->title }}</div>
                            <div class="news_date"> {{ $new->failed_at }} </div>
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

</section>
@endsection

@section('js')

<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiperBanner', {
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
        navigation: {
            nextEl: '.swiper-button-next ',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
        });

    var swiper_2 = new Swiper('.swpier_products', {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper_pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

@endsection
