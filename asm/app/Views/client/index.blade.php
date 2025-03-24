@extends('client.layout')

@section('title', 'Trang chủ')

@section('content')

<style>
    .img-fixed {
        height: 180px;
        /* Điều chỉnh chiều cao ảnh */
        object-fit: cover;
        width: 100%;
    }

    .title-fixed {
        min-height: 50px;
        /* Đảm bảo tiêu đề có chiều cao đồng đều */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-body {
        flex-grow: 1;
    }

    .card-body {
        min-height: 200px;
        /* Điều chỉnh tùy theo nội dung */
    }
</style>

<div class="container py-4">
    <!-- Navigation -->
    <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded shadow-sm">
        <div class="d-flex flex-wrap">
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/iGgv0KnRpY7IbqewjnkjwkIwy61I-DT6ZLz3xoASFug.jpg" alt="Máy lạnh" class="img-fluid" width="50" height="50">
                <p>Máy lạnh</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/yVJnQRsWxx4SLEMblXZMu5vzf2LnoCi8w1-DguKn5a4.jpg" alt="Máy lọc nước" class="img-fluid" width="50" height="50">
                <p>Máy lọc nước</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/0WCcVtAM6K7jB0qzUrF84tUY4ITNC563c7YvQpWBKDA.jpg" alt="Máy giặt" class="img-fluid" width="50" height="50">
                <p>Máy giặt</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/4hp4plMr2z9FAax6t6uAfV8NyxoAmDr2eGWrLNIDeZk.jpg" alt="Nồi cơm điện" class="img-fluid" width="50" height="50">
                <p>Nồi cơm điện</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/UEMlvxwp9OYTnaqh0Zcfh3-5ivMjdlEGwif8nsDvPIk.jpg" alt="Máy nước nóng" class="img-fluid" width="50" height="50">
                <p>Máy nước nóng</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/icSn5q0npUFKWN3yqS4kGOM1G8Ir4TfsHxJNMAmuwkI.jpg" alt="Tivi" class="img-fluid" width="50" height="50">
                <p>Tivi</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/i1Cm6xDB4mhWr3D9mPcL7xk3aUfFdONGiEHKRM5w6dg.jpg" alt="Gia dụng" class="img-fluid" width="50" height="50">
                <p>Gia dụng</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/Tg_WcbORSUGOjzaeT8doM-8TYgBteP5yguePsdJr3x4.jpg" alt="Máy lọc không khí" class="img-fluid" width="50" height="50">
                <p>Máy lọc không khí</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/-7G7edgDrD0QbLdwR8JhuJS-OBTKQj4NET6Ft-DO78w.jpg" alt="Máy sấy quần áo" class="img-fluid" width="50" height="50">
                <p>Máy sấy quần áo</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/8QA8umnrekUYha_CHO8zeW7dZqM-IFmpOm7K3melv50.jpg" alt="Hút bụi" class="img-fluid" width="50" height="50">
                <p>Hút bụi</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/n4gTbeQczVn_Z9R1DIuvdir9Fd0gqKvKJ6suzKbsQ88.jpg" alt="Loa" class="img-fluid" width="50" height="50">
                <p>Loa</p>
            </div>
            <div class="text-center mx-2">
                <img src="https://storage.googleapis.com/a1aa/image/Yq2fDUCOF1h26hw_3wwJPb_NBrxuAB8S4CoNXqZuSc0.jpg" alt="Tất cả danh mục" class="img-fluid" width="50" height="50">
                <p>Tất cả danh mục</p>
            </div>
        </div>
    </div>
    <!-- Promotion Section -->
    <div class="mt-4 bg-white p-4 rounded shadow-sm">
        <h2 class="h4 font-weight-bold mb-4">Khuyến mãi Online</h2>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex">
                <button class="btn btn-danger mx-1">FLASH SALE GIÁ SỐC</button>
                <button class="btn btn-primary mx-1">MÁY LẠNH GIẢM SỐC</button>
                <button class="btn btn-warning mx-1">TỦ LẠNH GIẢM ĐẾN 1 TRIỆU</button>
                <button class="btn btn-secondary mx-1">HÀNG CAO CẤP</button>
            </div>
        </div>

        <div class="d-flex  align-items-center mb-4">
            @foreach ($categories as $cate)
            <div class="d-flex">
                <button class="btn btn-light mx-1">{{ $cate->name }}</button>
            </div>
            @endforeach
        </div>

        <!-- Product List -->
        <div class="row">
            @foreach($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <!-- Cố định chiều cao ảnh -->
                    <img src="{{ $product->image }}" class="card-img-top img-fixed" alt="">

                    <div class="card-body d-flex flex-column">
                        <!-- Đặt chiều cao cố định cho tiêu đề -->
                        <h5 class="card-title text-center title-fixed">{{ $product->product_name }}</h5>

                        <p class="card-text text-center">
                            @if($product->promotional_price && $product->promotional_price < $product->price)
                                <span class="text-danger fw-bold">{{ number_format($product->promotional_price, 0, ',', '.') }}đ</span>
                                <del class="text-muted ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</del>
                            @else
                                <span class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            @endif
                        </p>

                        <!-- Đảm bảo nút nằm ở dưới cùng -->
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ APP_URL . 'product/detail/' . $product->id }}" class="btn btn-primary">Xem chi tiết</a>
                            <a href="{{ APP_URL . 'checkout' }}" class="btn btn-warning">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- <a href="{{ APP_URL . 'admin/products/edit/' . $pro->id }}" class="btn btn-secondary">Edit</a> -->

    </div>
    

    <div class="mt-4 bg-white p-4 rounded shadow-sm">
        <h2 class="fw-bold mb-4 text-center">Sản Phẩm Đặc Quyền</h2>
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="https://storage.googleapis.com/a1aa/image/umR5-EwTcqtoWD0AskmbaKhyxtupMk6aShOt0tsPkg0.jpg"
                    alt="Banner quảng cáo" class="img-fluid rounded" style="width: 400px; height: 500px;">
            </div>

            <div class="col-md-8">
                <div class="row g-3">
                    <!-- Sản phẩm 1 -->
                    <div class="col-md-3">
                        <div class="card p-3 shadow-sm">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Mẫu mới</span>
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Trả góp 0%</span>
                            <img src="https://storage.googleapis.com/a1aa/image/Ugk4AEfT_gVygIwt5AUSjl20d2VGwEBqKMCyODwi2w0.jpg" class="card-img-top rounded" alt="LG Inverter">
                            <div class="card-body text-center">
                                <h6 class="card-title">LG Inverter 335 lit LT383BLG</h6>
                                <p class="text-danger fw-bold mb-1">11.250.000₫</p>
                                <p class="text-muted text-decoration-line-through small">14.490.000₫</p>
                                <p class="text-success small">Giảm 24%</p>
                                <p class="text-warning"><i class="fas fa-star"></i> 5 • Đã bán 35</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm 2 -->
                    <div class="col-md-3">
                        <div class="card p-3 shadow-sm">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Mẫu mới</span>
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Trả góp 0%</span>
                            <img src="https://storage.googleapis.com/a1aa/image/zMnbcibK0H2UIrpOA_XHZM2jAVPm1Hw7Av8uBbtuMFQ.jpg" class="card-img-top rounded" alt="LG Smart TV">
                            <div class="card-body text-center">
                                <h6 class="card-title">LG Smart TV NanoCell 43NANO81TNA</h6>
                                <p class="text-danger fw-bold mb-1">10.890.000₫</p>
                                <p class="text-muted text-decoration-line-through small">13.900.000₫</p>
                                <p class="text-success small">Giảm 21%</p>
                                <p class="text-warning"><i class="fas fa-star"></i> 4.9 • Đã bán 4k</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm 3 -->
                    <div class="col-md-3">
                        <div class="card p-3 shadow-sm">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Mẫu mới</span>
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Trả góp 0%</span>
                            <img src="https://storage.googleapis.com/a1aa/image/BnDAlD_ERvDOJRFUvqE6ICwdNZsDIGp2q3xbFDi2LIo.jpg" class="card-img-top rounded" alt="Máy giặt Panasonic">
                            <div class="card-body text-center">
                                <h6 class="card-title">Panasonic Inverter Giặt 10.5Kg</h6>
                                <p class="text-danger fw-bold mb-1">13.490.000₫</p>
                                <p class="text-success small">Giảm thêm 500.000₫</p>
                                <p class="text-warning"><i class="fas fa-star"></i> 4.9 • Đã bán 5.9k</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm 4 -->
                    <div class="col-md-3">
                        <div class="card p-3 shadow-sm">
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Trả góp 0%</span>
                            <img src="https://storage.googleapis.com/a1aa/image/tLXbspACBA-Fe3WscaOHd8DVgkOQS0LP76I7Vxy9GkU.jpg" class="card-img-top rounded" alt="Máy rửa chén Bosch">
                            <div class="card-body text-center">
                                <h6 class="card-title">Máy rửa chén Bosch SMS2ITI11G</h6>
                                <p class="text-danger fw-bold mb-1">13.300.000₫</p>
                                <p class="text-muted text-decoration-line-through small">18.990.000₫</p>
                                <p class="text-success small">Giảm 30%</p>
                                <p class="text-success small">Quà 700.000₫</p>
                                <p class="text-warning"><i class="fas fa-star"></i> 4.9 • Đã bán 12k</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- row -->
            </div> <!-- col-md-10 -->
        </div> <!-- row -->
    </div>

</div>
@endsection