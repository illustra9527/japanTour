@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">最新消息管理 - edit</div>

                <div class="card-body">
                    <form method="post" action="/admin/news/update/{{ $item->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">最新消息排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort"
                                    value="{{ $item->sort }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">最新消息日期</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="date" name="date" required
                                    value="{{ $item->date }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">最新消息標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ $item->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">最新消息內文</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="text" name="text"
                                    style="height: 400px;  word-break: break-all;">{{ $item->text }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
