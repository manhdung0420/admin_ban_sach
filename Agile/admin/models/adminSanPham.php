<?php
class adminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_sach, $tac_gia, $the_loai, $so_luong, $gia, $danh_muc_id, $mo_ta, $hinh_anh, $ngay_tao)
    {
        try {
            $sql = "INSERT INTO san_phams (ten_sach, tac_gia, the_loai, so_luong, gia, danh_muc_id, mo_ta, hinh_anh, ngay_tao)
                    VALUES (:ten_sach, :tac_gia, :the_loai, :so_luong, :gia, :danh_muc_id, :mo_ta, :hinh_anh, :ngay_tao)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sach'   => $ten_sach,
                ':tac_gia'    => $tac_gia,
                ':the_loai'   => $the_loai,
                ':so_luong'   => $so_luong,
                ':gia'        => $gia,
                ':danh_muc_id' => $danh_muc_id,
                ':mo_ta'      => $mo_ta,
                ':hinh_anh'   => $hinh_anh,
                ':ngay_tao'   => $ngay_tao
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }



    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = "INSERT INTO hinh_anh_san_phams (san_pham_id,link_hinh_anh)
            VALUES (:san_pham_id,:link_hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);

            // lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT  san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function updateSanPham($san_pham_id, $ten_sach, $tac_gia, $the_loai, $so_luong, $gia, $danh_muc_id, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'UPDATE `san_phams` 
                    SET 
                        ten_sach = :ten_sach,
                        tac_gia = :tac_gia,
                        the_loai = :the_loai,
                        so_luong = :so_luong,
                        gia = :gia,
                        danh_muc_id = :danh_muc_id,
                        mo_ta = :mo_ta,
                        hinh_anh = COALESCE(:hinh_anh, hinh_anh) 
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_sach' => $ten_sach,
                ':tac_gia' => $tac_gia,
                ':the_loai' => $the_loai,
                ':so_luong' => $so_luong,
                ':gia' => $gia,
                ':danh_muc_id' => $danh_muc_id,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => !empty($hinh_anh) ? $hinh_anh : null,
                ':id' => $san_pham_id
            ]);

            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
            return false;
        }
    }


    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function updateAnhSanPham($id, $new_file)
    {
        try {
            // var_dump('abc');die;
            $sql = 'UPDATE `hinh_anh_san_phams` 
                    SET 
                        link_hinh_anh = :new_file
                        
                    WHERE id = :id';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function destroyAnhSanPham($id)
    {
        try {
            $sql = "DELETE FROM hinh_anh_san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function destroySanPham($id)
    {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    //bình luận
    public function getBinhLuanFromKhachHang($id)
    {
        try {
            $sql = "SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            // var_dump($stmt);die;
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            // var_dump($stmt);die;
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getDetailBinhLuan($id)
    {
        try {
            $sql = "SELECT * FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function updateTrangThaiBinhLuan($id, $trang_thai)
    {
        try {
            // var_dump('abc');die;
            $sql = 'UPDATE `binh_luans` 
                    SET 
                        trang_thai = :trang_thai
                        
                    WHERE id = :id';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
}
