<?php require './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh sách sản phẩm</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm Sản Phẩm</h3>
            </div>

            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="post" enctype="multipart/form-data">
              <div class="row card-body">
                <div class="form-group col-12">
                  <label>Tên Sách</label>
                  <input type="text" class="form-control" name="ten_sach" placeholder="Nhập tên sách">
                  <?php if (isset($_SESSION['error']['ten_sach'])) echo '<p class="text-danger">' . $_SESSION['error']['ten_sach'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Tác giả</label>
                  <input type="text" class="form-control" name="tac_gia" placeholder="Nhập tên tác giả">
                  <?php if (isset($_SESSION['error']['tac_gia'])) echo '<p class="text-danger">' . $_SESSION['error']['tac_gia'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Thể loại</label>
                  <input type="text" class="form-control" name="the_loai" placeholder="Nhập thể loại">
                  <?php if (isset($_SESSION['error']['the_loai'])) echo '<p class="text-danger">' . $_SESSION['error']['the_loai'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                  <?php if (isset($_SESSION['error']['so_luong'])) echo '<p class="text-danger">' . $_SESSION['error']['so_luong'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá</label>
                  <input type="number" class="form-control" name="gia" placeholder="Nhập giá">
                  <?php if (isset($_SESSION['error']['gia'])) echo '<p class="text-danger">' . $_SESSION['error']['gia'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="danh_muc_id">
                    <option selected disabled>Chọn danh mục</option>
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                      <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php if (isset($_SESSION['error']['danh_muc_id'])) echo '<p class="text-danger">' . $_SESSION['error']['danh_muc_id'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh_anh">
                  <?php if (isset($_SESSION['error']['hinh_anh'])) echo '<p class="text-danger">' . $_SESSION['error']['hinh_anh'] . '</p>'; ?>
                </div>

                <div class="form-group col-6">
                  <label>Album ảnh</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>
                </div>

                <div class="form-group col-12">
                  <label>Mô tả</label>
                  <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả"></textarea>
                </div>
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include './views/layout/footer.php'; ?>
