<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoController.php';
require_once './controllers/AdminTaiKhoanController.php';
// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

if($act !== 'loginadmin' && $act !== 'checkloginadmin' && $act !== 'logoutadmin') {
    checkLoginAdmin();
}
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new AdminBaoCaoController()) -> home(),

    //router danh mục
    'danhmuc' => (new AdminDanhMucController()) -> danhSachDanhMuc(),
    'forminsertdanhmuc' => (new AdminDanhMucController()) -> formInsertDanhMuc(),
    'insertdanhmuc' => (new AdminDanhMucController()) -> insertDanhMuc(),
    'formupdatedanhmuc' => (new AdminDanhMucController()) -> formUpdateDanhMuc($_GET['id']),
    'updatedanhmuc' => (new AdminDanhMucController()) -> updateDanhMuc($_GET['id']),
    'deletedanhmuc' => (new AdminDanhMucController()) -> deleteDanhMuc($_GET['id']),

    //router sản phẩm
    'sanpham' => (new AdminSanPhamController()) -> danhSachSanPham(),
    'forminsertsanpham' => (new AdminSanPhamController()) -> formInsertSanPham(),
    'insertsanpham' => (new AdminSanPhamController()) -> insertSanPham(),
    'formupdatesanpham' => (new AdminSanPhamController()) -> formUpdateSanPham($_GET['id']),
    'updatesanpham' => (new AdminSanPhamController()) -> updateSanPham(),
    'updatealbumanhsanpham' => (new AdminSanPhamController()) -> updateAlbumSanPham(),
    'deletesanpham' => (new AdminSanPhamController()) -> deleteSanPham($_GET['id']),

    //router quản lý bình luận
    'updatebinhluan' => (new AdminSanPhamController()) -> updateBinhLuan(),

    //router đơn hàng
    'donhang' => (new AdminDonHangController()) -> danhSachDonHang(),
    'chitietdonhang' => (new AdminDonHangController()) -> chiTietDonHang($_GET['id_don_hang']),
    'formupdatedonhang' => (new AdminDonHangController()) -> formUpdateDonHang($_GET['id_don_hang']),
    'updatedonhang' => (new AdminDonHangController()) -> updateDonHang($_GET['id']),

    //router quản lý tài khoản
    'listtaikhoanquantri' => (new AdminTaiKhoanController()) -> danhSachQuanTri(),
    'forminsertquantri' => (new AdminTaiKhoanController()) -> formInsertQuanTri(),
    'insertquantri' => (new AdminTaiKhoanController()) -> insertQuanTri(),
    'formupdatequantri' => (new AdminTaiKhoanController()) -> formUpdateQuanTri(),
    'updatequantri' => (new AdminTaiKhoanController()) -> updateQuanTri(),

    'resetpassword' => (new AdminTaiKhoanController()) -> resetPassword($_GET['id']),

    //router quản lý khách hàng
    'listtaikhoankhachhang' => (new AdminTaiKhoanController()) -> danhSachKhachHang(),
    'formupdatekhachhang' => (new AdminTaiKhoanController()) -> formUpdateKhachHang(),
    'updatekhachhang' => (new AdminTaiKhoanController()) -> updateKhachHang(),
    'chitietkhachhang' => (new AdminTaiKhoanController()) -> detailKhachHang($_GET['id']),

    //router quản lý tài khoản cá nhân
    'formupdatecanhan' => (new AdminTaiKhoanController()) -> formUpdateCaNhan(),
    // 'updatecanhan' => (new AdminTaiKhoanController()) -> updateCaNhan(),
    'updatematkhaucanhan' => (new AdminTaiKhoanController()) -> updateMatKhauCaNhan(),

    //route auth
    'loginadmin' => (new AdminTaiKhoanController()) -> formLogin(),
    'checkloginadmin' => (new AdminTaiKhoanController()) -> login(),
    'logoutadmin' => (new AdminTaiKhoanController()) -> logout(),
};