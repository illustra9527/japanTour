@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">訂單管理 - 訂單詳情 {{ $order->order_no }}</div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">產品</th>
                                <th scope="col">價錢</th>
                                <th scope="col">數量</th>
                                <th scope="col">小計</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->area_product->title }}</td>
                                <td>{{ $item->area_product->price }}</td>
                                <td>{{ $item->area_product->quantity }}</td>
                                <td>{{ $item->area_product->quantity * $item->area_product->price }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-warning">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>總計</b></td>
                                <td><b>{{ $order->total_price }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5 class="mb-2">訂購人資訊</h5>
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group row">
                                <label for="name" class="col-sm col-form-label cus_style">姓&emsp;&emsp;名</label>
                                <div class="col-sm-10">
                                    {{ $order->name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm col-form-label cus_style">手&emsp;&emsp;機</label>
                                <div class="col-sm-10">
                                    {{ $order->phone }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_number" class="col-sm col-form-label cus_style">身份証&emsp;</label>
                                <div class="col-sm-10">
                                    {{ $order->id_number }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm col-form-label cus_style">出發日期</label>
                                <div class="col-sm-10">
                                    {{ $order->date }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm col-form-label cus_style">性&emsp;&emsp;別</label>
                                <div class="col-sm-10">
                                    {{ $order->gender }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm col-form-label cus_style">信&emsp;&emsp;箱</label>
                                <div class="col-sm-10">
                                    {{ $order->email }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">訂單狀態</label>
                                <div class="col-sm-10">
                                    {{ $order->status }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="remark" class="col-sm-2 col-form-label">備&emsp;&emsp;註</label>
                                <div class="col-sm-10">
                                    {{ $order->remark }}
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
