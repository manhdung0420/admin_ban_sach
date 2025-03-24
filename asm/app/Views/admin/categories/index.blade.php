@extends('admin.dashboard')

@section('title', 'Danh mục sản phẩm')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Quản lý danh mục sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ APP_URL . 'admin/categories/add' }}">
                                <button class="btn btn-success">Thêm danh mục</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach ($categories as $cate)
                                    <tr>
                                        <th scope="row">{{ $cate->id }}</th>
                                        <td>{{ $cate->name }}</td>
                                        <td>
                                            <a href="{{ APP_URL . 'admin/categories/edit/' . $cate->id }}">
                                                <button class="btn btn-warning"><i class="fas fa-cogs">Sửa</i></button>
                                            </a>
                                            <form action="{{ APP_URL . 'admin/categories/delete/' . $cate->id }}" method="post" class="d-inline">
                                                <button onclick="return confirm('Bạn có muốn xoá không')" type="submit" class="btn btn-danger">Xoá</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection