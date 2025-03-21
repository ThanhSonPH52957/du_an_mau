<?php
    class TaiKhoan {
        public $conn;

        function __construct() {
            $this -> conn = connectDB();
        }

        function CheckLogin($email, $pass) {
            try {
                $sql = 'select * from tai_khoans where email = :email';
                $stmt = $this -> conn -> prepare($sql);
                $stmt -> execute([
                    ':email' => $email
                ]);
                $login = $stmt -> fetch();

                if($login && password_verify($pass, $login['mat_khau'])) {
                    if ($login['chuc_vu_id'] == 2) {
                        if ($login['trang_thai'] == 1){
                            return $login['email'];
                        } else {
                            return 'Tài khoản bị cấm';
                        }
                    }else {
                        return "Tài khoản không có quyền đăng nhập";
                    }
                } else {
                    return "Sai thông tin tài khoản hoặc mật khẩu";
                }
            } catch (\Exception $e) {
                echo "Lỗi" . $e -> getMessage();
                return false;
            }
        }

        function getTaiKhoanFromEmail($email) {
            $sql = 'select * from tai_khoans where email = :email';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':email' => $email
            ]);
            return $stmt -> fetch();
        }
    }