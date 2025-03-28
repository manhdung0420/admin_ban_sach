<?php
class adminSanPhamController
{
    public $modleSanPham;
    public $modleDanhMuc;
    public function __construct()
    {
        $this->modleSanPham = new adminSanPham();
        $this->modleDanhMuc = new adminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modleSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        // dùng để hiển thị form nhập
        $listDanhMuc = $this->modleDanhMuc->getAllDanhMuc();

        require_once './views/sanpham/addSanPham.php';

        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // Kiểm tra phương thức POST
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Lấy dữ liệu từ form
            $ten_sach = $_POST["ten_sach"] ?? '';
            $tac_gia = $_POST["tac_gia"] ?? '';
            $the_loai = $_POST["the_loai"] ?? '';
            $so_luong = $_POST["so_luong"] ?? '';
            $gia = $_POST["gia"] ?? '';
            $danh_muc_id = $_POST["danh_muc_id"] ?? '';
            $mo_ta = $_POST["mo_ta"] ?? '';
            $ngay_tao = date("Y-m-d H:i:s");

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            // Mảng lưu trữ lỗi
            $errors = [];
            if (empty($ten_sach)) {
                $errors['ten_sach'] = 'Tên sản phẩm không được trống';
            }
            if (empty($tac_gia)) {
                $errors['tac_gia'] = 'Tác giả không được trống';
            }
            if (empty($the_loai)) {
                $errors['the_loai'] = 'Thể loại không được trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được trống';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá không được trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục không được trống';
            }
            if (!isset($hinh_anh) || $hinh_anh['error'] !== UPLOAD_ERR_OK) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }

            // Lưu lỗi vào session
            $_SESSION["error"] = $errors;

            // Nếu không có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Thêm sản phẩm
                $san_pham_id = $this->modleSanPham->insertSanPham(
                    $ten_sach,
                    $tac_gia,
                    $the_loai,
                    $so_luong,
                    $gia,
                    $danh_muc_id,
                    $mo_ta,
                    $file_thumb,
                    $ngay_tao
                    

                );

                // Xử lý thêm album ảnh sản phẩm
                if (!empty($_FILES['img_array']['name'][0])) {
                    foreach ($_FILES['img_array']['name'] as $key => $value) {
                        $file = [
                            'name' => $_FILES['img_array']['name'][$key],
                            'type' => $_FILES['img_array']['type'][$key],
                            'tmp_name' => $_FILES['img_array']['tmp_name'][$key],
                            'error' => $_FILES['img_array']['error'][$key],
                            'size' => $_FILES['img_array']['size'][$key]
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modleSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Trả về form và lỗi
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }



    public function formEditSanPham()
    {
        // dùng để hiển thị form nhập
        //lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET["id_san_pham"];
        $sanPham = $this->modleSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modleSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modleDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
        // var_dump($danhmuc);
        // die();


    }

    public function postEditSanPham()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Retrieve old product data
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $sanPhamOld = $this->modleSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh'];

            // Retrieve form data
            $ten_sach = $_POST["ten_sach"] ?? '';
            $tac_gia = $_POST["tac_gia"] ?? '';
            $the_loai = $_POST["the_loai"] ?? '';
            $so_luong = $_POST["so_luong"] ?? '';
            $gia = $_POST["gia"] ?? '';
            $danh_muc_id = $_POST["danh_muc_id"] ?? '';
            $mo_ta = $_POST["mo_ta"] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Validate input
            $errors = [];
            if (empty($ten_sach)) {
                $errors['ten_sach'] = 'Tên sản phẩm không được trống';
            }
            if (empty($tac_gia)) {
                $errors['tac_gia'] = 'Tác giả không được trống';
            }
            if (empty($the_loai)) {
                $errors['the_loai'] = 'Thể loại không được trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được trống';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá không được trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục không được trống';
            }

            $_SESSION["error"] = $errors;

            // File upload logic
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            // Update product if no errors
            if (empty($errors)) {
                $this->modleSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_sach,
                    $tac_gia,
                    $the_loai,
                    $so_luong,
                    $gia,
                    $danh_muc_id,
                    $mo_ta,
                    $new_file
                );

                

                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }



    // Sưae album ảnh
    // - sửa ảnh cũ
    // +Thêm ảnh mới
    // +Không thêm ảnh mới
    // - không sửa ảnh cũ
    // +thêm ảnh mới
    // +Không thêm ảnh mới
    // -xóa ảnh cũ
    // +thêm ảnh mới
    // +Không thêm ảnh mới

    public function postEditAnhSanPham()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $san_pham_id = $_POST["san_pham_id"];

            //lấy danh sách ảnh hiện tại cuar sản phẩm
            $listAnhSanPhamCurrent = $this->modleSanPham->getListAnhSanPham($san_pham_id);

            //Xử lý các ảnh được gửi từ form
            $img_array = $_FILES["img_array"];
            $img_delete = isset($_POST["img_delete"]) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST["current_img_ids"] ?? [];

            // khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // làm ảnh mới vào db và xóa ảnh cũ nếu có
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modleSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // cập nhật ảnh cũ
                    $this->modleSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    //Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    //Thêm ảnh mới
                    $this->modleSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            // Xử lý xóa ảnh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // xóa ảnh
                    $this->modleSanPham->destroyAnhSanPham($anh_id);

                    // xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }


    public function deleteSanPham()
    {
        $id = $_GET["id_san_pham"];
        $sanPham = $this->modleSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modleSanPham->getListAnhSanPham($id);


        if ($sanPham) {
            deleteFile($sanPham["hinh_anh"]);
            $this->modleSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile(($anhSP["link_hinh_anh"]));
                $this->modleSanPham->destroyAnhSanPham($anhSP["id"]);
            }
        }

        header("location:" . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }

    public function detailSanPham()
    {
        // dùng để hiển thị form nhập
        //lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET["id_san_pham"];

        $sanPham = $this->modleSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modleSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modleSanPham->getBinhLuanFromSanPham($id);

        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
        // var_dump($danhmuc);
        // die();


    }


    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
        $binhLuan = $this->modleSanPham->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modleSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("location:" . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan["tai_khoan_id"]);
                } else {
                    header("location:" . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan["san_pham_id"]);
                }
            }
        }
    }
}
