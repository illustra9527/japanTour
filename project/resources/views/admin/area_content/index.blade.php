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
                    <a class="btn btn-primary" href="/admin/area_content/create">新增</a>
                    <hr>
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px;">標題</th>
                                <th>內文</th>
                                <th>價錢</th>
                                <th>圖片</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td> {{ $item->map->title }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->text }} </td>
                                <td> {{ $item->sort }} </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
    @endsection


    @section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [1,"desc"]
            });
        });
    </script>
    @endsection
