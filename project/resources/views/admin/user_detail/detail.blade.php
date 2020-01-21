@extends('layouts.app')

@section('css')

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <td>{{ $item->id_number }}</td>
                            </tr>

                            <tr>
                                <td scope="col">電話</td>
                                <td>{{ $item->phone }}</td>
                            </tr>

                            <tr>
                                <td scope="col">護照名</td>
                                <td>{{ $item->passport_name }}</td>
                            </tr>

                            <tr>
                                <td scope="col">性別</td>
                                <td>{{ $item->gender }}</td>
                            </tr>

                            <tr>
                                <td scope="col">信箱</td>
                                <td>{{ $item->user->email }}</td>
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
