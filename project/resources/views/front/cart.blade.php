@extends('layouts.front_layout')

@section('css')

@endsection

@section('content')

<div class="container">

    <h2>cart</h2>

    <ul>內容：
            @foreach ($contents as $content)
                <li>Name: {{ $content->name}} : {{ $content->price }} ｘ {{ $content->quantity }}</li>
           @endforeach
    </ul>

    總計：{{ $total }}

</div>

@endsection

@section('js')

@endsection
