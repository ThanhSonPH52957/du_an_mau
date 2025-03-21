<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/TaiKhoan.php';
require_once './models/SanPham.php';
require_once './models/GioHang.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController()) -> home(),
    'chitietsanpham' => (new HomeController()) -> chiTietSanPham($_GET['id']),
    'themgiohang' => (new HomeController()) -> themGioHang(),
    // 'giohang' => (new HomeController()) -> gioHang(),
    'login' => (new HomeController()) -> formLogin(),
    'checklogin' => (new HomeController()) -> postLogin(),
    'logout' => (new HomeController()) -> logout(),
    'binhluan' => (new HomeController()) -> binhLuan()
};