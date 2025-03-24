@extends('admin.dashboard')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="content-wrapper">
    <section class="content-header text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Thêm sản phẩm mới</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control">
                                    @isset($errors['product_name'])
                                    <span class="text-center text-danger">{{ $errors['product_name'] }}</span>
                                    @endisset
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh sản phẩm</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Giá tiền</label>
                                    <input type="number" name="price" class="form-control">
                                    @isset($errors['price'])
                                    <span class="text-center text-danger">{{ $errors['price'] }}</span>
                                    @endisset
                                </div>

                                <div class="form-group">
                                    <label for="">Giá khuyến mãi</label>
                                    <input type="number" name="promotional_price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                    @isset($errors['description'])
                                    <span class="text-center text-danger">{{ $errors['description'] }}</span>
                                    @endisset
                                </div>
                                <div class="form-group">
                                    <label for="creates_at">Ngày nhập</label>
                                    <input type="datetime-local" name="creates_at" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}">
                                            {{ $cate->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection