@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">會員帳號管理</div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>使用者名稱</th>
                                <th>E-mail</th>
                                <th>電話</th>
                                <th style="width:180px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->user_detail->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_detail->phone }}</td>

                                <td>
                                    <a href="/admin/user_detail/{{ $user->id }}" class="btn btn-success btn-sm">帳號詳情</a>
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $user->id }}">刪除</a>

                                    <form class="destroy-form" action="/admin/user_detail/destroy/{{ $user->id }}"
                                        method="POST" style="display: none;" data-itemid="{{ $user->id }}">
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
            "UID": [1,"desc"]
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
