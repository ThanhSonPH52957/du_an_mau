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
          <div class="col-6">
            <img src="<?= BASE_URL.$khachhang['anh_dai_dien']?>" style="width: 60%" alt="" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/1144/1144760.png'">
          </div>
          <div class="col-6">
            <div class="container">
                <table class="table table-borderless">
                    <tbody style="font-size: large;">
                        <tr>
                            <th>Họ tên:</th>
                            <td><?= $khachhang['ho_ten'] ?? ''  ?></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <td><?= formatDate($khachhang['ngay_sinh']) ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?= $khachhang['email'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td><?= $khachhang['so_dien_thoai'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td><?= $khachhang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <td><?= $khachhang['dia_chi'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
                            <td><?= $khachhang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          
          <div class="col-12" style="margin: 30px 0 0 0">
          <hr>
            <h2>Lịch sử mua hàng</h2>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listdonhang as  $key => $donhang) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donhang['ma_don_hang'] ?></td>
                    <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donhang['ngay_dat'] ?></td>
                    <td><?= $donhang['tong_tien'] ?></td>
                    <td><?= $donhang['ten_trang_thai'] ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
          </div>

          <div class="col-12" style="margin: 30px 0 30px 0">
          <hr>
            <h2>Lịch sử bình luận</h2>
            <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listbinhluan as  $key => $binhluan) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><a target="_blank" href="<?= BASE_URL_ADMIN.'?act=chitietsanpham&id='.$binhluan['san_pham_id'] ?>"><?= $binhluan['ten_san_pham'] ?></a></td>
                    <td><?= $binhluan['noi_dung'] ?></td>
                    <td><?= $binhluan['ngay_dang'] ?></td>
                    <td><?= $binhluan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                    <td>
                        <form action="<?= BASE_URL_ADMIN.'?act=updatebinhluan' ?>" method="post">
                          <input type="hidden" name="id_khach_hang" value="<?= $binhluan['tai_khoan_id'] ?>">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhluan['id'] ?>">
                          <input type="hidden" name="name_view" value="detail_khach">
                          <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')" class="btn <?= $binhluan['trang_thai'] == 1 ? 'btn-danger' : 'btn-primary'?>"><?= $binhluan['trang_thai'] == 1 ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>'?></button>
                        </form>
                    </td>
                  </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "responsive": true,
        "lengthChange": false, 
        "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
</html>
