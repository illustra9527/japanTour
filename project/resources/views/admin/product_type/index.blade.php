@extends('layouts.app')

@section('css')

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品類別管理-INDEX</div>

                <div class="card-body">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>地區(TYPE)</th>
                                <th>商品類別(TYPE)</th>
                                <th>排序(SORT)</th>
                                <th>功能</th>

                            </tr>
                        </thead>
                        <tbody>
                            <a href="/admin/product_type/create" class="btn btn-sm btn-primary">新增商品類別</a>

                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->area->title }}</td>
                                <td>{{ $item->type_name }}</td>
                                <td>{{ $item->sort }}</td>
                                <td><a href="/admin/product_type/edit/{{ $item->id }}"
                                        class="btn btn-sm btn-success">編輯</a>
                                    {{-- <a href="/admin/news/destroy/{{ $item->id }}" class="btn btn-sm
                                    btn-warning">刪除</a> --}}
                                    <a class="btn btn-sm btn-warning" href="#" data-del_id="{{ $item->id }}"> 刪除 </a>

                                    <form class="destroy_form" action="/admin/product_type/destroy/{{ $item->id }}"
                                        method="POST" data-del_id="{{ $item->id }}" style="display: none;">
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
        $('#example').DataTable({
                "order": [0,"desc"]
            });
        $('#example').on('click','.btn-warning',function(){
        event.preventDefault();
        var z = confirm("確定要刪除嗎???");
        if (z == true) {
            var del = $(this).data("del_id");
            $(`.destroy_form[data-del_id="${del}"]`).submit();
            }
        })
});
</script>

@endsection
