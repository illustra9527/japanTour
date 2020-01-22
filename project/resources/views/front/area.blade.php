@extends('layouts.front')

@section('css')

<link rel="stylesheet" href="https://cdn.rawgit.com/filipelinhares/ress/master/dist/ress.min.css">

<link rel="shortcut_icon" href="./image/shortcut icon.png">
<link rel="stylesheet" href="./css/areachooseHokkaido.css">

@endsection

@section('content')
<section id="section_1">
    <div class="container">
        <div class="row">
            <div class="leftcontent col-8">
                <div class="areaImg">
                    <img src="image/map/北海道PNG.png" alt="">
                </div>
            </div>
            <div class="rightcontent col-4">
                <!-- Swiper -->
                <div class="swiper-container areaSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="image/scenery/小樽.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/夜景.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/景點1.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/美瑛拼布之路-e1536427222760.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/景點1.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/景點1.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/景點1.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="image/scenery/景點1.png" alt="">
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')


<script src="js/areajs.js"></script>
@endsection
