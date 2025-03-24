<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController
{

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('client.index', compact('categories', 'products'));
    }

    public function detail($id)
    {
        // Lấy thông tin sản phẩm theo ID
        $product = Product::find($id);
        // Lấy danh sách sản phẩm liên quan (cùng danh mục, loại trừ sản phẩm hiện tại)

        
        $relatedProducts = Product::whereTable('category_id', '=', $product->category_id)
            ->andWhere('id', '!=', $id)
            ->get();
        return view('client.product_detail', compact('product', 'relatedProducts'));
    }

    public function category($id)
    {
        // Lấy thông tin danh mục
        $category = Category::find($id);

        // Lấy danh sách sản phẩm theo danh mục
        $products = Product::whereTable('category_id', '=', $id)
        ->get();
        // dd($products);
        // $products = collect($products);

        // Trả về view danh sách sản phẩm theo danh mục
        return view('client.category', compact('category', 'products'));
    }

    public function search()
{
    // Lấy từ khóa tìm kiếm
    $query = $_GET['query'] ?? '';


    // Tìm kiếm sản phẩm theo tên (hoặc mô tả)
    $products = Product::whereTable('product_name', 'LIKE', "%$query%")
                       ->orWhere('description', 'LIKE', "%$query%")
                       ->get();

    // Trả về view hiển thị kết quả tìm kiếm
    return view('client.search', compact('products', 'query'));
}

}
