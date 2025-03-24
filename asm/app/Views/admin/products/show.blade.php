@extends('admin.dashboard')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg p-4">
                <div class="row align-items-center">
                    <!-- Hình ảnh sản phẩm -->
                    <div class="col-md-5 text-center">
                        <img src="{{ APP_URL . $product->image }}" style="height: 300px" class="img-fluid rounded" alt="{{ $product->product_name }}">
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="col-md-7">
                        <h2 class="text-primary">{{ $product->product_name }}</h2>
                        <p class="text-muted">Danh mục: <strong>{{ $product->category->name }}</strong></p>

                        <div class="mb-3">
                            <span class="text-danger fs-4 fw-bold">{{ number_format($product->promotional_price, 0, ',', '.') }} đ</span>
                            <span class="text-muted text-decoration-line-through fs-5 ms-2">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                        </div>

                        <p><strong>Mô tả:</strong> {{ $product->description }}</p>
                        <p><strong>Ngày nhập:</strong> {{ date('d/m/Y', strtotime($product->creates_at)) }}</p>
                        <p><strong>Danh mục:</strong> {{ $product->name }}</p>
                        <div class="mt-4">
                            <a href="{{ APP_URL . 'admin/products' }}" class="btn btn-secondary ms-2">
                                <i class="fas fa-arrow-left"></i> Quay lại danh sách
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection