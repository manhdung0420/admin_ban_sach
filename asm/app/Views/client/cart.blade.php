@extends('client.layout')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container">
            <h1 class="text-center my-5">Giỏ Hàng</h1>
            <hr class="border border-custom border-2 opacity-75" data-aos="fade-down">
            <div class="alert bg-success opacity-70" >
                <strong id="productAddToCart">“Android Tivi LED Hisense 32 inch 32A4N"</strong> đã được thêm vào giỏ hàng.
            </div>
            <div class="row justify-content-center" data-aos="slide-up" data-aos-duration="800">
                <div class="col-md-8">
                    <h5 class="mb-4">Giỏ hàng</h5>
                    <table class="table table-striped text-center align-middle" style="--bs-emphasis-color: dark">
                        <thead class="table-light align-middle">
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="frameCart">
                                <tr>
                                    <td><img src="#" alt="anhloi"></td>
                                    <td>Tivi LED</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Tổng giỏ hàng -->
                <div class="col-md-4">
                    <h5 class="mb-4">Thanh toán</h5>
                    <div class="card border bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between mb-3" id="total">
                                <span>Tổng:</span>
                                <strong>đ</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-5" id="voucher">
                                <span>Khuyến mãi:</span>
                                <strong class="text-success">đ</strong>
                            </div>
                                <a href="{{ APP_URL . 'checkout' }}" style="text-decoration:none; color:black"> <button class="btn btn-warning w-100" id="buttonOrder">Thanh toán </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
