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
        <div class="col-sm-6">
          <h1>Chi tiết bình luận</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">



          <!-- Chi tiết bình luận -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-comment"></i> Bình luận của khách hàng
                  <small class="float-right">Ngày đăng: <?= formatDate($binhLuan['ngay_dang']); ?></small>
                </h4>
              </div>
            </div>
            <!-- info row -->
            <div class="">
              <div class="col-sm-4 invoice-col">
                <address>
                  <strong>Nội dung: </strong><?= $binhLuan['noi_dung'] ?><br>
                  Ngày đăng: <?= $binhLuan['ngay_dang'] ?>
                </address>
              </div><br>
              <div class="col-sm-4 invoice-col">
                <strong>Thông tin người dùng bình luận</strong>
                <address>
                  Tài khoản: <?= $binhLuan['ho_ten'] ?><br>
                  Email: <?= $binhLuan['email'] ?><br>
                  Số điện thoại: <?= $binhLuan['so_dien_thoai'] ?>
                </address>
              </div><br>
              <!-- /// -->
              <div class="col-sm-4 invoice-col">
                <strong>Thông tin sản phẩm bình luận</strong>
                <address>
                  Mã sản phẩm: sp00<?= $binhLuan['san_pham_id'] ?><br>
                  Sản phẩm: <?= $binhLuan['ten_sach'] ?><br>


                </address>
              </div>
              <!-- /.col -->

            </div>




          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
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

</body>

</html>