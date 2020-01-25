@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">會員管理 - 資料詳情</div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td scope="col">使用者帳號</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">身分證</td>
                                <td>{{ $item->user_detail->id_number }}</td>
                            </tr>

                            <tr>
                                <td scope="col">電話</td>
                                <td>{{ $item->user_detail->phone }}</td>
                            </tr>

                            <tr>
                                <td scope="col">護照姓氏</td>
                                <td>{{ $item->user_detail->last_name }}</td>
                            </tr>
                            <tr>
                                <td scope="col">護照名字</td>
                                <td>{{ $item->user_detail->first_name }}</td>
                            </tr>

                            <tr>
                                <td scope="col">性別</td>
                                <td>    @if ( $item->user_detail->gender === 'male' )
                                    男
                                @else
                                    女
                                @endif

                                    </td>
                            </tr>

                            <tr>
                                <td scope="col">信箱</td>
                                <td>{{ $item->email }}</td>
                            </tr>
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


</script>
@endsection
