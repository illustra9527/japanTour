@extends('layouts.front')

@section('css')
<!-- swiper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/filipelinhares/ress/master/dist/ress.min.css">

<link rel="shortcut_icon" href="/image/shortcut icon.png">
<link rel="stylesheet" href="/css/areachooseHokkaido.css">


<!-- Bookstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('content')
<section id="section_1">
    <div class="container">
        <div class="row">
            <div class="leftcontent col-8">
                <div class="areaImg">
                    <img src="/image/map/北海道PNG.png" alt="">
                </div>
            </div>
            <div class="rightcontent col-4">
                <!-- Swiper -->
                <div class="swiper-container areaSwiper">
                    <div class="swiper-wrapper">
                        {{  $area }}
                        {{-- @foreach ($area as $item)
                        <div class="swiper-slide">
                            <img src="image/scenery/小樽.jpg" alt="">
                        </div>
                        @endforeach --}}
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

<!-- swiper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js"></script>
<script src="/js/areajs.js"></script>
@endsection
