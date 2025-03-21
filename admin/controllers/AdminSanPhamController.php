<?php
    class AdminSanPhamController {
        public $modelSanPham;
        public $modelDanhMuc;
        function __construct() {
            $this -> modelSanPham = new AdminSanPham();
            $this -> modelDanhMuc = new AdminDanhMuc();
        }

        public function danhSachSanPham() {
            $allsanpham = $this -> modelSanPham -> getAllSanPham();
            require_once './views/sanpham/listSanPham.php';
        }

        function formInsertSanPham() {
            $listdanhmuc = $this -> modelSanPham -> getAllDanhMuc();
            $allsanpham = $this -> modelSanPham -> getAllSanPham();
            require_once './views/sanpham/addSanPham.php';

            deleteSessionError();
        }

        function insertSanPham() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ten_san_pham = $_POST['ten_san_pham'] ?? '';
                $gia_san_pham = $_POST['gia_san_pham']?? '';
                $gia_khuyen_mai = $_POST['gia_khuyen_mai']?? '';
                $so_luong = $_POST['so_luong']?? '';
                $ngay_nhap = $_POST['ngay_nhap']?? '';
                $danh_muc_id = $_POST['danh_muc_id']?? '';
                $trang_thai = $_POST['trang_thai']?? '';
                $mo_ta = $_POST['mo_ta']?? '';
                
                $hinh_anh = $_FILES['hinh_anh']?? null;

                $file_thumb = uploadFile($hinh_anh, './uploads/');

                $img_arr = $_FILES['img_arr'];
                
                $errors = [];
                if(empty($ten_san_pham)) {
                    $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
                }
                if(empty($gia_san_pham)) {
                    $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
                }
                if(empty($so_luong)) {
                    $errors['so_luong'] = 'Số lượng không được để trống';
                }
                if(empty($ngay_nhap)) {
                    $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
                }
                if(empty($danh_muc_id)) {
                    $errors['danh_muc_id'] = 'Id danh mục không được để trống';
                }
                if(empty($trang_thai)) {
                    $errors['trang_thai'] = 'Trạng thái sản phẩm không được để trống';
                }
                if($hinh_anh['error'] !== 0) {
                    $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
                }

                $_SESSION['error'] = $errors;

                if(empty($errors)) {
                    $san_pham_id = $this -> modelSanPham -> InsertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                    
                    if(!empty($img_arr['name'])) {
                        foreach($img_arr['name'] as $key => $value) {
                            $file = [
                                'name' => $img_arr['name'][$key],
                                'type' => $img_arr['type'][$key],
                                'tmp_name' => $img_arr['tmp_name'][$key],
                                'error' => $img_arr['error'][$key],
                                'size' => $img_arr['size'][$key],
                            ];
                            
                            $link_hinh_anh = uploadFile($file, './uploads/');
                            $this -> modelSanPham -> insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                        }
                    }
                    header("location:".BASE_URL_ADMIN.'?act=sanpham');
                    exit();
                } else {
                    $_SESSION['flash'] = true;

                    header("location:".BASE_URL_ADMIN.'?act=forminsertsanpham');
                    exit();
                }
            }
        }

        function formUpdateSanPham($id) {
            $onesanpham = $this -> modelSanPham -> getOneSanPham($id);
            $listanhsanpham = $this -> modelSanPham -> getListAnhSanPham($id);
            $listdanhmuc = $this -> modelDanhMuc -> getAllDanhMuc();
            if ($onesanpham) {
                require_once './views/sanpham/updateSanPham.php';
                deleteSessionError();
            } else {
                header("location:".BASE_URL_ADMIN.'?act=formupdatesanpham');
                exit();
            }
        }

        function updateSanPham() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $san_pham_id = $_POST['san_pham_id'] ?? '';

                $sanPhamOld = $this->modelSanPham->getOneSanPham($san_pham_id);
                $old_file = $sanPhamOld['hinh_anh'];

                $ten_san_pham = $_POST['ten_san_pham'] ?? '';
                $gia_san_pham = $_POST['gia_san_pham']?? '';
                $gia_khuyen_mai = $_POST['gia_khuyen_mai']?? '';
                $so_luong = $_POST['so_luong']?? '';
                $ngay_nhap = $_POST['ngay_nhap']?? '';
                $danh_muc_id = $_POST['danh_muc_id']?? '';
                $trang_thai = $_POST['trang_thai']?? '';
                $mo_ta = $_POST['mo_ta']?? '';
                
                $hinh_anh = $_FILES['hinh_anh']?? null;

                $errors = [];
                if(empty($ten_san_pham)) {
                    $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
                }
                if(empty($gia_san_pham)) {
                    $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
                }
                if(empty($so_luong)) {
                    $errors['so_luong'] = 'Số lượng không được để trống';
                }
                if(empty($ngay_nhap)) {
                    $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
                }
                if(empty($danh_muc_id)) {
                    $errors['danh_muc_id'] = 'Id danh mục không được để trống';
                }
                if(empty($trang_thai)) {
                    $errors['trang_thai'] = 'Trạng thái sản phẩm không được để trống';
                }

                $_SESSION['error'] = $errors;

                //logic sửa ảnh
                if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                    $new_file = uploadFile($hinh_anh, './uploads/');
                    if(!empty($old_file)) {
                        deleteFile($old_file);
                    }
                } else {
                    $new_file = $old_file;
                }

                if(empty($errors)) {
                    $san_pham_id = $this -> modelSanPham -> UpdateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);

                    header("location:".BASE_URL_ADMIN.'?act=sanpham');
                    exit();
                } else {
                    $_SESSION['flash'] = true;

                    header("location:".BASE_URL_ADMIN.'?act=formupdatesanpham&id='.$san_pham_id);
                    exit();
                }
            }
        }

        function updateAlbumSanPham() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $san_pham_id = $_POST['san_pham_id']??'';
                //Lấy danh sách ảnh hiện tại của sản phẩm
                $listanhsanphamcurrent = $this -> modelSanPham -> getListAnhSanPham($san_pham_id);

                //Xử lý các ảnh được gửi vào form
                $img_arr = $_FILES['img_arr'];
                $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
                $current_img_ids = $_POST['current_img_ids'] ?? [];

                //Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
                $upload_File = [];

                //Upload ảnh mới hoặc thay thế ảnh cũ
                foreach($img_arr['name'] as $key => $value) {
                    if($img_arr['error'][$key] == UPLOAD_ERR_OK) {
                        $new_file = uploadFileAlbum($img_arr, './uploads/', $key);
                        if($new_file) {
                            $upload_File[] = [
                                'id' => $current_img_ids[$key] ?? null,
                                'file' => $new_file
                            ]; 
                        }
                    }
                }

                //Lưu ảnh mới vào db và xóa ảnh cũ nếu có
                foreach($upload_File as $file_info) {
                    if($file_info['id']) {
                        $old_file = $this -> modelSanPham -> getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    
                    //Cập nhật ảnh cũ
                    $this -> modelSanPham -> updateAlbumSanPham($file_info['id'], $file_info['file']);
                    //Xóa ảnh cũ
                    deleteFile($old_file);

                    } else {
                        $this -> modelSanPham -> insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                    }
                }

                //Xử lí xóa ảnh
                foreach($listanhsanphamcurrent as $anhSP){
                    $anh_id = $anhSP['id'];
                    if(in_array($anh_id, $img_delete)) {
                        //Xóa ảnh trong db
                        $this -> modelSanPham -> destroyAnhSanPham($anh_id);

                        //Xóa file
                        deleteFile($anhSP['link_hinh_anh']);
                    }
                }
                header("location:".BASE_URL_ADMIN.'?act=formupdatesanpham&id='.$san_pham_id);
                exit();
            }
        }

        function deleteSanPham($id) {
            $this -> modelSanPham -> DeleteSanPham($id);
            header("location:".BASE_URL_ADMIN.'?act=sanpham');
        }

        function updateBinhLuan() {
            $id = $_POST['id_binh_luan'];
            $binhluan = $this -> modelSanPham -> getOneBinhLuan($id);
            $name_view = $_POST['name_view'];
            $tai_khoan_id = $_POST['id_khach_hang'];

            if($binhluan) {
                $trang_thai_update = '';
                if ($binhluan['trang_thai'] == 2) {
                    $trang_thai_update = '1';
                } else {
                    $trang_thai_update = '2';
                }
                $this -> modelSanPham -> UpdateBinhLuan($id, $trang_thai_update);
                if ($name_view == 'detail_khach') {
                    header("Location: " . BASE_URL_ADMIN . '?act=chitietkhachhang&id=' . $tai_khoan_id);
                }
            }
        }
    }
?>