@extends('client.layout')

@section('title', 'Danh Mục: ' . $category->name)

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold">Danh Mục: {{ $category->name }}</h2>
    
    @if(!$products)
        <p class="text-muted">Không có sản phẩm nào trong danh mục này.</p>
    @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="{{APP_URL . $product->image }}" class="card-img-top img-fixed" alt="{{ $product->product_name }}">
                    <div class="card-body text-center">
                        <h5 class="title-fixed">{{ $product->product_name }}</h5>
                        <p>
                            @if($product->promotional_price && $product->promotional_price < $product->price)
                                <span class="text-danger fw-bold">{{ number_format($product->promotional_price, 0, ',', '.') }}đ</span>
                                <del class="text-muted ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</del>
                            @else
                                <span class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            @endif
                        </p>
                        <a href="{{ APP_URL .'product/detail/'. $product->id }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
