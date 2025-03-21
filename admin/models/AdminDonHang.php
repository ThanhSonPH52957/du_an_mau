<?php 

class AdminDonHang
{
    public $conn;

    function __construct() {
        $this -> conn = connectDB();
    }

    function getAllDonHang() {
        $sql = 'select * from trang_thai_don_hangs inner join don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function getAllTrangThai() {
        $sql = 'select * from trang_thai_don_hangs';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function getOneDonHang($id) {
        $sql = 'select don_hangs.*, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hangs.ten_trang_thai, tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai from don_hangs inner join trang_thai_don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id inner join tai_khoans on don_hangs.tai_khoan_id = tai_khoans.id inner join phuong_thuc_thanh_toans on don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id where don_hangs.id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    function getListSpDonHang($id) {
        $sql = 'select chi_tiet_don_hangs.*, san_phams.ten_san_pham from chi_tiet_don_hangs inner join san_phams on chi_tiet_don_hangs.san_pham_id = san_phams.id where chi_tiet_don_hangs.don_hang_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function UpdateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id){
        $sql = "update don_hangs set ten_nguoi_nhan = :ten_nguoi_nhan, sdt_nguoi_nhan = :sdt_nguoi_nhan, email_nguoi_nhan = :email_nguoi_nhan, dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, ghi_chu = :ghi_chu, trang_thai_id = :trang_thai_id where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_nguoi_nhan' => $ten_nguoi_nhan,
            ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            ':email_nguoi_nhan' => $email_nguoi_nhan,
            ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
            ':ghi_chu' => $ghi_chu,
            ':trang_thai_id' => $trang_thai_id,
            'id' => $id
        ]);

        return true;
    }

    function getOneDonHangFromKhachHang($id) {
        $sql = 'select * from trang_thai_don_hangs inner join don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id where don_hangs.tai_khoan_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }
}