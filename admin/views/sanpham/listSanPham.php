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
            <h1>Quản lý danh sách sản phẩm</h1>
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
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=forminsertsanpham' ?>"><button class="btn btn-success">Thêm sản phẩm</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allsanpham as  $key => $sanpham) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $sanpham['ten_san_pham'] ?></td>
                    <td><img src="<?= BASE_URL.$sanpham['hinh_anh']?>" style="width: 100px" alt="" onerror="this.onerror=null; this.src='https://media.tenor.com/7hxGGOtU2MoAAAAM/karyl-kyaru.gif'"></td>
                    <td><?= $sanpham['gia_san_pham'] ?></td>
                    <td><?= $sanpham['so_luong'] ?></td>
                    <td><?= $sanpham['ten_danh_muc'] ?></td>
                    <td><?= $sanpham['trang_thai'] == 1 ? 'Còn bán':'Dừng bán'; ?></td>
                    <td><a href="<?= BASE_URL_ADMIN.'?act=formupdatesanpham&id='.$sanpham['san_pham_id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                    <a href="<?= BASE_URL_ADMIN.'?act=deletesanpham&id='.$sanpham['san_pham_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><button class="btn btn-danger">Xóa</button></a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
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
