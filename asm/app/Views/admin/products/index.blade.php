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
                            <a href="{{ APP_URL . 'admin/products/add' }}">
                                <button class="btn btn-success">Thêm sản phẩm</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        {{-- <th>Giá Khuyễn mãi</th> --}}
                                        <th>Mô tả</th>
                                        <th>Ngày nhập</th>
                                        <th>Danh mục</th>
                                        <th>Thao Tác</th>
                                </thead>

                                <tbody>
                                    @foreach ($products as $pro)
                                    <tr>
                                        <th scope="row">{{ $pro->id }}</th>
                                        <td>{{ $pro->product_name }}</td>
                                        <td>
                                            <img src="{{APP_URL . $pro->image }}" width="90" alt="image">
                                        </td>
                                        <td>{{ number_format($pro->price, 0, ',', '.') }} đ</td>
                                        {{-- <td>{{ number_format($pro->promotional_price, 0, ',', '.') }} đ</td> --}}
                                        <td>{{ $pro->description }}</td>
                                        <td>{{ $pro->creates_at }}</td>
                                        <td>{{ $pro->name }}</td>
                                        <td>
                                            <a href="{{ APP_URL . 'admin/products/show/' . $pro->id }}" class="btn btn-info btn-sm">Show</a>
                                            <a href="{{ APP_URL . 'admin/products/edit/' . $pro->id }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ APP_URL . 'admin/products/delete/' . $pro->id }}" method="post" class="d-inline">
                                                <button onclick="return confirm('Bạn có muốn xoá không')" type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        {{-- <th>Giá Khuyễn mãi</th> --}}
                                        <th>Mô tả</th>
                                        <th>Ngày nhập</th>
                                        <th>Danh mục</th>
                                        <th>Thao Tác</th>
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