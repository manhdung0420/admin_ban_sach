<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="./css/layout.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Banner -->
    <div class="banner text-center text-white py-4"
        style="background: url('{{ APP_URL }}images/banner.jpg') center/cover no-repeat; position: relative;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 69, 0);"></div>
        <div class="position-relative">
            <h1 class="fw-bold">Chào mừng bạn đến với cửa hàng của chúng tôi</h1>
            <p>Chuyên cung cấp sản phẩm chất lượng cao</p>
        </div>
    </div>


    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ APP_URL }}">
                <img src="https://png.pngtree.com/png-clipart/20230922/original/pngtree-tv-logo-design-element-white-illustration-vector-png-image_12649012.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">

            </a>

            <!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Dropdown Danh Mục -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh mục</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ APP_URL . 'category/' .  $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ APP_URL }}">Trang chủ</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Sản phẩm</a></li> -->
                </ul>

                <!-- Search Box -->
                <form class="d-flex" action="{{ APP_URL . 'search' }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Bạn tìm gì?" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Tìm</button>
                </form>

                <!-- User & Cart -->
                <ul class="navbar-nav ms-3">
                    @if(isset($_SESSION['user']))
                    <li class="nav-item"><a class="nav-link" href="{{ APP_URL . 'logout' }}">Đăng xuất</a></li>

                    @if($_SESSION['user']->role === 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ APP_URL . 'admin/products' }}">Admin</a></li>
                    @endif
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ APP_URL . 'login' }}">Đăng nhập</a></li>
                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{ APP_URL . 'cart' }}">Giỏ hàng</a></li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <!-- Cột thông tin -->
                <div class="col-md-4 text-center text-md-start">
                    <h5>Về chúng tôi</h5>
                    <p>Chuyên cung cấp sản phẩm chất lượng cao với giá tốt nhất.</p>
                </div>

                <!-- Cột liên kết nhanh -->
                <div class="col-md-4 text-center">
                    <h5>Liên kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Trang chủ</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sản phẩm</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Liên hệ</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Chính sách bảo mật</a></li>
                    </ul>
                </div>

                <!-- Cột liên hệ & mạng xã hội -->
                <div class="col-md-4 text-center text-md-end">
                    <h5>Liên hệ</h5>
                    <p>Email: dungdmph49130@gmail.com</p>
                    <p>Điện thoại: 0123 456 789</p>
                    <div class="d-flex justify-content-center justify-content-md-end gap-2">
                        <a href="#" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter fs-4"></i></a>
                    </div>
                </div>
            </div>

            <hr class="bg-light my-3">
            <p class="text-center mb-0">&copy; 2025 Đỗ Mạnh Dũng. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>