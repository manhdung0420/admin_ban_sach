<?php

namespace App\Controllers\Admin;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function add()
    {
        return view('admin.users.add');
    }

    public function store()
    {
        $data = $_POST;

        // Mã hóa mật khẩu trước khi lưu vào CSDL
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        
        User::create($data);

        return redirect("admin/users");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $data = $_POST;
        
        // Kiểm tra nếu người dùng có nhập mật khẩu mới thì mã hóa lại, nếu không giữ nguyên mật khẩu cũ
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        } else {
            $data['password'] = $user->password;
        }

        User::update($data, $id);
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        User::delete($id);
        return redirect('admin/users');
    }
}
