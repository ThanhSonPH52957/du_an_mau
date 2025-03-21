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
          <h1>Quản lý tài khoản khách hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="container">
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?= BASE_URL . $thongtin['anh_dai_dien'] ?>" style="width: 100px" class="avatar img-circle" alt="avatar" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/1144/1144760.png'">
          <h6 class="mt-2">Họ tên: <?= $thongtin['ho_ten'] ?></h6>

          <input type="file" class="form-control">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <hr>
        <h3>Thông tin cá nhân</h3>

        <form action="<?= BASE_URL_ADMIN . '?act=updatecanhan' ?>" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ tên:</label>
            <div class="col-lg-8">
              <input class="form-control" name="ho_ten" type="text" value="Jane">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Bishop">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>
        </form>
        <hr>
        <h3>Đổi mật khẩu</h3>
        <?php if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            <?= $_SESSION['success'] ?>
          </div>
        <?php } ?>
        <form action="<?= BASE_URL_ADMIN . '?act=updatematkhaucanhan' ?>" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu cũ:</label>
            <div class="col-md-8">
              <input class="form-control" name="old_pass" type="password">
            </div>
            <?php if (isset($_SESSION['error']['old_pass'])) { ?>
              <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu mới:</label>
            <div class="col-md-8">
              <input class="form-control" name="new_pass" type="password">
            </div>
            <?php if (isset($_SESSION['error']['new_pass'])) { ?>
              <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Xác nhận mật khẩu:</label>
            <div class="col-md-8">
              <input class="form-control" name="confirm_pass" type="password">
            </div>
            <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
              <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <hr>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<!-- Code injected by live-server -->

</body>

</html>