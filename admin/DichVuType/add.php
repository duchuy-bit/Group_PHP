<?php
  if(isset($_POST['themmoi']))
  {
    $tenloai=$_POST['loaidv'];

         $sql = "INSERT into loai_dichvu (tenloai) VALUES ('$tenloai')";
        $conn = get_connection();
        if (mysqli_query($conn, $sql)) {
?>
            <script>window.location.href = 'master.php?act=page_loaidv';</script>
<?php
            $_SESSION['loaidv'] = "Thêm loại dịch vụ thành công";
        } else {
                $thongbao = "Thêm loại dịch vụ thất bại";
        }
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới loại dịch vụ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="master.php?act=page_loaidv">Loại dịch vụ</a></li>
              <li class="breadcrumb-item active">Thêm loại dịch vụ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php
            if(isset($thongbao))
              echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <!-- /.card-header -->
        <div class="card card-primary mb-0">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Loại dịch vụ</label>
                  <input type="text" name="loaidv" class="form-control" placeholder="Enter ServiceType" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
                <a href="master.php?act=page_loaidv">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
              </div>
            </form>
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->