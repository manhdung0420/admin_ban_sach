<?php


session_start();



// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once '../admin/controllers/adminSanPhamController.php';
require_once './controllers/adminDanhMucController.php';
require_once './controllers/adminDonHangController.php';
require_once './controllers/adminBaoCaoThongKeController.php';
require_once './controllers/adminTaiKhoanController.php';
require_once './controllers/adminBinhLuanController.php';


// Require toàn bộ file Models
require_once './models/adminSanPham.php';
require_once './models/adminDanhMuc.php';
require_once './models/adminDonHang.php';
require_once './models/adminTaiKhoan.php';
require_once './models/adminBinhLuan.php';

// Route
$act = $_GET['act'] ?? '/';

// if ($act !== "login-admin" && $act !== "check-login-admin" && $act !== "logout-admin") {
//     checkLoginAdmin();
// }

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route báo cáo thống kê
    '/' => (new adminBaoCaoThongKeController())->home(),


    // route danh mục
    'danh-muc' => (new adminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new adminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new adminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new adminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new adminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new adminDanhMucController())->deleteDanhMuc(),


    //route sản phẩm
    'san-pham' => (new adminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new adminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new adminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new adminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new adminSanPhamController())->postEditSanPham(),
    'sua-album-anh-san-pham' => (new adminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham' => (new adminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham' => (new adminSanPhamController())->detailSanPham(),

    //route binh luan
    'update-trang-thai-binh-luan' => (new adminSanPhamController())->updateTrangThaiBinhLuan(),

    //route đơn hàng
    'don-hang' => (new adminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new adminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new adminDonHangController())->postEditDonHang(),
    // 'xoa-don-hang'=>(new adminDonHangController())->deleteDonHang(),
    'chi-tiet-don-hang' => (new adminDonHangController())->detailDonHang(),

    //route quản lý tài khoản
    //Quản lý tài khoản quản trị
    'list-tai-khoan-quan-tri' => (new adminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new adminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new adminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri' => (new adminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new adminTaiKhoanController())->postEditQuanTri(),

    // route reset password tai khoan
    'reset-password' => (new adminTaiKhoanController())->resetPassword(),


    'list-tai-khoan-khach-hang' => (new adminTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang' => (new adminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new adminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new adminTaiKhoanController())->detailKhachHang(),

    // route quản lý tài khoản cá nhân (quản trị)
    'form-sua-thong-tin-ca-nhan-quan-tri' => (new adminTaiKhoanController())->formEditCaNhanQuanTri(),
    // 'sua-thong-tin-ca-nhan-quan-tri'=>(new adminTaiKhoanController())->postEditCaNhanQuanTri(),

    'sua-mat-khau-ca-nhan-quan-tri' => (new adminTaiKhoanController())->postEditMatKhauCaNhan(),


    //route auth
    'login-admin' => (new adminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new adminTaiKhoanController())->login(),
    'logout-admin' => (new adminTaiKhoanController())->logout(),

    // route đăng ký
    'register-admin' => (new adminTaiKhoanController())->formRegister(),
    'handle-register-admin' => (new adminTaiKhoanController())->register(),

    //bình luận
     // route quản lý đơn hàng
     'binh-luan'=>(new adminBinhLuanController())->danhSachBinhLuan(),
     'xoa-binh-luan'=>(new adminBinhLuanController())->xoaBinhLuan(),
     'detail-binh-luan'=>(new adminBinhLuanController())->chiTietBinhLuan(),
};
