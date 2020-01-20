@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">帳號管理</div>
                <div class="card-body">

                    <a class="btn btn-primary" href="/admin/account/create">新增帳號</a>
                    <hr>
                    <h4>
                        <a href="/admin/account" class="badge badge-primary">顯示全部</a>
                        <a href="/admin/account/select/admin" class="badge badge-success">管理員</a>
                        <a href="/admin/account/select/super_admin" class="badge badge-danger">超級管理員</a>
                    </h4>
                    <hr>

                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>使用這名稱</th>
                                <th>E-mail</th>
                                <th>權限(role)</th>
                                <th style="width:130px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ( $item->role == 'admin')管理員 @endif
                                    @if ( $item->role == 'super_admin')超級管理員 @endif

                                </td>
                                <td>
                                    <a href="/admin/account/edit/{{ $item->id }}" class="btn btn-success btn-sm">修改</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/account/destroy/{{ $item->id }}"
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

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "sort": [1,"desc"]
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
