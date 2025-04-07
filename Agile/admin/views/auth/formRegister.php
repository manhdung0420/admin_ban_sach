<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký tài khoản</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2>Đăng ký tài khoản</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION["error"]) && $_SESSION["flash"]) : ?>
                    <div class="alert alert-danger"><?= $_SESSION["error"] ?></div>
                <?php endif; ?>

                <form action="<?= BASE_URL_ADMIN . "?act=handle-register-admin" ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Cột bên trái -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ho_ten">Họ tên:</label>
                                <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>
                            </div>


                            <div class="form-group">
                                <label for="gioi_tinh">Giới tính:</label>
                                <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Khác</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                        </div>

                        <!-- Cột bên phải -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="so_dien_thoai">Số điện thoại:</label>
                                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
                            </div>

                            

                            <div class="form-group">
                                <label for="confirm">Nhập lại mật khẩu:</label>
                                <input type="password" class="form-control" id="confirm" name="confirm" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </form>

                <p class="mt-3 text-center">Đã có tài khoản? <a href="<?= BASE_URL_ADMIN ?>?act=login-admin">Đăng nhập</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
