@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">地區內容管理</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/area_content/create">新增</a>
                    <hr>
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px;">標題</th>
                                <th>內文</th>
                                <th>價錢</th>
                                <th>圖片</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Default select</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Text</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Img</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone
                                        else.</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>


                        </tbody>
                    </table>
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
            $('#table').DataTable({
                "order": [1,"desc"]
            });
        });
    </script>
    @endsection
