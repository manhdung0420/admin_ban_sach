<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="./css/layout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
nav.bg-dark {
    min-height: 100vh; /* Đảm bảo chiều cao tối thiểu bằng chiều cao màn hình */
    height: auto; /* Tự động mở rộng theo nội dung */
}




</style>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3" style="width: 250px; height: 1000px;">
            <div class="text-center mb-4">
                <h4>Sneaker Store</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ APP_URL . 'admin' }}" class="nav-link text-white">Trang chủ</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ APP_URL . 'admin/categories' }}" class="nav-link text-white">Danh mục sản phẩm</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ APP_URL . 'admin/products' }}" class="nav-link text-white">Sản phẩm</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ APP_URL . 'admin/users' }}" class="nav-link text-white">User</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
