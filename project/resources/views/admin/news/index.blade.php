@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">最新消息管理 - index</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/news/create">新增</a>
                    <hr>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:120px;">日期</th>
                                <th style="width:140px;">標題</th>
                                <th>內文</th>
                                <th style="width:100px;">排序</th>
                                <th style="width:140px;">功能</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td> {{ $item->date }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->text }} </td>
                                <td>{{ $item->sort }} </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/admin/news/edit/{{ $item->id }}">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>
                                    <form class="destroy-form" action="/admin/news/destroy/{{ $item->id }}"
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

        $('#example').on('click','.btn-danger', function(){
            event.preventDefault();
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true ){
                var itemid = $(this).data("itemid");
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }

        });

    })
</script>
@endsection
