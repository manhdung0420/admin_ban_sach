
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
          <div class="col-sm-6">
            <h1>Quản lý danh mục sản phẩm</h1>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyễn mãi</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngay nhập</th>
                    <th>Mô Tả</th>
                    <th>Danh mục id</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($listDanhMuc as $key=>$danhmuc):?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $danhmuc['ten_san_pham'] ?></td>
                      <td><?= $danhmuc['gia_san_pham'] ?></td>
                      <td><?= $danhmuc['gia_khuyen_mai'] ?></td>
                      <td><?= $danhmuc['hinh_anh'] ?></td>
                      <td><?= $danhmuc['so_luong'] ?></td>
                      <td><?= $danhmuc['luot_xem'] ?></td>
                      <td><?= $danhmuc['ngay_nhap'] ?></td>
                      <td><?= $danhmuc['mo_ta'] ?></td>
                      <td><?= ($danhmuc['danh_muc_id'] == 1) ? 'chó ta' : (($danhmuc['danh_muc_id'] == 2) ? 'chó tây' : '') ?> </td>
                      <td><?= ($danhmuc['trang_thai'] == 1) ? 'còn hàng' : (($danhmuc['trang_thai'] == 0) ? 'hết' : '')?></td>
                      <td>
                        <button class="btn btn-warning">Sửa</button>
                        <button class="btn btn-danger">Xoá</button>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyễn mãi</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngay nhập</th>
                    <th>Mô Tả</th>
                    <th>Danh mục id</th>
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
  <!-- Page specific script -->
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
