<?php 
class adminDonHangController
{
    public $modleDonHang;
    
    public function __construct()
    {
        $this->modleDonHang = new adminDonHang();
        
    }
    public function danhSachDonHang(){
        $listDonHang = $this->modleDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }

    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];

        // lấy thông tin đơn hàng ở bảng đơn hàng
        $donHang = $this->modleDonHang->getDetailDonHang($don_hang_id);

        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs;
        $sanPhamDonHang = $this->modleDonHang->getListSpDonHang($don_hang_id);
        // var_dump($sanPhamDonHang);die;

        $listTrangThaiDonHang = $this->modleDonHang->getAllTrangThaiDonHang();
        
        require_once './views/donhang/detailDonHang.php';
    }
    


    public function formEditDonHang(){
        // dùng để hiển thị form nhập
        //lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET["id_don_hang"];
        $donHang = $this->modleDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modleDonHang->getAllTrangThaiDonHang($id);
        
        if($donHang){
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        }else{
            header("location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
        }
    }

    public function postEditDonHang() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Retrieve old product data
            
            $don_hang_id = $_POST['don_hang_id'] ?? '';
            
            $ten_nguoi_nhan = $_POST["ten_nguoi_nhan"] ?? '';
            $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"] ?? '';
            $email_nguoi_nhan = $_POST["email_nguoi_nhan"] ?? '';
            $dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"] ?? '';
            $ghi_chu = $_POST["ghi_chu"] ?? '';
            $trang_thai_id = $_POST["trang_thai_id"] ?? '';
           


    
            // Validate input

            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên Người nhận không được trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Sdt người nhận không được trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'email nguoi nhan không được trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'địa chỉ không được trống';
            }
            
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'trạng thái id phải chọn';
            }


            $_SESSION["error"] = $errors;
            // var_dump($errors);die;
    
           
            
            // Update product if no errors
            if (empty($errors)) {
                // var_dump('abc');die;
                 $abc= $this->modleDonHang->updateDonHang( 
                                                $don_hang_id,
                                                $ten_nguoi_nhan,
                                                $sdt_nguoi_nhan, 
                                                $email_nguoi_nhan, 
                                                $dia_chi_nguoi_nhan,
                                                $ghi_chu, 
                                                $trang_thai_id 
                                            );   
                // var_dump($abc);die;
                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }

//     // Sưae album ảnh
//     // - sửa ảnh cũ
//     // +Thêm ảnh mới
//     // +Không thêm ảnh mới
//     // - không sửa ảnh cũ
//     // +thêm ảnh mới
//     // +Không thêm ảnh mới
//     // -xóa ảnh cũ
//     // +thêm ảnh mới
//     // +Không thêm ảnh mới

//     public function postEditAnhSanPham(){
//         if ($_SERVER["REQUEST_METHOD"] == 'POST') {
//             $san_pham_id = $_POST["san_pham_id"] ?? '';

//             //lấy danh sách ảnh hiện tại cuar sản phẩm
//             $listAnhSanPhamCurrent = $this->modleSanPham->getListAnhSanPham($san_pham_id);

//             //Xử lý các ảnh được gửi từ form
//             $img_array = $_FILES["img_array"];
//             $img_delete = isset($_POST["img_delete"]) ? explode(',', $_POST['img_delete']) : [];
//             $current_img_ids = $_POST["current_img_ids"] ?? [];

//             // khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
//             $upload_file = [];

//             // Upload ảnh mới hoặc thay thế ảnh cũ
//             foreach($img_array['name'] as $key => $value){
//                 if($img_array['error'][$key] == UPLOAD_ERR_OK){
//                     $new_file = uploadFileAlbum($img_array, './uploads/', $key);
//                     if($new_file){
//                         $upload_file[] = [
//                             'id'=> $current_img_ids[$key] ?? null,
//                             'file' => $new_file
//                         ];
//                     }
//                 }
//             }

