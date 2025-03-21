<?php
    class AdminDanhMucController {
        public $modelDanhMuc;
        function __construct() {
            $this -> modelDanhMuc = new AdminDanhMuc();
        }
        public function danhSachDanhMuc() {
            $alldanhmuc = $this -> modelDanhMuc -> getAllDanhMuc();
            require_once './views/danhmuc/listDanhMuc.php';
        }

        function formInsertDanhMuc() {
            require_once './views/danhmuc/addDanhMuc.php';
        }

        function insertDanhMuc() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];
                
                $errors = [];
                if(empty($ten_danh_muc)) {
                    $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';  
                } 

                if(empty($errors)) {
                    $this -> modelDanhMuc -> InsertDanhMuc($ten_danh_muc, $mo_ta);
                    header("location:".BASE_URL_ADMIN.'?act=danhmuc');
                    exit();
                } else {
                    require_once './views/danhmuc/addDanhMuc.php';
                }
            }
        }

        function formUpdateDanhMuc($id) {
            $onedanhmuc = $this -> modelDanhMuc -> getOneDanhMuc($id);
            require_once './views/danhmuc/updateDanhMuc.php';
        }

        function updateDanhMuc($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];
                
                $errors = [];
                if(empty($ten_danh_muc)) {
                    $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
                } 

                if(empty($errors)) {
                    $this -> modelDanhMuc -> UpdateDanhMuc($id, $ten_danh_muc, $mo_ta);
                    header("location:".BASE_URL_ADMIN.'?act=danhmuc');
                    exit();
                } else {
                    $onedanhmuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                    require_once './views/danhmuc/updateDanhMuc.php';
                }
            }
        }

        function deleteDanhMuc($id) {
            $this -> modelDanhMuc -> DeleteDanhMuc($id);
            header("location:".BASE_URL_ADMIN.'?act=danhmuc');
        }
    }
?>