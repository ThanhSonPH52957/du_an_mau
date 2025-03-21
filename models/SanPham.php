<?php
    class SanPham {
        public $conn;
        function __construct(){
            $this->conn = connectDB();
        }

        function GetAllSanPham(){
            try {
                $sql = 'select san_phams.*, danh_mucs.ten_danh_muc from san_phams inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id';

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
            }
        }

        function GetNewSanPham(){
            try {
                $sql = 'select san_phams.*, danh_mucs.ten_danh_muc from san_phams inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id ORDER BY san_phams.id DESC LIMIT 4;';

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
            }
        }

        function GetDetailSanPham($id) {
            $sql = 'select san_phams.*, danh_mucs.ten_danh_muc from san_phams inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id where san_phams.id = :id';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        }

        function GetListAnhSanPham($id) {
            $sql = 'select * from hinh_anh_san_phams where san_pham_id = :id';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        }

        function GetBinhLuanFromSanPham($id) {
            $sql = 'select binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien from binh_luans inner join tai_khoans on binh_luans.tai_khoan_id = tai_khoans.id where binh_luans.san_pham_id = :id';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        }

        function getListSanPhamDanhMuc($id) {
            try {
                $sql = 'select san_phams.*, danh_mucs.ten_danh_muc from san_phams inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id where danh_muc_id =' .$id;

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
            }
        }
    }
?>