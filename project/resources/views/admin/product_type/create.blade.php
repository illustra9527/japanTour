@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="/admin/product_type/store" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="area_id" class="col-sm-2 col-form-label">地區選擇</label>
                    <div class="col-sm-10">
                        <select name="area_id" class="form-control" id="area_id">
                            @foreach ($areas as $item)
                            <option value="{{ $item->id }}" class="form-control">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type_name" class="col-sm-2 col-form-label">商品類別</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="type_name" name="type_name">
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
