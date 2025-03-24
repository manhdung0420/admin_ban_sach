<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::select(['products.*', 'name'])
            ->join('categories', 'category_id', 'id')
            ->orderByDesc('id')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function store()
    {
        $data = $_POST;
        // dd($data);
        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['product_name']) == '') {
            $errors['product_name'] = 'Bạn chưa nhập tiêu đề';
        }
        if (trim($data['description']) == '') {
            $errors['description'] = 'Bạn chưa nhập mô tả';
        }
        if (trim($data['price']) == '') {
            $errors['price'] = 'Bạn chưa nhập giá';
        }

        $image = ""; // Trường hợp người dùng không nhập ảnh
        // Xử lý hình ảnh
        $file = $_FILES['image'];
        $imgs = ['jpg', 'jpeg', 'png', 'gif'];

        $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'],  $image);
        }
        // Đưa thuộc tính image vào data
        $data['image'] = $image;
        // dd($data);
        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.products.add', compact('categories', 'errors', 'data'));
        }
        Product::create($data);


        return redirect("admin/products");
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update($id)
    {
        $product = Product::find($id);

        $data = $_POST;
        // $errors = []; // Cần khai báo mảng lỗi

        // // Validate title
        // if (trim($data['product_name']) == '') {
        //     $errors['product_name'] = 'Bạn chưa nhập tiêu đề';
        // }
        // if (trim($data['description']) == '') {
        //     $errors['description'] = 'Bạn chưa nhập mô tả';
        // }
        // if (trim($data['price']) == '') {
        //     $errors['price'] = 'Bạn chưa nhập giá';
        // }
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            // Xóa ảnh cũ nếu tồn tại
            if (!empty($product->image) && file_exists($product->image)) {
                unlink($product->image);
            }

            // Lưu ảnh mới
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $data['image'] = $image;
        } else {
            $data['image'] = $product->image; // Giữ ảnh cũ nếu không thay đổi
        }

        // Chuyển đổi datetime-local thành TIMESTAMP
        if (!empty($data['creates_at'])) {
            $data['creates_at'] = date('Y-m-d H:i:s', strtotime($data['creates_at']));
        }
        // if (!empty($errors)) {
        //     $products = Product::all();
        //     return view('admin.products.edit', compact('products', 'errors', 'data'));
        // }

        Product::update($data, $id);
        return redirect('admin/products');
    }

    public function destroy($id)
    {
        Product::delete($id);
        return redirect('admin/products');
    }

    public function show($id)
    {
        // Lấy thông tin phim cùng với tên thể loại
        $product = Product::select(['products.*', 'name']) // Chỉ định rõ tên cột
            ->join('categories', 'category_id', 'id')
            ->where('products.id', '=', $id) // Đảm bảo where sử dụng products.id
            ->first();
        // dd($product);
        return view('admin.products.show', compact('product'));
    }
}