//             // làm ảnh mới vào db và xóa ảnh cũ nếu có
//             foreach($upload_file as $file_info){
//                 if($file_info['id']){
//                     $old_file = $this->modleSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

//                     // cập nhật ảnh cũ
//                     $this->modleSanPham->updateAnhSanPham($file_info['id'],$file_info['file']);

//                     //Xóa ảnh cũ
//                     deleteFile($old_file);
//                 }else{
//                     //Thêm ảnh mới
//                     $this->modleSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
//                 }
//             }

//             // Xử lý xóa ảnh
//             foreach($listAnhSanPhamCurrent as $anhSP){
//                 $anh_id = $anhSP['id'];
//                 if(in_array($anh_id, $img_delete)){
//                     // xóa ảnh
//                     $this->modleSanPham->destroyAnhSanPham($anh_id);

//                     // xóa file
//                     deleteFile($anhSP['link_hinh_anh']);
//                 }
//             }
//             header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
//             exit();
//         }
//     }
    

// //     public function postEditDanhMuc(){
// //         // dùng để xử lý thêm dữ liệu
// //         // var_dump($_POST);
// //         //kiểm tra xem dữ liệu có phải được submit lên không
// //         if($_SERVER['REQUEST_METHOD']=='POST'){
// //             // lấy ra dữ liệu
// //             $id = $_POST['id'];
// //             $ten_danh_muc=$_POST["ten_danh_muc"];
// //             $mo_ta=$_POST["mo_ta"];

// //             // tạo một mảng trống để chứa dữ liệu
// //             $errors = [];
// //             if(empty($ten_danh_muc)){
// //                 $errors['ten_danh_muc']= 'tên danh mục không được trống';
// //             }

// //             // nếu ko có lỗi thì tiến hành sửa danh mục
// //             if(empty($errors)){
// //                 // nếu không có lỗi thì tiến sửa thêm danh mục

// //                 $this->modleDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
// //                 header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
// //                 exit();
// //             }else{
// //                 // trả về form và lỗi
// //                 $danhmuc = ["id"=> $id, "ten_danh_muc"=>$ten_danh_muc, "mo_ta" =>$mo_ta];
// //                  require_once './views/danhmuc/editDanhMuc.php';

// //             }
// //         }
// //     }

//     public function deleteSanPham(){
//         $id = $_GET["id_san_pham"];
//         $sanPham = $this->modleSanPham->getDetailSanPham($id);

//         $listAnhSanPham = $this->modleSanPham->getListAnhSanPham($id);
        

//         if($sanPham){
//             deleteFile($sanPham["hinh_anh"]);
//             $this->modleSanPham->destroySanPham($id);
            
//         }
//         if($listAnhSanPham){
//             foreach($listAnhSanPham as $key=>$anhSP){
//                 deleteFile(($anhSP["link_hinh_anh"]));
//                 $this->modleSanPham->destroyAnhSanPham($anhSP["id"]);
//             }
//         }

//         header("location:" . BASE_URL_ADMIN . '?act=san-pham');
//                 exit();
//     }

//     public function detailSanPham(){
//         // dùng để hiển thị form nhập
//         //lấy ra thông tin của sản phẩm cần sửa
//         $id = $_GET["id_san_pham"];

//         $sanPham = $this->modleSanPham->getDetailSanPham($id);

//         $listAnhSanPham = $this->modleSanPham->getListAnhSanPham($id);
        
//         if($sanPham){
//             require_once './views/sanpham/detailSanPham.php';
            
//         }else{
//             header("location:" . BASE_URL_ADMIN . '?act=san-pham');
//                 exit();
//         }
//         // var_dump($danhmuc);
//         // die();
        

//     }


    // public function danhSachSanPham(){
    //     $listDanhMuc = $this->modleDanhMuc->getAllSanPham();
    //     require_once './views/danhmuc/SanPham.php';
    // }
}
?>