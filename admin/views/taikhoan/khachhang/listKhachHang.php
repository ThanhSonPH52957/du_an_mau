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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th>Theo tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($alllistkhachhang as $key => $khachhang) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $khachhang['ho_ten'] ?></td>
                    <td><img src="<?= BASE_URL.$khachhang['anh_dai_dien']?>" style="width: 100px" alt="" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/1144/1144760.png'"></td>
                    <td><?= $khachhang['email'] ?></td>
                    <td><?= $khachhang['so_dien_thoai'] ?></td>
                    <td><?= $khachhang['trang_thai'] == 1 ? 'Active':'Inactive' ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= BASE_URL_ADMIN.'?act=chitietkhachhang&id='.$khachhang['id'] ?>">
                          <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN.'?act=formupdatekhachhang&id='.$khachhang['id'] ?>">
                          <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN.'?act=resetpassword&id='.$khachhang['id'] ?>" onclick="return confirm('Bạn có muốn reset password của tài khoản này không?')">
                          <button class="btn btn-danger"><i class="fas fa-redo"></i></button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th>Theo tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>
</html>
