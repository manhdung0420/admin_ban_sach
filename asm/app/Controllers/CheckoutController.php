<?php

namespace App\Controllers;
class CheckoutController {
    public function index() {
        // Hiển thị trang thanh toán
        return view('client.checkout');
    }
}
