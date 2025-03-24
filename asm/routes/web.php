<?php

use App\Controllers\AuthController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\HomeController;



$router->get('/', [HomeController::class, 'index']); // Trang chủ hiển thị tất cả sản phẩm
// $router->get('/products', [ProductController::class, 'index']); // Trang sản phẩm
// $router->get('/category/{categoryId}', [HomeController::class, 'category']);// Lọc sản phẩm theo danh mục
// $router->get('/product_detail', [ProductController::class, 'show']); // Chi tiết sản phẩm
$router->get('/cart', [CartController::class, 'index']); 
$router->get('/checkout', [CheckoutController::class, 'index']); 


$router->get('/product/detail/{id}',[HomeController::class, 'detail']);
$router->get('/category/{id}', [HomeController::class, 'category']);
$router->get('/search', [HomeController::class, 'search']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);
$router->get('/logout', [AuthController::class, 'logout']);

