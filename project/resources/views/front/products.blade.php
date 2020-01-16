@extends('layouts.front_layout')

@section('css')
<style>
    .products_banner {
        width: 100%;
        height: 350px;
        background-image: url('https://cdn.pixabay.com/photo/2019/11/30/20/43/mountain-hut-4664186_1280.jpg');
        background-position: center;
        background-size: cover;
    }

    .card_img {
        width: 100%;
        height: 250px;
        overflow: hidden;

    }
</style>
@endsection

@section('content')

<div class="products_banner mb-5"></div>

<div class="container">
    <h2 class="mb-3">products</h2>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-md-4">
            <div class="card mt-1">
                <div class="card_img">
                    <img src="{{ $product-> img }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"> {{ $product->title }} </h5>
                    <p class="card-text"> {{ $product->discription }} </p>
                    <a href="/products/{{ $product ->id }}" class="btn btn-primary"> Go Cat-sniffing</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')

@endsection
