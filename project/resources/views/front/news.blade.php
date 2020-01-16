@extends('layouts.front_layout')

@section('css')

@endsection

@section('content')

<div class="banner"></div>

<div class="container">
    <h1 class="mt-5 mb-3">News</h1>

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

    {{ $news->links() }}


</div>

@endsection


@section('js')

@endsection
