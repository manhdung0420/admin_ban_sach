<?php
class adminBinhLuanController
{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new adminBinhLuan(); // Model quản lý bình luận
    }

    // Hiển thị danh sách bình luận
    public function danhSachBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        // var_dump($listBinhLuan);die;
        require_once './views/binhluan/listBinhLuan.php';
    }

    // Xem chi tiết bình luận
    public function chiTietBinhLuan()
    {
        $id = $_GET["id"];
        $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id);
       
        
        
        if ($binhLuan) {
            require_once './views/binhluan/detailBinhLuan.php';
        } else {
            header("location: " . BASE_URL_ADMIN . "?act=binh-luan");
            exit();
        }
    }

    // Xóa bình luận
    public function xoaBinhLuan()
    {
        $id = $_GET["id"];
        if ($this->modelBinhLuan->deleteBinhLuan($id)) {
            $_SESSION['success'] = "Xóa bình luận thành công!";
        } else {
            $_SESSION['error'] = "Không thể xóa bình luận!";
        }
        header("location: " . BASE_URL_ADMIN . "?act=binh-luan");
        exit();
    }
}
