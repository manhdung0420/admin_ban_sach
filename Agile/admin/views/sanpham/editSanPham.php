<!-- header -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-11">
          <h1>Sửa thông tin sản phẩm <?= $sanPham['ten_sach'] ?></h1>
        </div>
        <div class="col-sm-1">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quat lại</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">

              <div class="row">
                <div class="form-group col-12">
                  <label for="ten_sach">Tên Sách</label>
                  <input type="text" class="form-control" name="ten_sach" id="ten_sach" placeholder="Nhập tên sách" value="<?= $sanPham['ten_sach'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['ten_sach'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten_sach'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                  <label for="tac_gia">Tác giả</label>
                  <input type="text" class="form-control" name="tac_gia" id="tac_gia" placeholder="Nhập tên tác giả" value="<?= $sanPham['tac_gia'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['tac_gia'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['tac_gia'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                  <label for="the_loai">Thể loại</label>
                  <input type="text" class="form-control" name="the_loai" id="the_loai" placeholder="Nhập thể loại" value="<?= $sanPham['the_loai'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['the_loai'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['the_loai'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                  <label for="so_luong">Số lượng</label>
                  <input type="number" class="form-control" name="so_luong" id="so_luong" placeholder="Nhập số lượng" value="<?= $sanPham['so_luong'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['so_luong'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                  <label for="gia">Giá</label>
                  <input type="number" class="form-control" name="gia" id="gia" placeholder="Nhập giá" value="<?= $sanPham['gia'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['gia'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-12">
                  <label for="danh_muc_id">Danh mục sách</label>
                  <select id="danh_muc_id" name="danh_muc_id" class="form-control">
                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                      <option <?= $danhMuc["id"] == $sanPham["danh_muc_id"] ? 'selected' : '' ?> value="<?= $danhMuc["id"]; ?>"><?= $danhMuc["ten_danh_muc"]; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?php if (!empty($_SESSION['error']['danh_muc_id'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-12">
                  <label for="hinh_anh">Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh_anh" id="hinh_anh" value="<?= $sanPham['hinh_anh'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['hinh_anh'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-12">
                  <label for="mo_ta">Mô tả sản phẩm</label>
                  <input type="text" id="mo_ta" name="mo_ta" class="form-control" value="<?= $sanPham['mo_ta'] ?? '' ?>">
                  <?php if (!empty($_SESSION['error']['mo_ta'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></p>
                  <?php endif; ?>
                </div>
              </div>

              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
              </div>

          </form>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post" enctype="multipart/form-data">
              <!-- Nội dung album ảnh sản phẩm -->
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> Thêm</button></div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham["id"] ?>">
                    <input type="hidden" id="img_delete" name="img_delete">
                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                      <tr id="faqs-row-<?= $key ?>">
                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                        <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px;" alt=""></td>
                        <td><input type="file" name="img_array[]" class="form-control"></td>
                        <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>

          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>
<script>
  var faqs_row = <?= count($listAnhSanPham); ?>;

  function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2021/12/tong-hop-meo-giup-ban-chup-nhung-buc-anh-dep-hon-ve-thu-cung-cua-minh.jpg.webp" style="width: 50px; height: 50px;" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }

  function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete')
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
  }
</script>

</html>