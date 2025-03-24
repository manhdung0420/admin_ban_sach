@extends('admin.dashboard')

@section('title', 'Sửa sản phẩm')

@section('content')
<div class="content-wrapper">
    <section class="content-header text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Sửa sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ APP_URL . $product->image }}" width="100">
                                </div>

                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" name="promotional_price" value="{{ $product->promotional_price }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input type="datetime-local" name="creates_at" value="{{ date('Y-m-d\TH:i', strtotime($product->creates_at)) }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}" 
                                            {{ $cate->id == $product->category_id ? 'selected' : '' }}
                                            >
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ APP_URL . 'admin/products' }}" class="btn btn-secondary">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
