@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區管理 - create</div>

                <div class="card-body">
                    <form  method="post" action="/admin/area/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="map_id" class="col-sm-2 col-form-label">區域選擇</label>
                            <div class="col-sm-10">
                                <select name="map_id" class="form-control" id="map_id" required>
                                    @foreach ($maps as $item)
                                        <option value="{{ $item->id }}" class="form-control">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">描述</label>
                            <div class="col-sm-10">
                                <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">新增</button>
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
