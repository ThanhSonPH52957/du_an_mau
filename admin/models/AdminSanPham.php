<?php 

class AdminSanPham
{
    public $conn;

    function __construct() {
        $this -> conn = connectDB();
    }

    function getAllSanPham() {
        $sql = 'SELECT san_phams.id as san_pham_id, san_phams.*, danh_mucs.* 
        FROM san_phams 
        INNER JOIN danh_mucs ON danh_mucs.id = san_phams.danh_muc_id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function getAllDanhMuc() {
        $sql = 'select * from danh_mucs';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function InsertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh) {
        $sql = "insert into san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh) values (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_san_pham' => $ten_san_pham,
            ':gia_san_pham' => $gia_san_pham,
            ':gia_khuyen_mai' => $gia_khuyen_mai,
            ':so_luong' => $so_luong,
            ':ngay_nhap' => $ngay_nhap,
            ':danh_muc_id' => $danh_muc_id,
            ':trang_thai' => $trang_thai,
            ':mo_ta' => $mo_ta,
            ':hinh_anh' => $hinh_anh
        ]);

        return $this->conn->lastInsertId();
    }

    function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh) {
        $sql = "insert into hinh_anh_san_phams (san_pham_id, link_hinh_anh) values (:san_pham_id, :link_hinh_anh)";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':san_pham_id' => $san_pham_id,
            ':link_hinh_anh' => $link_hinh_anh,
        ]);
        return true;
    }

    function getOneSanPham($id) {
        $sql = 'select * from san_phams where id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    function getListAnhSanPham($id) {
        $sql = 'select * from hinh_anh_san_phams where san_pham_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function UpdateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file) {
        $sql = "update san_phams set ten_san_pham = :ten_san_pham, gia_san_pham = :gia_san_pham, gia_khuyen_mai = :gia_khuyen_mai, so_luong = :so_luong, ngay_nhap = :ngay_nhap, danh_muc_id = :danh_muc_id, trang_thai = :trang_thai, mo_ta = :mo_ta, hinh_anh = :hinh_anh where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_san_pham' => $ten_san_pham,
            ':gia_san_pham' => $gia_san_pham,
            ':gia_khuyen_mai' => $gia_khuyen_mai,
            ':so_luong' => $so_luong,
            ':ngay_nhap' => $ngay_nhap,
            ':danh_muc_id' => $danh_muc_id,
            ':trang_thai' => $trang_thai,
            ':mo_ta' => $mo_ta,
            ':hinh_anh' => $new_file,
            ':id' => $san_pham_id
        ]);

        return true;
    }

    function getDetailAnhSanPham($id) {
        $sql = 'select * from hinh_anh_san_phams where id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    function updateAlbumSanPham($id, $new_file) {
        $sql = "update hinh_anh_san_phams set link_hinh_anh = :new_file where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':new_file' => $new_file,
            ':id' => $id
        ]);

        return true;
    }

    function destroyAnhSanPham($id) {
        $sql = 'delete from hinh_anh_san_phams where id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    //Bình luận
    function getBinhLuanFromKhachHang($id) {
        $sql = 'select binh_luans.*, san_phams.ten_san_pham from binh_luans inner join san_phams on binh_luans.san_pham_id = san_phams.id where tai_khoan_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function getOneBinhLuan($id) {
        $sql = 'select * from binh_luans where id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    function UpdateBinhLuan($id, $trang_thai_update) {
        $sql = 'update binh_luans set trang_thai = :trang_thai where id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id,
            ':trang_thai' => $trang_thai_update
        ]);
        return true;
    }

    function DeleteSanPham($id) {
        $sql = 'delete from san_phams where id ='.$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);

        return true;
    }
}