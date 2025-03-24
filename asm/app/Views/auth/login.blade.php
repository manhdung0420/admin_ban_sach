<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
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
            color: #2575fc;
            margin: 0 10px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #6a11cb;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center fw-bold">Đăng nhập</h2>
        <p class="text-center text-muted">Vui lòng đăng nhập để tiếp tục</p>

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
                <label for="password" class="form-label"><i class="bi bi-lock"></i> Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit" class="btn btn-primary btn-custom"><i class="bi bi-box-arrow-in-right"></i> Đăng nhập</button>
            <a href="{{ APP_URL . 'register' }}" class="btn btn-outline-primary btn-custom mt-2"><i class="bi bi-person-plus"></i> Đăng ký</a>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none text-muted">Quên mật khẩu?</a>
            </div>

            <div class="text-center mt-3 social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-google"></i></a>
            </div>
        </form>
    </div>
</body>

</html>
