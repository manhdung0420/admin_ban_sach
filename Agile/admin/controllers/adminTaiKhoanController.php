<?php
class adminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
        $this->modelDonHang = new adminDonHang();
        $this->modelSanPham = new adminSanPham();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        // var_dump($listQuanTri);die;
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        // dùng để xử lý thêm dữ liệu
        // var_dump($_POST);
        //kiểm tra xem dữ liệu có phải được submit lên không
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // lấy ra dữ liệu
            $ho_ten = $_POST["ho_ten"];
            $email = $_POST["email"];

            // tạo một mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được trống';
            }

            $_SESSION['error'] = $errors;



            // nếu ko có lỗi thì tiến hành thêm danh mục
            if (empty($errors)) {
                // nếu không có lỗi thì tiến hành thêm danh mục
                //đặt password mặc định - 123@123ab
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($password);die;
                $chuc_vu_id = 1;
                $abc = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                // var_dump($abc);die;
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // trả về form và lỗi
                header("location:" . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function formEditQuanTri()
    {
        $quan_tri_id = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($quan_tri_id);
        // var_dump($quanTri);die;
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    public function postEditQuantri()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Retrieve old product data

            $quan_tri_id = $_POST['quan_tri_id'] ?? '';

            $ho_ten = $_POST["ho_ten"] ?? '';
            $email = $_POST["email"] ?? '';
            $so_dien_thoai = $_POST["so_dien_thoai"] ?? '';
            $trang_thai = $_POST["trang_thai"] ?? '';



            // Validate input

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được trống';
            }
            if (empty($email)) {
                $errors['email'] = 'email người dùng không được trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }


            $_SESSION["error"] = $errors;
            // var_dump($errors);die;



            // Update product if no errors
            if (empty($errors)) {
                // var_dump('abc');die;
                $abc = $this->modelTaiKhoan->updateTaiKhoan(
                    $quan_tri_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $trang_thai
                );
                // var_dump($abc);die;
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }


    public function resetPassword()
    {
        $tai_khoan_id = $_GET["id_quan_tri"];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        // var_dump($status);die;
        if ($status && $tai_khoan["chuc_vu_id"] == 1) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status && $tai_khoan["chuc_vu_id"] == 2) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump("lỗi khi reset tài khoản");
            die;
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        // var_dump($listQuanTri);die;
        require_once './views/taikhoan/khachhang/listkhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die;
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }

    public function postEditKhachHang()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Retrieve old product data

            $khach_hang_id = $_POST['khach_hang_id'] ?? '';

            $ho_ten = $_POST["ho_ten"] ?? '';
            $email = $_POST["email"] ?? '';
            $so_dien_thoai = $_POST["so_dien_thoai"] ?? '';
            $ngay_sinh = $_POST["ngay_sinh"] ?? '';
            $gioi_tinh = $_POST["gioi_tinh"] ?? '';
            $dia_chi = $_POST["dia_chi"] ?? '';
            $trang_thai = $_POST["trang_thai"] ?? '';



            // Validate input

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được trống';
            }
            if (empty($email)) {
                $errors['email'] = 'email người dùng không được trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'ngày sinh người dùng không được trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'giới tính người dùng không được trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }


            $_SESSION["error"] = $errors;
            // var_dump($errors);die;



            // Update product if no errors
            if (empty($errors)) {
                // var_dump('abc');die;
                $abc = $this->modelTaiKhoan->updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai
                );
                // var_dump($abc);die;
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }


    public function detailKhachHang()
    {
        $id_khach_hang = $_GET["id_khach_hang"];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        // var_dump($listBinhLuan);die;

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }



    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //lấy email và pass gửi lên từ form
            $email = $_POST["email"];
            $password = $_POST["password"];

            // var_dump($password);die;

            // Xử lý kiểm tra thông tin đăng nhập

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // Truơngf hợp đănh nhập thành công
                // Lưu thông tin vào session
                $_SESSION["user_admin"] = $user;
                header("location:" . BASE_URL_ADMIN);
                exit();
            } else {
                // lỗi thì lưu lỗi vào session
                $_SESSION["error"] = $user;
                // var_dump($_SESSION["error"]);die;

                $_SESSION["flash"] = true;

                header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION["user_admin"])) {
            unset($_SESSION["user_admin"]);
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
    }


    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION["user_admin"];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
        // var_dump($thongTin);die;
        require_once "./views/taikhoan/canhan/editCaNhan.php";
        deleteSessionError();
    }

    public function postEditMatKhauCaNhan()
    {
        // var_dump($_POST);die;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $old_pass = $_POST["old_pass"];
            $new_pass = $_POST["new_pass"];
            $confirm_pass = $_POST["confirm_pass"];
            // var_dump($old_pass);die;



            // lấy thông tin user từ sesion
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION["user_admin"]);
            // var_dump($user);die;

            $checkPass = password_verify($old_pass, $user["mat_khau"]);

            $errors = [];

            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng đièn trường dữ liệu này';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng đièn trường dữ liệu này';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng đièn trường dữ liệu này';
            }

            $_SESSION["error"] = $errors;

            if (!$errors) {
                //Thực hiện đổi mật khẩu
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user["id"], $hashPass);
                if ($status) {
                    $_SESSION["success"] = "Đã đổi mật khẩu thành công";
                    $_SESSION["flash"] = true;
                    header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                }
            } else {
                $_SESSION["flash"] = true;

                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }


    public function formRegister()
    {
        require_once './views/auth/formRegister.php';
        deleteSessionError();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            if ($password !== $confirm) {
                $_SESSION['error'] = 'Mật khẩu xác nhận không đúng!';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=register-admin');
                exit();
            }

            $check = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
            if ($check) {
                $_SESSION['error'] = 'Email đã tồn tại!';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=register-admin');
                exit();
            }

            

            $ho_ten = $_POST['ho_ten'];
            // $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $gioi_tinh = $_POST['gioi_tinh'];
            // $dia_chi = $_POST['dia_chi'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // // Xử lý ảnh
            // $anh_dai_dien = null;
            // if (!empty($_FILES['anh_dai_dien']['name'])) {
            //     $targetDir = "./public/uploads/";
            //     $fileName = time() . '_' . basename($_FILES["anh_dai_dien"]["name"]);
            //     $targetFile = $targetDir . $fileName;
            //     if (move_uploaded_file($_FILES["anh_dai_dien"]["tmp_name"], $targetFile)) {
            //         $anh_dai_dien = $fileName;
            //     }
            // }

            $result = $this->modelTaiKhoan->createUser([
                'ho_ten' => $ho_ten,
                // 'anh_dai_dien' => $anh_dai_dien,
                // 'ngay_sinh' => $ngay_sinh,
                'email' => $email,
                'so_dien_thoai' => $so_dien_thoai,
                'gioi_tinh' => $gioi_tinh,
                // 'dia_chi' => $dia_chi,
                'mat_khau' => $hashedPassword
            ]);
            // var_dump($result);die;

            if ($result) {
                $_SESSION['success'] = 'Đăng ký thành công!';
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
            } else {
                $_SESSION['error'] = 'Đăng ký thất bại.';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=register-admin');
            }
        }
    }
}
