@extends('layouts.front_layout')

@section('css')

<style>

.new_content_img img{
    width: 50%;

}

</style>

@endsection

@section('content')

<div class="container">
    <h2 class="mt-5 mb-3">{{ $new->title}}</h2>
    <div class="content">
        <div class="img mb-3 new_content_img"><img src="{{ $new->img }}" alt=""></div>
        <div class="content">{{ $new->discription }}</div>
    </div>

</div>

@endsection

@section('js')

@endsection
