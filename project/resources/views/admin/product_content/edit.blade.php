@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區編輯 - edit</div>

                <div class="card-body">
                    <form method="post" action="/admin/product_content/update/{{ $item->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="map_id" class="col-sm-2 col-form-label">地區選擇</label>
                            <div class="col-sm-10">
                                <select name="area_id" class="form-control" id="area_id" required>
                                    @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" class="form-control" @if ( $area->id == $item->area_id
                                        ) selected @endif >{{ $area->title }}
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">現有商品圖</label>
                            <div class="col-sm-10">
                              <img  height="150" src="{{ asset('/storage/'.$item->img) }}" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">上傳商品圖</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" id="img" name="img" value="{{ $item->img }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">商品標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $item->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">商品描述</label>
                            <div class="col-sm-10">
                                <textarea name="text" id="" cols="30" rows="10"
                                    class="form-control">{{ $item->text }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">商品價錢</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price"
                                value="{{ $item->title }}">
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
