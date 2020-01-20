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
                    <form  method="post" action="/admin/area/update/{{ $item->id }}">
                        @csrf
                        <div class="form-group row">
                            <label for="map_id" class="col-sm-2 col-form-label">區域選擇</label>
                            <div class="col-sm-10">
                                <select name="map_id" class="form-control" id="map_id" required>
                                    @foreach ($maps as $map)
                                        <option value="{{ $map->id }}" class="form-control"
                                            @if ( $map->id == $item->map_id ) selected @endif >{{ $map->title }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">描述</label>
                            <div class="col-sm-10">
                                <textarea name="text" id="" cols="30" rows="10" class="form-control">{{ $item->text }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">sort</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="{{ $item->sort }}">
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
