<?php

namespace App\Controllers;
class CartController {
    public function index() {
        // Hiển thị giỏ hàng
        return view('client.cart');
    }
}
