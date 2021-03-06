@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區管理</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/area/create">新增</a>
                    <hr>
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px;">區域</th>
                                <th>區域代表圖片</th>
                                <th>區域多張Banner</th>
                                <th style="width:50px;">地名</th>
                                <th style="width:180px;">描述</th>
                                <th style="width:30px;">排序</th>
                                <th style="width:100px;">功能表</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                            <tr>
                                <td> {{ $item->map->title }} </td>
                                <td> <img width="130" src="{{ asset('/storage/'.$item->img) }}" alt=""></td>
                                <td> @foreach ($item->area_banners as $imgs)
                                    <img width="100" height="70" style="margin: 2px;"
                                        src="{{ asset('/storage/'.$imgs->imgs) }}" alt="">
                                    @endforeach</td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->text }} </td>
                                <td> {{ $item->sort }} </td>
                                <td>
                                    <a href="/admin/area/edit/{{ $item->id }}" class="btn btn-success btn-sm">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/area/destroy/{{ $item->id }}"
                                        method="POST" style="display: none;" data-itemid="{{ $item->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
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

            $('#table').on('click','.btn-danger', function(){
            event.preventDefault();
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true ){
                var itemid = $(this).data("itemid");
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }

        });
    });
</script>
@endsection
