<?php
  $id_dmnv = $_GET['id_dmnv'];
  $conn = get_connection();

  $sql = "SELECT * FROM loai_nv WHERE id=$id_dmnv";
  $query = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $tenloai=$_POST['chucvu'];
    $luongcoban=$_POST['luong'];
    
    $sql = "UPDATE loai_nv SET tenloai='$tenloai', luongcoban='$luongcoban' WHERE id=$id_dmnv";
    $conn = get_connection();
    if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_dmnv';</script>
<?php
        $_SESSION['dmnhanvien'] = "Cập nhật chức vụ thành công";
    } else {
        $thongbao = "Cập nhật chức vụ thất bại";
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
            <h1>Chỉnh sửa chức vụ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="master.php?act=page_dmnv">Chức vụ</a></li>
              <li class="breadcrumb-item active">Sửa chức vụ</li>
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
                  <label>Chức vụ</label>
                  <input type="text" name="chucvu" class="form-control" value="<?php if(isset($_POST['chucvu'])) echo $_POST['chucvu']; else echo $row['tenloai']?>" placeholder="Enter Position" required>
                </div>
                <div class="form-group">
                    <label>Lương cơ bản</label>
                    <input type="text" name="luong" class="form-control" value="<?php if(isset($_POST['luong'])) echo $_POST['luong']; else echo $row['luongcoban']?>" placeholder="Enter Salary" required>
                </div>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
              <a href="master.php?act=page_dmnv">
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