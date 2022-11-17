<?php
  $id_nv = $_GET['id_nv'];
  $conn = get_connection();
  $sqlLoai = "SELECT * FROM loai_nv";
  $queryLoai = mysqli_query ($conn , $sqlLoai );

  $sql = "SELECT * FROM nhanvien WHERE idnv=$id_nv";
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
    $id_loainv=$_POST['id_loainv'];
    $soca= $_POST['soca'];

    if(isset($ten)&&isset($diachi)&&isset($ntns)&&isset($sdt)&&isset($gioitinh)&&
    isset($anhdaidien)&&isset($email)&&isset($pass)&&isset($id_loainv))
    {
      move_uploaded_file($tmp_name, '../dashboard/img_staff/'.$anhdaidien);
      $sql = "UPDATE nhanvien 
      SET ten='$ten', diachi='$diachi', ngaysinh='$ntns', sdt='$sdt', gioitinh='$gioitinh', anh='$anhdaidien', email='$email', matkhau='$pass', id_loai='$id_loainv', soca='$soca'
      WHERE idnv=$id_nv";
      $conn = get_connection();
      if (mysqli_query($conn, $sql)) {
?>
      <script>window.location.href = 'master.php?act=page_dsnv';</script>
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
                  <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $row['ten']?>" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?php if(isset($_POST['address'])) echo $_POST['address']; else echo $row['diachi']?>" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input type="date" name="ntns" value="<?php if(isset($_POST['ntns'])) echo $_POST['ntns']; else echo $row['ngaysinh']?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" name="phone" class="form-control" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; else echo $row['sdt']?>" placeholder="Enter Phone" pattern="[0-9]{10}" required>
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
                    <input type="hidden" name="anhdaidien" value="<?php echo $row['anh']?>">
                    <img src="../dashboard/img_staff/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="100px" height="100px">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="mail" class="form-control" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; else echo $row['email']?>" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="text" name="pass" class="form-control" value="<?php echo $row['matkhau']?>" readonly>
                </div>
                <div class="form-group">
                  <label>Chức vụ</label>
                  <div>
                    <select name='id_loainv' required>
                      <?php
                        while ( $rowLoai = mysqli_fetch_array($queryLoai)) {
                      ?> 
                      <option
                        <?php
                          if($row['id_loai'] == $rowLoai['id'])
                            echo 'selected="selected"'
                        ?>
                        value="<?php echo $rowLoai['id'] ?>"><?php echo $rowLoai['tenloai'] ?>
                      </option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Số ca</label>
                  <input type="number" name="soca" value="<?php if(isset($_POST['soca'])) echo $_POST['soca']; else echo $row['soca']?>" class="form-control" placeholder="Enter Cases" required>
                </div>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
              <a href="master.php?act=page_dsnv">
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