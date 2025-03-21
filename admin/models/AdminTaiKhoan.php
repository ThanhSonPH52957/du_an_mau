<?php
    class AdminTaiKhoan {
        public $conn;

        function __construct() {
            $this -> conn = connectDB();
        }

        function getAllTaiKhoan($chuc_vu_id) {
            $sql = 'select * from tai_khoans where chuc_vu_id = :chuc_vu_id';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return $stmt->fetchAll();
        }

        function InsertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id) {
            $sql = "insert into tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) values (:ho_ten, :email, :password, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':password' => $password,
            ':chuc_vu_id' => $chuc_vu_id
        ]);
        }

        function getOneTaiKhoan($id) {
            $sql = 'select * from tai_khoans where id = :id';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        }   

        function UpdateQuanTri($id_quan_tri, $ho_ten, $so_dien_thoai, $email, $trang_thai) {
            $sql = "update tai_khoans set ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, email = :email, trang_thai = :trang_thai where id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':so_dien_thoai' => $so_dien_thoai,
            ':email' => $email,
            ':trang_thai' => $trang_thai,
            'id' => $id_quan_tri
            ]);

            return true;
        }

        function ResetPassword($id, $password) {
            $sql = "update tai_khoans set mat_khau = :mat_khau where id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $password,
                ':id' => $id
            ]);

            return true;
        }

        function UpdateKhachHang($khach_hang_id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai) {
            $sql = "update tai_khoans set ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, email = :email, ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, dia_chi = :dia_chi, trang_thai = :trang_thai where id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':so_dien_thoai' => $so_dien_thoai,
            ':email' => $email,
            ':ngay_sinh' => $ngay_sinh,
            ':gioi_tinh' => $gioi_tinh,
            ':dia_chi' => $dia_chi,
            ':trang_thai' => $trang_thai,
            'id' => $khach_hang_id
            ]);

            return true;
        }

        function CheckLogin($user, $pass) {
            try {
                $sql = 'select * from tai_khoans where email = :email';
                $stmt = $this -> conn -> prepare($sql);
                $stmt -> execute([
                    ':email' => $user
                ]);
                $login = $stmt -> fetch();

                if($login && password_verify($pass, $login['mat_khau'])) {
                    if ($login['chuc_vu_id'] == 1) {
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

        function getOneTaiKhoanFromEmail($email) {
            $sql = 'select * from tai_khoans where email = :email';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':email' => $email
            ]);
            return $stmt -> fetch();
        }
    }
?>