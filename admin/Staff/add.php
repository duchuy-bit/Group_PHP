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

    if($_POST['id_loainv'] == 'unselect'){
      $error_id_loainv="<span style='color: red;'>(*)</span>";
    }
    else{
      $id_loainv=$_POST['id_loainv'];
    }
    $soca=$_POST['soca'];

    if(isset($ten)&&isset($diachi)&&isset($ntns)&&isset($sdt)&&isset($gioitinh)&&
    isset($anhdaidien)&&isset($email)&&isset($pass)&&isset($id_loainv))
    {
      move_uploaded_file($tmp_name, '../dashboard/img_staff/'.$anhdaidien);
      $sql = "INSERT into nhanvien (ten, diachi, ngaysinh, sdt, gioitinh, anh, email, matkhau, id_loai, soca)
        VALUES ('$ten', '$diachi', '$ntns', '$sdt', '$gioitinh', '$anhdaidien', '$email', '$pass', '$id_loainv', '$soca')";
      $conn = get_connection();
      if (mysqli_query($conn, $sql)) {
        $getidnv = mysqli_query($conn, "SELECT * FROM nhanvien");

        $d=0; $idnv='';
        while ($resultidnv = mysqli_fetch_array($getidnv))
        {
          $d++;
          if ($d === mysqli_num_rows($getidnv)) $idnv= $resultidnv['idnv'];
        }
        // $resultidnv = mysqli_fetch_array($getidnv);
        $sql1 = "INSERT INTO `soca`(`id`, `id_nv`, `soca`) VALUES (null,'".$idnv."','$soca')";
        mysqli_query($conn, $sql1);
?>
        <script>window.location.href = 'master.php?act=page_dsnv';</script>
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
              <li class="breadcrumb-item"><a href="master.php?act=page_dsnv">Thông tin</a></li>
              <li class="breadcrumb-item active">Thêm nhân viên</li>
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
                  <input type="date" name="ntns" class="form-control">
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                  <div><label>Giới tính</label></div>
                  <div>
                  <input type="radio" name="gioitinh" value="1" required>
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
                  <input type="text" name="mail" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="text" name="pass" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                  <label>Chức vụ</label>
                  <div>
                    <select name='id_loainv'>
                      <option value='unselect' selected>Chọn chức vụ</option>
                      <?php
                        $conn = get_connection();
                        $sqlDm = "SELECT * FROM loai_nv";
                        $queryDm = mysqli_query ($conn , $sqlDm );
                        while ( $rowDm = mysqli_fetch_array($queryDm)) {
                      ?> 
                      <option value="<?php echo $rowDm['id'] ?>"><?php echo $rowDm['tenloai'] ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Số ca</label>
                  <input type="number" name="soca" value="0" class="form-control" placeholder="Enter Cases" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="themmoi" class="btn btn-primary">Thêm</button>
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