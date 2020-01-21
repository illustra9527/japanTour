@extends('layouts.front_layout')

@section('css')

@endsection

@section('content')

<div class="container">

    <h2>cart</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">產品名稱</th>
                <th scope="col">價錢</th>
                <th scope="col">數量</th>
                <th scope="col">小計</th>
                <th scope="col" style="width:80px">刪除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger productQtyAdd"
                        data-productid="{{ $item->id }}">＋</button>
                    <input type="text" class="productQtyChange" value="{{ $item->quantity }}"
                        style="width:50px; text-align:center;" data-productid="{{ $item->id }}">
                    <button type="button" class="btn btn-sm btn-outline-danger productQtyMinus"
                        data-productid="{{ $item->id }}">－</button>
                </td>
                <td>{{ $item->quantity * $item->price }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger productDelete"
                        data-productid="{{ $item->id }}">×</button>
                </td>
            </tr>
            @endforeach
            <tr class="table-warning">
                <td></td>
                <td></td>
                <td></td>
                <td><b>總計</b></td>
                <td><b>{{ $total }}</b></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

@section('js')

{{-- 購物車 --}}
<script>
        /* 加入購物車按鈕綁定 */
        $('.addcart').on('click',function () {
            var product_id = $(this).data('productid');
            console.log(product_id);

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/addCart',
                data: {product_id:product_id},
                success: function (res) {
                    console.log(res);

                    $('.cartTotalQuantity').text(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });

        /* 按鈕 +1 */
        $('.productQtyAdd').on('click',function () {
            var product_id = $(this).data('productid');
            console.log(product_id);

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/cartQtyAdd',
                data: {product_id:product_id},
                success: function (res) {
                    window.location.reload(true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });

        /* 按鈕 -1 */
        $('.productQtyMinus').on('click',function () {
            var product_id = $(this).data('productid');
            console.log(product_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/cartQtyMinus',
                data: {product_id:product_id},
                success: function (res) {

                    window.location.reload(true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });

        /* input 直接修改 */
        $('.productQtyChange').on('change',function () {
            var new_qty = this.value;
            var product_id = $(this).attr('data-productid');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/cartQtyChange',
                data: {
                    product_id:product_id,
                    new_qty:new_qty
                },
                success: function (res) {

                    window.location.reload(true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });


        /* 刪除商品 */
        $('.productDelete').on('click',function () {
            var product_id = $(this).data('productid');
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true ){

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

                $.ajax({
                    method: 'POST',
                    url: '/cartDelete',
                    data: {product_id:product_id},
                    success: function (res) {

                        window.location.reload(true);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
        });

    </script>

@endsection
