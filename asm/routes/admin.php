<?php

use App\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Admin\UserController as AdminUserController;

$router->filter('admin', function () {
    if (!isset($_SESSION['user']) || $_SESSION['user']->role != 'admin') {
        redirect('login');
    }
});

$router->group(['before' => 'admin'], function ($router) {
    $router->group(['prefix' => 'admin'], function ($router) {
        $router->get('/', [AdminCategoryController::class, 'home']);
        $router->get('/categories', [AdminCategoryController::class, 'index']);
        $router->get('/categories/add', [AdminCategoryController::class, 'add']);
        $router->post('/categories/add', [AdminCategoryController::class, 'store']);
        $router->get('/categories/edit/{id}', [AdminCategoryController::class, 'edit']);
        $router->post('/categories/edit/{id}', [AdminCategoryController::class, 'update']);
        $router->post('/categories/delete/{id}', [AdminCategoryController::class, 'destroy']);

        $router->get('/products', [AdminProductController::class, 'index']);
        $router->get('/products/add', [AdminProductController::class, 'add']);
        $router->post('/products/add', [AdminProductController::class, 'store']);
        $router->get('/products/edit/{id}', [AdminProductController::class, 'edit']);
        $router->post('/products/edit/{id}', [AdminProductController::class, 'update']);
        $router->post('/products/delete/{id}', [AdminProductController::class, 'destroy']);
        $router->get('/products/show/{id}',[AdminProductController::class, 'show']);


        $router->get('/users', [AdminUserController::class, 'index']);
        $router->get('/users/add', [AdminUserController::class, 'add']);
        $router->post('/users/add', [AdminUserController::class, 'store']);
        $router->get('/users/edit/{id}', [AdminUserController::class, 'edit']);
        $router->post('/users/edit/{id}', [AdminUserController::class, 'update']);
        $router->post('/users/delete/{id}', [AdminUserController::class, 'destroy']);
    });
});






// // route movies phim
// $router->get('/admin/movies', [AdminGernesController::class, 'index']);
// $router->get('/admin/movies/add',[AdminGernesController::class, 'add']);
// $router->post('/admin/movies/add',[AdminGernesController::class, 'store']);
// $router->post('admin/movies/delete/{id}', [AdminGernesController::class, 'destroy']);

// $router->get('admin/movies/edit/{id}', [AdminGernesController::class, 'edit']);
// $router->post('/admin/movies/edit/{id}',[AdminGernesController::class, 'update']);
// $router->get('/admin/movies/show/{id}',[AdminGernesController::class, 'show']);
