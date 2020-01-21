@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="/admin/product_content/store" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="type_id" class="col-sm-2 col-form-label">商品類別</label>
                    <div class="col-sm-10">
                        <select name="type_id" class="form-control" id="type_id">
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" class="form-control">{{ $item->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="img" class="col-sm-2 col-form-label">商品圖片</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">商品標題</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">商品敘述</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="text" name="text" style="height:150px"> </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">商品價錢</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sort" class="col-sm-2 col-form-label">排序</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sort" name="sort" value="1">
                    </div>
                </div>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('js')

@endsection
