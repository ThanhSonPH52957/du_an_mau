<?php 

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;

    function __construct() {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
    }

    public function home(){
        $listSanPham = $this -> modelSanPham -> GetAllSanPham();
        $listSanPhamNew = $this -> modelSanPham -> GetNewSanPham();
        require_once './views/home.php';
    }

    public function chiTietSanPham($id){
        $sanPham = $this -> modelSanPham -> GetDetailSanPham($id);

        $listAnhSanPham = $this -> modelSanPham -> GetListAnhSanPham($id);

        $listBinhLuan = $this -> modelSanPham -> GetBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this -> modelSanPham -> getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        if($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("location: " . BASE_URL);
            exit();
        }
    }

    function formLogin() {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

    function postLogin() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $user = $this -> modelTaiKhoan -> CheckLogin($email, $pass);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("location:".BASE_URL_ADMIN.'?act=/');
                exit();
            } else {
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: ".BASE_URL_ADMIN.'?act=login');
                exit();
            }
        } 
    }

    function themGioHang() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_SESSION['user_client'])) {
                $mail = $this -> modelTaiKhoan -> getTaiKhoanFromEmail($_SESSION['user_client']);
                var_dump($mail['id']);die;

                $gioHang = $this -> modelGioHang -> getGioHangFromUser($mail['id']);
                
                if (!$gioHang) {
                    $gioHangId = $this -> modelGioHang ->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this -> modelGioHang -> getDetailGioHang($gioHang['id']);
                    
                } else {
                    $chiTietGioHang = $this -> modelGioHang -> getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach($chiTietGioHang as $detail) {
                    if($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this -> modelGioHang -> updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this -> modelGioHang -> addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                require_once './views/gioHang.php';
            } else {
                require_once './views/auth/formLogin.php';
            }
        }
    }

    function logout() {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("location: " . BASE_URL_ADMIN . '?act=login');
        }
    }

}