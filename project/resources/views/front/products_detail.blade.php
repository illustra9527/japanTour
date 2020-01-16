@extends('layouts.front_layout')

@section('css')

@endsection

@section('content')
<div class="container">
    <h2 class="mt-5 mb-3">Product {{ $product->id }}</h2>
    <div class="container d-flex">
        <div class="img"><img src="{{ $product->img }}" alt=""></div>
        <div class="content ml-3">
            <h3>{{ $product->title }}</h3>
            <p>{{ $product->discription }}</p>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
