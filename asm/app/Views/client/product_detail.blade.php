@extends('client.layout')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content')
<div class="container py-4">
    <!-- Sản phẩm -->
    <div class="row bg-light shadow-lg p-4 rounded">


        <div class="col-md-6 text-center">
            <img src="{{ APP_URL . $product->image }}" style="width: 500px; height: 400px;" ; class="img-fluid rounded shadow-lg border border-primary" alt="{{ $product->product_name }}" style="max-width: 80%;">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold text-primary">{{ $product->product_name }}</h2>

            <!-- Hiển thị giá -->
            <p class="fs-4">
                @if($product->promotional_price && $product->promotional_price < $product->price)
                    <span class="text-danger fw-bold">{{ number_format($product->promotional_price, 0, ',', '.') }}đ</span>
                    <del class="text-muted ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</del>
                    @else
                    <span class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                    @endif
            </p>

            <!-- Đánh giá sản phẩm -->
            <p class="Rating">Đánh giá:
                <select class="rounded border-1 p-1" name="rating" id="rating">
                    <option value="1">1 ⭐</option>
                    <option value="2">2 ⭐⭐</option>
                    <option value="3">3 ⭐⭐⭐</option>
                    <option value="4">4 ⭐⭐⭐⭐</option>
                    <option value="5" selected>5 ⭐⭐⭐⭐⭐</option>
                </select>
            </p>

            <!-- Mô tả sản phẩm -->
            <p class="text-muted">{{ $product->description }}</p>

            <!-- Chọn số lượng -->
            <div class="d-flex align-items-center gap-2 mt-3">
                <label for="quantity" class="fw-bold">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control text-center border-secondary" style="width: 80px;">
            </div>

            <!-- Nút thao tác -->
            <div class="d-flex gap-3 mt-4">
                <a href="{{ APP_URL . 'cart' }}" class="btn btn-success btn-lg px-4 shadow">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
                <a href="thanh-toan.php" class="btn btn-danger btn-lg px-4 shadow">
                    <i class="bi bi-lightning-fill"></i> Mua ngay
                </a>
            </div>

        </div>

    </div>


    <!-- Bình luận sản phẩm -->
    <div class="mt-5">
        <h3 class="fw-bold text-info mb-3">💬 Bình luận</h3>
        <div class="bg-white shadow p-4 rounded">
            <!-- Form bình luận -->
            <form method="POST" action="{{ APP_URL .'product/comment' }}">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="comment" rows="3" placeholder="Viết bình luận của bạn..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>

            <!-- Danh sách bình luận -->
            <!-- <div class="mt-4">
                @foreach($comments as $comment)
                <div class="d-flex align-items-start mb-3">
                    <img src="{{ $comment->user->avatar ?? 'https://via.placeholder.com/50' }}" class="rounded-circle me-3" width="50" height="50" alt="User">
                    <div class="bg-light p-3 rounded shadow-sm" style="flex: 1;">
                        <h6 class="fw-bold">{{ $comment->user->name }}</h6>
                        <p class="mb-1">{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                @endforeach
            </div> -->
        </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <div class="mt-5">
        <h3 class="fw-bold text-secondary mb-3">🔹 Sản phẩm liên quan</h3>
        <div class="row">
            @foreach($relatedProducts as $related)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm border-0 h-100 overflow-hidden" style="border-radius: 10px; transition: 0.3s;">
                    <img src="{{ APP_URL . $related->image }}" class="card-img-top" alt="{{ $related->product_name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">{{ $related->product_name }}</h6>
                        <p class="mb-2">
                            @if($related->promotional_price && $related->promotional_price < $related->price)
                                <span class="text-danger fw-bold">{{ number_format($related->promotional_price, 0, ',', '.') }}đ</span>
                                <del class="text-muted ms-2">{{ number_format($related->price, 0, ',', '.') }}đ</del>
                                @else
                                <span class="text-danger fw-bold">{{ number_format($related->price, 0, ',', '.') }}đ</span>
                                @endif
                        </p>
                        <a href="{{ APP_URL .'product/detail/'. $related->id }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



</div>
@endsection