<?php
  $id_loaidv = $_GET['id_loaidv'];
  $conn = get_connection();

  $sql = "SELECT * FROM loai_dichvu WHERE id=$id_loaidv";
  $query = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $tenloai=$_POST['loaidv'];
    
    $sql = "UPDATE loai_dichvu SET tenloai='$tenloai' WHERE id=$id_loaidv";
    $conn = get_connection();
    if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_loaidv';</script>
<?php
        $_SESSION['loaidv'] = "Cập nhật loại dịch vụ thành công";
    } else {
        $thongbao = "Cập nhật loại dịch vụ thất bại";
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
            <h1>Chỉnh sửa loại dịch vụ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="master.php?act=page_loaidv">Loại dịch vụ</a></li>
              <li class="breadcrumb-item active">Sửa loại dịch vụ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!-- /.card-header -->
        <div class="card card-primary mb-0">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
                <div class="form-group">
                  <label>Loại dịch vụ</label>
                  <input type="text" name="loaidv" class="form-control" value="<?php if(isset($_POST['loaidv'])) echo $_POST['loaidv']; else echo $row['tenloai']?>" placeholder="Enter ServiceType" required>
                </div>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
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