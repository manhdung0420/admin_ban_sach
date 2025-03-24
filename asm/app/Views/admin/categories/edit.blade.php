@extends('admin.dashboard')

@section('title', 'Sửa danh mục')

@section('content')
<div class="content-wrapper">
    <section class="content-header text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Sửa danh mục sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin danh mục</h3>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" value="{{ $categories->name }}" >
                                    @isset($errors['name'])
                                    <span class="text-center text-danger">{{ $errors['name'] }}</span>
                                    @endisset 
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
