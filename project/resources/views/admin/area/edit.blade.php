@extends('layouts.app')

@section('css')
<style>
    .item {
        width: 100px;
        margin: 5px;
    }

    .item-control {
        display: flex;
    }

    .product_imgs {
        position: relative;
    }

    .product_imgs img {
        height: 100px;
    }

    .product_imgs .btn {
        position: absolute;
        right: 0;
        top: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區管理 - create</div>

                <div class="card-body">
                    <form method="post" action="/admin/area/update/{{ $item->id }}">
                        @csrf
                        <div class="form-group row">
                            <label for="map_id" class="col-sm-2 col-form-label">區域選擇</label>
                            <div class="col-sm-10">
                                <select name="map_id" class="form-control" id="map_id" required>
                                    @foreach ($maps as $map)
                                    <option value="{{ $map->id }}" class="form-control" @if ( $map->id == $item->map_id
                                        ) selected @endif >{{ $map->title }}
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">地區</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $item->title }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">地區代表原始圖</label>
                            <div class="col-sm-10">
                                <img width="180" class="img-fluid" src="{{ asset('/storage/'.$item->img) }}" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">地區代表圖</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="img" name="img" value="{{ $item->img }}">
                            </div>
                        </div>

                        <hr>

                        <div><input type="text" name="new_sort" value="" id="new_sort" hidden></div>

                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">現有Banner組<br><small class="text-danger">
                                    ☆請先將多張產品圖更新<br>在修改其他資料<br>(排序/上傳/刪除) </small></label>

                            <div class="col-sm-10 item-control">

                                @foreach ($banners as $banner)
                                {{-- {{$banner}} --}}
                                <div class="item" data-bannerid="{{$banner->id}}">
                                    <div class="item-content">
                                        <!-- Safe zone, enter your custom markup -->
                                        <div class="product_imgs">
                                            <img width="100" height="60" class="img-fluid"
                                                src="{{ asset('/storage/'.$banner->imgs ) }}" alt="">

                                            <button class="btn btn-danger btn-sm" data-bannerid="{{$banner->id}}"
                                                type="button">X</button>

                                            <div class="sort">
                                                <label style="margin: 5px 0 5px;" for="imgs">排序</label>
                                                <input class="form-control change_imgs_sort" type="number"
                                                    value="{{$banner->sort}}" data-bannerid="{{$banner->id}}">
                                            </div>

                                        </div>
                                        <!-- Safe zone ends -->
                                    </div>
                                </div>

                                @endforeach
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="imgs" class="col-sm-2 col-form-label">上傳Banner組</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="imgs" name="imgs[]" multiple
                                    value="{{ $item->img }}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="text" class="col-sm-2 col-form-label">描述</label>
                            <div class="col-sm-10">
                                <textarea name="text" id="" cols="30" rows="10"
                                    class="form-control">{{ $item->text }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort"
                                    value="{{ $item->sort }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('.change_imgs_sort').change(function(banner_imgs_id){
            // console.log(product_imgs_id);
            var banner_imgs_id = $(this).data('bannerid');
            // console.log(product_imgs_id);
            var banner_imgs_value = this.value;
            // console.log(product_imgs_value);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: '/admin/imgs_change_sort',
                data: {banner_imgs_id: banner_imgs_id,
                    banner_imgs_value: banner_imgs_value},
                success: function (res) {
                    document.location.reload(true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });
        $('.product_imgs .btn-danger').click(function () {
            // console.log('dasdg');
                var banner_imgs_id = $(this).data('bannerid');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_banner_imgs',
                    data: {banner_imgs_id: banner_imgs_id},
                    success: function (res) {
                        $( `.product_imgs[data-bannerid='${banner_imgs_id}']` ).remove();
                        document.location.reload(true);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
        });

</script>

@endsection
