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
            <h1>Quản lý tài khoản quản trị viên</h1>
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
                <h3 class="card-title">Sửa thông tin tài khoản quản trị: <?= $quantri['ho_ten'] ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=updatequantri'?>" method="post">
                <input type="hidden" name="id_quan_tri" value="<?=  $quantri['id'] ?>">
                <div class="card-body">
                  <div class="form-group col-12">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="ho_ten" value="<?=  $quantri['ho_ten'] ?>" placeholder="Nhập họ tên">
                    <?php if(isset($_SESSION['error']['ho_ten'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?=  $quantri['email'] ?>" placeholder="Nhập email">
                    <?php if(isset($_SESSION['error']['email'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-12">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value="<?=  $quantri['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                    <?php if(isset($_SESSION['error']['so_dien_thoai'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Trạng thái</label>
                    <select name="trang_thai" id="trang_thai" class="form-control">
                        <option <?= $quantri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                        <option <?= $quantri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="insertCate">Submit</button>
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
