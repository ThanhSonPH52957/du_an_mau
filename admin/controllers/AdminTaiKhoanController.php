<?php
    class AdminTaiKhoanController {
        public $modelTaiKhoan;
        public $modelDonHang;
        public $modelSanPham;

        function __construct() {
            $this -> modelTaiKhoan = new AdminTaiKhoan();
            $this -> modelDonHang = new AdminDonHang();
            $this -> modelSanPham = new AdminSanPham();
        }

        function danhSachQuanTri() {
            $alllistquantri = $this -> modelTaiKhoan -> getAllTaiKhoan(1);
            require_once './views/taikhoan/quantri/listQuanTri.php';
        }

        function formInsertQuanTri() {
            require_once './views/taikhoan/quantri/addQuanTri.php';

            deleteSessionError();
        }

        function insertQuanTri() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                
                $errors = [];
                if(empty($ho_ten)) {
                    $errors['ho_ten'] = 'Họ tên không được để trống';
                }
                if(empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }

                $_SESSION['error'] = $errors;

                if(empty($errors)) {
                    $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                    $chuc_vu_id = 1;
                    $this -> modelTaiKhoan -> InsertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                    header("location:".BASE_URL_ADMIN.'?act=listtaikhoanquantri');
                    exit();
                } else {
                    require_once './views/danhmuc/addTaiKhoan.php';
                }
            }
        }

        function formUpdateQuanTri() {
            $id_quan_tri = $_GET['id'];
            $quantri = $this -> modelTaiKhoan -> getOneTaiKhoan($id_quan_tri);

            require_once './views/taikhoan/quantri/updateQuanTri.php';

            deleteSessionError();
        }

        function updateQuanTri() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_quan_tri = $_POST['id_quan_tri'] ?? '';
                $ho_ten = $_POST['ho_ten'] ?? '';
                $email = $_POST['email'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
                $trang_thai = $_POST['trang_thai'] ?? '';

                
                $errors = [];
                if(empty($ho_ten)) {
                    $errors['ho_ten'] = 'Tên người dùng không được để trống';
                }
                if(empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }
                if(empty($trang_thai)) {
                    $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
                }

                $_SESSION['error'] = $errors;

                if(empty($errors)) {
                    $this -> modelTaiKhoan -> UpdateQuanTri($id_quan_tri, $ho_ten, $so_dien_thoai, $email, $trang_thai);
                    
                    header("location:".BASE_URL_ADMIN.'?act=listtaikhoanquantri');
                    exit();
                } else {
                    $_SESSION['flash'] = true;

                    header("location:".BASE_URL_ADMIN.'?act=formupdatequantri&id='.$id_quan_tri);
                    exit();
                }
            }
        }

        function resetPassword($id) {
            $tai_khoan = $this -> modelTaiKhoan -> getOneTaiKhoan($id);
            $password = password_hash('123@123ab', PASSWORD_BCRYPT);
            $status = $this -> modelTaiKhoan -> ResetPassword($id, $password);

            if($status && $tai_khoan['chuc_vu_id'] == 1) {
                header("location:".BASE_URL_ADMIN.'?act=listtaikhoanquantri');
            } else {
                header("location:".BASE_URL_ADMIN.'?act=listtaikhoankhachhang');
            }
        }

        function danhSachKhachHang() {
            $alllistkhachhang = $this -> modelTaiKhoan -> getAllTaiKhoan(2);
            require_once './views/taikhoan/khachhang/listKhachHang.php';
        }

        function formUpdateKhachHang() {
            $id_khach_hang = $_GET['id'];
            $khachhang = $this -> modelTaiKhoan -> getOneTaiKhoan($id_khach_hang);

            require_once './views/taikhoan/khachhang/updateKhachHang.php';

            deleteSessionError();
        }

        function updateKhachHang() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $khach_hang_id = $_POST['khach_hang_id'] ?? '';
                $ho_ten = $_POST['ho_ten'] ?? '';
                $email = $_POST['email'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
                $ngay_sinh = $_POST['ngay_sinh'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $dia_chi = $_POST['dia_chi'] ?? '';
                $trang_thai = $_POST['trang_thai'] ?? '';

                $errors = [];
                if(empty($ho_ten)) {
                    $errors['ho_ten'] = 'Tên người dùng không được để trống';
                }
                if(empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }
                if(empty($ngay_sinh)) {
                    $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
                }
                if(empty($gioi_tinh)) {
                    $errors['gioi_tinh'] = 'Giới tính không được để trống';
                }
                if(empty($trang_thai)) {
                    $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
                }

                $_SESSION['error'] = $errors;

                if(empty($errors)) {
                    $this -> modelTaiKhoan -> UpdateKhachHang($khach_hang_id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
                    
                    header("location:".BASE_URL_ADMIN.'?act=listtaikhoankhachhang');
                    exit();
                } else {
                    $_SESSION['flash'] = true;

                    header("location:".BASE_URL_ADMIN.'?act=formupdatekhachhang&id='.$khach_hang_id);
                    exit();
                }
            }
        }

        function detailKhachHang($id) {
            $khachhang = $this -> modelTaiKhoan -> getOneTaiKhoan($id);
            $listdonhang = $this -> modelDonHang -> getOneDonHangFromKhachHang($id);
            $listbinhluan = $this -> modelSanPham -> getBinhLuanFromKhachHang($id);

            require_once './views/taikhoan/khachhang/detailKhachHang.php';
        }

        function formLogin() {
            require_once './views/auth/formLogin.php';
            deleteSessionError();
        }

        function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                
                $log = $this -> modelTaiKhoan -> CheckLogin($user, $pass);
                if ($log == $user) {
                    $_SESSION['user_admin'] = $log;
                    header("location:".BASE_URL_ADMIN.'?act=/');
                    exit();
                } else {
                    $_SESSION['error'] = $log;

                    $_SESSION['flash'] = true;

                    header("Location: ".BASE_URL_ADMIN.'?act=loginadmin');
                    exit();
                }
            } 
        }

        function logout() {
            if (isset($_SESSION['user_admin'])) {
                unset($_SESSION['user_admin']);
                header("location: " . BASE_URL_ADMIN . '?act=loginadmin');
            }
        }

        function formUpdateCaNhan() {
            $email = $_SESSION['user_admin'];
            $thongtin = $this -> modelTaiKhoan -> getOneTaiKhoanFromEmail($email);
            require_once './views/taikhoan/canhan/updateCaNhan.php';
            deleteSessionError();
        }

        function updateMatKhauCaNhan() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $confirm_pass = $_POST['confirm_pass'];

                $user = $this -> modelTaiKhoan -> getOneTaiKhoanFromEmail($_SESSION['user_admin']);

                $checkPass = password_verify($old_pass, $user['mat_khau']);

                $errors = [];
                if(!$checkPass) {
                    $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
                }

                if($new_pass !== $confirm_pass) {
                    $errors['confirm_pass'] = 'Xác nhận mật khẩu không đúng';
                }

                if(empty($old_pass)) {
                    $errors['old_pass'] = 'Vui lòng nhập vào mật khẩu';
                }

                if(empty($new_pass)) {
                    $errors['new_pass'] = 'Vui lòng nhập mật khẩu mới';
                }

                if(empty($confirm_pass)) {
                    $errors['confirm_pass'] = 'Vui lòng xác nhận mật khẩu';
                }

                $_SESSION['error'] = $errors;
                if(!$errors) {
                    $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                    $status = $this -> modelTaiKhoan -> resetPassword($user['id'], $hashPass);
                    if ($status) {
                        $_SESSION['success'] = "Đổi mật khẩu thành công";
                        $_SESSION['flash'] = true;
                        header("Location: " . BASE_URL_ADMIN . '?act=formupdatecanhan');
                    }
                } else {
                    $_SESSION['flash'] = true;

                    header("Location: " . BASE_URL_ADMIN . '?act=formupdatecanhan');
                    exit();
                }
            }
        }
    }
?>
