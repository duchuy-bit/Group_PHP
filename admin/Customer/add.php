<?php
  if(isset($_POST['themmoi']))
  {
    $ten=$_POST['name'];
    $diachi=$_POST['address'];
    $ntns=$_POST['ntns'];
    $sdt=$_POST['phone'];
    $gioitinh=$_POST['gioitinh'];

    if($_FILES['anhdaidien']['name']==''){
      $error_anhdaidien="<span style='color: red;'>(*)</span>";
    }
    else{
      $anhdaidien=$_FILES['anhdaidien']['name'];
      $tmp_name=$_FILES['anhdaidien']['tmp_name'];
    }

    $email=$_POST['mail'];
    $pass= password_hash($_POST['pass'], PASSWORD_DEFAULT);

    // if($_POST['id_loainv'] == 'unselect'){
    //   $error_id_loainv="<span style='color: red;'>(*)</span>";
    // }
    // else{
    //   $id_loainv=$_POST['id_loainv'];
    // }
    // $soca=$_POST['soca'];

    if(isset($ten)&&isset($diachi)&&isset($ntns)&&isset($sdt)&&isset($gioitinh)&&
    isset($anhdaidien)&&isset($email)&&isset($pass))
    {
      move_uploaded_file($tmp_name, '../dashboard/img_staff/'.$anhdaidien);
      $sql = "INSERT 
      INTO `khachhang`(`id`, `name`, `sdt`, `diachi`, `ngaysinh`, `gioitinh`, `email`, `matkhau`, `avatar`) 
      VALUES (null,'$ten','$sdt','$diachi','$ntns','$gioitinh','$email','$pass','$anhdaidien')";
      $conn = get_connection();
      if (mysqli_query($conn, $sql)) {
?>
        <script>window.location.href = 'master.php?act=page_dskh';</script>
<?php
        $_SESSION['nhanvien'] = "Thêm thành công";
      } else {
        $thongbao = "Thêm thất bại";
      }
    }
    else{
      $thongbao = "Vui lòng điền đầy đủ thông tin";
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
            <h1>Thêm mới</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="master.php?act=page_dskh">Thông tin</a></li>
              <li class="breadcrumb-item active">Thêm khách hàng</li>
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
                  <label>Họ và Tên</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input type="date" name="ntns" class="form-control"
                    style="width: 200px;"
                  >
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" name="phone" class="form-control" 
                    placeholder="Enter Phone" 
                    pattern="[0-9]{10}" 
                    required
                    style="width: 200px;"
                  >
                </div>
                <div class="form-group">
                  <div><label>Giới tính</label></div>
                  <div>
                  <input type="radio" name="gioitinh" value="1" checked>
                    <label class="mr-2">Nam</label>
                    <input type="radio" name="gioitinh" value="0">
                    <label>Nữ</label>
                  </div>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="anhdaidien" class="form-control-file">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="mail" class="form-control" placeholder="Enter Email"
                    style="width: 400px;"
                    required>
                </div>
                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="text" name="pass" class="form-control" placeholder="Enter Password" required>
                </div>
                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
                <a href="master.php?act=page_dskh">
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