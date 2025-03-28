<?php
class AdminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        require_once './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $ten_danh_muc = $_POST["ten_danh_muc"];
            $mo_ta = $_POST["mo_ta"];
            $ngay_tao = date("Y-m-d H:i:s");

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta, $ngay_tao);
                header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }
    public function formEditDanhMuc()
    {
        $id = $_GET["id_danh_muc"];
        // var_dump($id);die;
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhmuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }
    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST["ten_danh_muc"];
            $mo_ta = $_POST["mo_ta"];

            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Lấy lại thông tin danh mục từ database
                $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

                // Gán lại dữ liệu nhập để giữ lại trên form
                $danhmuc['ten_danh_muc'] = $ten_danh_muc;
                $danhmuc['mo_ta'] = $mo_ta;

                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }



    public function deleteDanhMuc()
{
    $id = $_GET["id_danh_muc"];

    // Kiểm tra xem danh mục có sách hay không
    $hasBooks = $this->modelDanhMuc->checkDanhMucHasBooks($id);

    if ($hasBooks) {
        // Nếu có sách trong danh mục, không thể xóa
        $message = "Không thể xóa danh mục vì danh mục này đang chứa sách.";
        echo "<script>alert('$message'); window.location.href = '" . BASE_URL_ADMIN . "?act=danh-muc';</script>";
        exit();
    } else {
        // Nếu không có sách trong danh mục, tiến hành xóa
        $isDeleted = $this->modelDanhMuc->destroyDanhMuc($id);

        if ($isDeleted) {
            $message = "Xóa danh mục thành công.";
        } else {
            $message = "Đã có lỗi xảy ra khi xóa danh mục.";
        }

        echo "<script>alert('$message'); window.location.href = '" . BASE_URL_ADMIN . "?act=danh-muc';</script>";
        exit();
    }
}

}
