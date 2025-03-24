<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::whereUser('username', '=', $username)->first();

        if($user){
            if(password_verify($password, $user->password)){
                $_SESSION['user'] = $user;
                redirect ('');
            }
            // else{
            //     $error = "Username hoặc password không chính xác";
            // }
        }
        $error = "Username hoặc password không chính xác";
        return view('auth.login', compact('error'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $data = $_POST;
        // Mã hoá password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        User::create($data);
        return redirect('login');
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        return redirect('login');
    }
}