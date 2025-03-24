@extends('admin.dashboard')

@section('title', 'Admin sản phẩm')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Quản lý sản phẩm</h1>
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
                            <a href="{{ APP_URL . 'admin/users/add' }}">
                                <button class="btn btn-success">Thêm người dùng</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Usename</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->create_at }}</td>
                                        <td>{{ $user->update_at }}</td>
                                        <td>
                                            <a href="{{ APP_URL . 'admin/users/edit/' . $user->id }}" class="btn btn-secondary">Edit</a>
                                            <!-- <form action="{{ APP_URL . 'admin/users/delete/' . $user->id }}" method="post" class="d-inline">
                                                <button onclick="return confirm('Bạn có muốn xoá không')" type="submit" class="btn btn-danger">Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>STT</th>
                                        <th>Usename</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao Tác</th>
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