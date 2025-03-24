<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories); // Kiểm tra dữ liệu
        return view('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function store()
    {
        $data = $_POST;
        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['name']) == '') {
            $errors['name'] = 'Bạn chưa nhập tên';
        }
        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.categories.add', compact('categories', 'errors', 'data'));
        }
        // dd($data);
        Category::create($data);

        return redirect("admin/categories");
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update($id)
    {
        $data = $_POST;
        $errors = []; // Cần khai báo mảng lỗi

        // Validate title
        if (trim($data['name']) == '') {
            $errors['name'] = 'Bạn chưa nhập tên';
        }
        if (!empty($errors)) {
            $categories = Category::all();
            return view('admin.categories.edit', compact('categories', 'errors', 'data'));
        }
        Category::update($data, $id);
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        Category::delete($id);
        return redirect('admin/categories');
    }

    public function home()
    {
        return view('admin.index');
    }
}
