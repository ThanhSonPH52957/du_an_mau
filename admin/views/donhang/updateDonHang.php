<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa thông tin đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng: <?= $donHang['ma_don_hang'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=updatedonhang&id=' . $donHang['id'] ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>">
                                    <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea type="text" class="form-control" name="ghi_chu"><?= $donHang['ghi_chu'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Trạng thái đơn hàng</label>
                                    <select name="trang_thai_id" id="trang_thai" class="form-control">
                                        <?php foreach ($listTrangThai as $key => $trangThai) {
                                            $isSelected = $trangThai['id'] == $donHang['trang_thai_id'];
                                            $isDisabled = $trangThai['id'] < $donHang['trang_thai_id']
                                                || $donHang['trang_thai_id'] == 9
                                                || $donHang['trang_thai_id'] == 10
                                                || $donHang['trang_thai_id'] == 11;
                                        ?>
                                            <option value="<?= $trangThai['id'] ?>" <?= $isSelected ? 'selected' : '' ?> <?= $isDisabled && !$isSelected ? 'disabled' : '' ?>>
                                                <?= $trangThai['ten_trang_thai'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="updateCate">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<!-- Code injected by live-server -->

</body>

</html>