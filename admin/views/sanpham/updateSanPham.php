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
          <h1>Sửa thông tin sản phẩm <?= $onesanpham['ten_san_pham'] ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=updatesanpham' ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="san_pham_id" value="<?= $onesanpham['id'] ?>">
              <div class="form-group">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $onesanpham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="text" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $onesanpham['gia_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                <input type="text" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $onesanpham['gia_khuyen_mai'] ?>">
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh sản phẩm</label>
                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
              </div>
              <div class="form-group">
                <label for="so_luong">Số lượng sản phẩm</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $onesanpham['so_luong'] ?>">
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Ngày nhập sản phẩm</label>
                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $onesanpham['ngay_nhap'] ?>">
                <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="danh_muc_id">Danh mục sản phẩm</label>
                <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                  <?php foreach ($listdanhmuc as $danhmuc) { ?>
                    <option <?= $danhmuc['id'] == $onesanpham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                  <?php } ?>
                </select>
                <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="trang_thai">
                  <option <?= $onesanpham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                  <option <?= $onesanpham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                </select>
                <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label>Mô tả</label>
                <textarea type="text" class="form-control" name="mo_ta" value="" placeholder="Nhập mô tả"><?= $onesanpham['mo_ta'] ?></textarea>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Albums ảnh sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=updatealbumanhsanpham' ?>" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th><div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> Thêm</button></div></th>
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="san_pham_id" value="<?= $onesanpham['id'] ?>">
                    <input type="hidden" name="img_delete" id="img_delete">
                    <?php
                      foreach($listanhsanpham as $key => $value) {
                    ?>
                      <tr id="faqs-row-<?= $key ?>">
                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                        <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 70px" alt=""></td>
                        <td><input type="file" name="img_arr[]" class="form-control" multiple></td>
                        <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                      </tr>
                    <?php 
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<!-- Code injected by live-server -->
<script>
  var faqs_row = <?= count($listanhsanpham); ?>;

  function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="https://media.tenor.com/7hxGGOtU2MoAAAAM/karyl-kyaru.gif" style="width: 70px" alt=""></td>';
    html += '<td><input type="file" name="img_arr[]" class="form-control" multiple></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }

  function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove()
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete')
      var currentValue = imgDeleteInput.value
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
  }
</script>
</body>

</html>