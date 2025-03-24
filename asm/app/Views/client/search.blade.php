@extends('client.layout')

@section('title', 'Kết quả tìm kiếm')

@section('content')
<h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

@if(!$products)
    <p class="text-muted">Không tìm thấy sản phẩm nào.</p>
@else
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->product_name }}">
                <div class="card-body">
                    <h5>{{ $product->product_name }}</h5>
                    <p>{{ number_format($product->price, 0, ',', '.') }}đ</p>
                    <a href="{{ APP_URL . 'product/detail/' . $product->id }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
