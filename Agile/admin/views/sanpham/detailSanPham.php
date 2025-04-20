<!-- header -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary font-weight-bold">Quản lý chi tiết sản phẩm</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="card shadow-lg">
      <div class="card-body">
        <div class="row">
          <!-- Image Section -->
          <div class="col-md-6">
            <div class="mb-3 text-center">
            <img class="product-image" style="width: 400px; height: 400px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" src="<?= BASE_URL . $sanPham['hinh_anh']; ?>" alt="Hình ảnh sản phẩm">
            </div>
            <div class="d-flex justify-content-center flex-wrap gap-2">
              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>" style="cursor: pointer; border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                  <img style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;" src="<?= BASE_URL . $anhSP["link_hinh_anh"]; ?>">
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Info Section -->
          <div class="col-md-6">
            <h3 class="mb-3 text-dark">Tên sản phẩm: <span class="text-secondary font-italic"><?= $sanPham['ten_sach']; ?></span></h3>
            <p><strong>Tác giả:</strong> <?= $sanPham['tac_gia']; ?></p>
            <p><strong>Giá khuyến mãi:</strong> <span class="text-danger font-weight-bold"><?= number_format($sanPham['gia'], 0, ',', '.') ?> VND</span></p>
            <p><strong>Số lượng còn lại:</strong> <?= $sanPham['so_luong']; ?></p>
            <p><strong>Danh mục:</strong> <?= $sanPham['ten_danh_muc']; ?></p>
            <p><strong>Mô tả:</strong> <div style="white-space: pre-line;"><?= $sanPham['mo_ta']; ?></div></p>
          </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-5">
          <h4 class="text-primary">Bình luận của sản phẩm</h4>

          <?php if (!empty($listBinhLuan)) : ?>
            <div class="table-responsive">
              <table id="example2" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>STT</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td>
                        <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan["tai_khoan_id"]; ?>">
                          <?= $binhLuan['ho_ten'] ?>
                        </a>
                      </td>
                      <td><?= $binhLuan['noi_dung'] ?></td>
                      <td><?= $binhLuan['ngay_dang'] ?></td>
                      <td>
                        <span class="badge badge-<?= $binhLuan['trang_thai'] == 1 ? 'success' : 'secondary' ?>">
                          <?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?>
                        </span>
                      </td>
                      <td>
                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                          <input type="hidden" name="name_view" value="detail_sanpham">
                          <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">
                          <button onclick="return confirm('Bạn có muốn cập nhật trạng thái bình luận này?')" class="btn btn-sm btn-outline-warning">
                            <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn 👁️‍🗨️' : 'Bỏ ẩn 🚫' ?>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else : ?>
            <p class="text-muted mt-3">Chưa có bình luận nào cho sản phẩm này.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include './views/layout/footer.php'; ?>

<!-- DataTable -->
<script>
  $(function () {
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

<!-- Image switching script -->
<script>
  $(document).ready(function () {
    $('.product-image-thumb').on('click', function () {
      let $image_element = $(this).find('img');
      let newSrc = $image_element.attr('src');

      // Cập nhật ảnh lớn
      $('.product-image').attr('src', newSrc);

      // Highlight ảnh được chọn
      $('.product-image-thumb').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>
