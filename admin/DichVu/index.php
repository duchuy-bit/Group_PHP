<script>
  function xoaNhanVien() {
    var conf = confirm("Bạn có chắc chắn muốn xóa thông tin nhân viên này không?");
    return conf;
  }
</script>

<?php
  function custom_echo($x, $length)
  {
    if(strlen($x)<=$length)
    {
      echo $x;
    }
    else
    {
      $y=substr($x,0,$length) . '...';
      echo $y;
    }
  }
?>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM nhanvien
          INNER JOIN loai_nv ON loai_nv.id = nhanvien.id_loai
          ORDER BY nhanvien.idnv";
  $dsnv = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin nhân viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thông tin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php
          if(isset($_SESSION['nhanvien'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['nhanvien'];?></div>
        <?php
            unset($_SESSION['nhanvien']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card-header">
          <a href="master.php?act=page_addnv">
            <h3 class="card-title">Thêm mới</h3>
          </a>
          <div class="card-tools">
            <form action="">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key" class="form-control float-right" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: auto">Họ và tên</th>
                    <th style="width: auto">Địa chỉ</th>
                    <th style="width: auto">Ngày sinh</th>
                    <th style="width: auto">Số điện thoại</th>
                    <th style="width: auto">Giới tính</th>
                    <th style="width: auto">Ảnh đại diện</th>
                    <th style="width: auto">Chức vụ</th>
                    <th style="width: auto">Số ca</th>
                    <th style="width: auto">Email</th>
                    <th style="width: auto">Mật khẩu</th>
                    <th style="width: auto">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if( mysqli_num_rows ( $dsnv ) !=0){
                        while ( $row = mysqli_fetch_array($dsnv)) {
                    ?>
                      <tr>
                        <td><?php echo $row['ten']?></td>
                        <td><?php echo $row['diachi']?></td>
                        <td><?php echo date("d-m-Y", strtotime($row['ngaysinh']));?></td>
                        <td><?php echo $row['sdt']?></td>
                        <td><?php if($row['gioitinh'] == 0) echo "Nữ"; else echo "Nam";?></td>
                        <td align='center'>
                          <img src="../dashboard/img_staff/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="100px" height="100px">
                        </td>
                        <td><?php echo $row['tenloai']?></td>
                        <td><?php echo $row['soca']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php custom_echo($row['matkhau'], 10);?></td>
                        <td>
                          <div class="btn-group">
                            <abbr title="Sửa dữ liệu">
                              <a href="master.php?act=page_editnv&id_nv=<?php echo $row['idnv']?>">
                                <button type="button" class="btn btn-default btn-sm mr-2">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                              </a>
                            </abbr>
                            <abbr title="Xóa dữ liệu">
                              <a onclick="return xoaNhanVien();" href="Staff/delete.php?id_nv=<?php echo $row['idnv']?>">
                                <button type="button" class="btn btn-default btn-sm">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </a>
                            </abbr>
                          </div>
                        </td>
                      </tr>
                    <?php
                        }
                      }
                      else{
                        echo "<td>"."Không có nhân viên"."</td>";
                      }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>