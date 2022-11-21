<?php
  $id_nv = $_GET['id_nv'];
  $conn = get_connection();
  // $sqlLoai = "SELECT * FROM khac";
  // $queryLoai = mysqli_query ($conn , $sqlLoai );

  $sql = "SELECT * FROM khachhang WHERE id=$id_nv";
  $query = mysqli_query ($conn , $sql );
  $row = mysqli_fetch_array($query);

  if(isset($_POST['capnhat'])){
    $ten=$_POST['name'];
    $diachi=$_POST['address'];
    $ntns=$_POST['ntns'];
    $sdt=$_POST['phone'];
    $gioitinh=$_POST['gioitinh'];

    if($_FILES['anhdaidien']['name']==''){
      $anhdaidien=$_POST['anhdaidien'];
    }
    else{
      $anhdaidien=$_FILES['anhdaidien']['name'];
      $tmp_name=$_FILES['anhdaidien']['tmp_name'];
    }

    $email=$_POST['mail'];
    $pass= $_POST['pass'];

    if(isset($ten)&&isset($diachi)&&isset($ntns)&&isset($sdt)&&isset($gioitinh)&&
    isset($anhdaidien)&&isset($email))
    {
      move_uploaded_file($tmp_name, '../dashboard/img_staff/'.$anhdaidien);
      $sql = "UPDATE `khachhang` 
      SET `name`='$ten',`sdt`='$sdt',`diachi`='$diachi',`ngaysinh`='$ntns',`gioitinh`='$gioitinh',
      `email`='$email',`avatar`='$anhdaidien' 
      WHERE id=$id_nv";
      $conn = get_connection();
      if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_dskh';</script>
<?php
        $_SESSION['nhanvien'] = "Cập nhật thành công";
      } else {
        $thongbao = "Cập nhật thất bại";
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
            <h1>Chỉnh sửa thông tin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="master.php?act=page_dsnv">Thông tin</a></li>
              <li class="breadcrumb-item active">Sửa nhân viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card card-primary mb-0">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
                <div class="form-group">
                  <label>Họ và Tên</label>
                  <input type="text" name="name" class="form-control" 
                    value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $row['name']?>" 
                    placeholder="Enter Name" 
                    required
                  >
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control"
                      value="<?php if(isset($_POST['address'])) echo $_POST['address']; else echo $row['diachi']?>" 
                      placeholder="Enter Address" 
                      required
                      >
                </div>
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input type="date" name="ntns"
                    value="<?php if(isset($_POST['ntns'])) echo $_POST['ntns']; else echo $row['ngaysinh']?>"
                    class="form-control"
                    style="width: 175px;"
                  >
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" name="phone" class="form-control"
                    value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; else echo $row['sdt']?>"
                    placeholder="Enter Phone" pattern="[0-9]{10}" 
                    required
                    style="width: 175px;"  
                  >
                </div>
                <div class="form-group">
                  <div><label>Giới tính</label></div>
                  <div>
                  <input type="radio" name="gioitinh"value="1" <?php if($row['gioitinh'] == 1) echo 'checked';?>>
                    <label class="mr-2">Nam</label>
                    <input type="radio" name="gioitinh" value="0" <?php if($row['gioitinh'] == 0) echo 'checked';?>>
                    <label>Nữ</label>
                  </div>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input style="margin-bottom:10px" type="file" name="anhdaidien" class="form-control-file">
                    <input type="hidden" name="anhdaidien" value="<?php echo $row['avatar']?>">
                    <img src="../dashboard/img_staff/<?php echo $row['avatar']?>" alt="<?php echo $row['avatar']?>" width="100px" height="100px">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="mail" class="form-control"
                    value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; else echo $row['email']?>" 
                    placeholder="Enter Email" 
                    required
                    style="width: 300px;"
                  >
                </div>
                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="text" name="pass" class="form-control" 
                    value="<?php echo $row['matkhau']?>" 
                    readonly
                  >
                </div>
                
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
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