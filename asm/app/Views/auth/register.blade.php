<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-custom {
            width: 100%;
            border-radius: 8px;
        }

        .social-icons a {
            display: inline-block;
            font-size: 24px;
            color: #ff4b2b;
            margin: 0 10px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #ff416c;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-center fw-bold">Đăng ký</h2>
        <p class="text-center text-muted">Tạo tài khoản mới</p>

        @isset($error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endisset

        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label"><i class="bi bi-person"></i> Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="bi bi-lock"></i> Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label"><i class="bi bi-lock-fill"></i> Xác nhận mật khẩu</label>
                <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>

            <button type="submit" class="btn btn-primary btn-custom"><i class="bi bi-person-plus"></i> Đăng ký</button>
            <a href="{{ APP_URL . 'login' }}" class="btn btn-outline-primary btn-custom mt-2"><i class="bi bi-box-arrow-in-right"></i> Đăng nhập</a>

            <div class="text-center mt-3">
                <p class="text-muted">Hoặc đăng ký bằng</p>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
