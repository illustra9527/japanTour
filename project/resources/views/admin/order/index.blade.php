@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">訂單管理 - index</div>
                <div class="card-body">

                    <h5><a href="/admin/order" class="badge badge-primary">顯示全部</a>
                        <a href="/admin/order/select/OrderDone" class="badge badge-success">已處理</a>
                        <a href="/admin/order/select/NewOrder" class="badge badge-danger">未付款</a>
                        <a href="/admin/order/select/OrderPaid" class="badge badge-info">已付款未處理</a></h5>
                    <hr>

                    <table id="order" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>訂購人姓名</th>
                                <th>訂購人電話</th>
                                <th>總金額</th>
                                <th>訂單狀態</th>
                                <th style="width:150px">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->order_no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->total_price }}</td>

                                <td>
                                    @if ($item->status == 'NewOrder')
                                    <span class="badge badge-pill badge-danger">未付款</span>
                                    @endif
                                    @if ($item->status == 'OrderPaid')
                                    <span class="badge badge-pill badge-primary">已付款未處理</span>
                                    @endif
                                    @if ($item->status == 'OrderDone')
                                    <span class="badge badge-pill badge-success">已處理</span>
                                    @endif


                                </td>
                                <td>
                                    @if ($item->status === 'OrderPaid')

                                    <a href="#" class="btn btn-info btn-sm" data-itemid="{{ $item->order_no }}">出貨</a>

                                    <form class="deal-form" action="/admin/orderChangeStatus/{{ $item->order_no }}"
                                        method="POST" style="display: none;" data-itemid="{{ $item->order_no }}">
                                        @csrf
                                    </form>

                                    @endif


                                    <a href="/admin/order/detail/{{ $item->order_no }}"
                                        class="btn btn-success btn-sm">訂單詳情</a>

                                    @if (Auth::user()->role == 'super_admin')
                                    <a class="btn btn-danger btn-sm" href="#" data-itemid="{{ $item->order_no }}">刪除</a>
                                    @endif
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
        $('#order').DataTable({
            "sort": [1,"desc"]
        });

        $('#order').on('click','.btn-danger', function(){
            event.preventDefault();
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true ){
                var itemid = $(this).data("itemid");
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }

        });

        $('#order').on('click','.btn-info', function(){
            event.preventDefault();
            var r = confirm("你確定要改為已處理嗎?");
            if (r == true ){
                var itemid = $(this).data("itemid");
                $(`.deal-form[data-itemid="${itemid}"]`).submit();
            }

        });


    });

</script>
@endsection
