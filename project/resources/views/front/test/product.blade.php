@extends('layouts.front_layout')

@section('css')

@endsection

@section('content')

<div class="container">

    <div class="row">

        @foreach ($products as $product)
        <div class="col-3">
            <div class="card">
                <img src="{{ '/storage/'. $product->img }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">MOMOMOMONEY MONEY </p>
                    <P>PRICE: {{ $product->price }}</P>
                    <button class="btn btn-danger addcart" data-productid="{{$product->id}}">加入購物車</button>
                </div>
            </div>
        </div>
        @endforeach


    </div>

</div>

@endsection

@section('js')

<!-- 購物車 -->
<script>
    /* 加入購物車按鈕綁定 */
        $('.addcart').on('click',function () {
            var product_id = $(this).data('productid');
            console.log(product_id);
            // $('.cartTotalQuantity').effect("bounce");    // 點擊加入購物車後抖動一下（利用套件）


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

</script>

@endsection
