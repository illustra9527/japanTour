@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區內容管理</div>

                <div class="card-body">

                    <form method="post" action="/admin/area_content/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="area_id">
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter Title" name="title">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Text</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter Text" name="text">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter Price" name="price">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Img</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter Img" name="img">

                        </div>

                        <button type="submit" class="btn btn-primary">送出</button>
                    </form>

                </div>
            </div>
        </div>



    </div>
    @endsection


    @section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    @endsection
