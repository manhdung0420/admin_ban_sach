<?php
class adminBinhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();  // Kết nối với cơ sở dữ liệu
    }

    // Lấy tất cả bình luận
    public function getAllBinhLuan()
    {
        try {
            $sql = "SELECT binh_luans.*, san_phams.ten_sach, tai_khoans.ho_ten
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id";
            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    // Lấy chi tiết bình luận theo ID
    public function getDetailBinhLuan($id)
    {
        try {
            $sql = "SELECT binh_luans.*, san_phams.ten_sach, tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    
    
    // Xóa bình luận
    public function deleteBinhLuan($id)
    {
        try {
            $sql = "DELETE FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
}
