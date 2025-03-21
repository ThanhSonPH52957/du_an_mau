<?php
    class GioHang {
        public $conn;

        function __construct() {
            $this -> conn = connectDB();
        }

        function getGioHangFromUser($id) {
            try {
                $sql = 'select * from gio_hangs where tai_khoan_id = :tai_khoan_id';
                $stmt = $this -> conn -> prepare($sql);

                $stmt -> execute([':tai_khoan_id' => $id]);

                return $stmt -> fetch();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        function getDetailGioHang($id) {
            try {
                $sql = 'select chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai from chi_tiet_gio_hangs 
                        inner join san_phams on chi_tiet_gio_hangs.san_pham_id = san_phams.id where chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';
                $stmt = $this -> conn -> prepare($sql);

                $stmt -> execute([':gio_hang_id' => $id]);

                return $stmt -> fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        function addGioHang($id) {
            try {
                $sql = 'insert into gio_hangs (tai_khoan_id) values (:id)';
                $stmt = $this -> conn -> prepare($sql);

                $stmt -> execute([':id' => $id]);

                return $this -> conn -> lastInsertId();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong) {
            try {
                $sql = 'update chi_tiet_gio_hangs set so_luong = :so_luong where gio_hang_id = :gio_hang_id and san_pham_id = :san_pham_id';
                $stmt = $this -> conn -> prepare($sql);

                $stmt -> execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong]);

                return true;
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong) {
                $sql = 'insert into chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong) values (:gio_hang_id, :san_pham_id, :so_luong)';
                $stmt = $this -> conn -> prepare($sql);

                $stmt -> execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong]);

                return true;
        }
    }