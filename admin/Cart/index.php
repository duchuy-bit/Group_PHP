<script>
  function xoaNhanVien() {
    var conf = confirm("Bạn có chắc chắn muốn xóa thông tin giỏ hàng này không?");
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
  $sql = "SELECT * FROM khachhang";
  $dsnv = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin giỏ hàng</h1>
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
          <!-- <a href="master.php?act=page_add_dskh">
            <h3 class="card-title">Thêm mới</h3>
          </a> -->
          <div class="card-tools">
            <form action="" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key" class="form-control float-right"
                  value="<?php
                    if(isset($_POST['search'])) echo $_POST['key']
                  ?>"
                  placeholder="Search"
                >
  
                <div class="input-group-append">
                  <button type="submit" name="search" class="btn btn-default">
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
                    <th style="width: auto">STT</th>
                    <th style="width: auto">Họ và tên</th>
                    <th style="width: auto">Địa chỉ</th>
                    <!-- <th style="width: auto">Ngày sinh</th> -->
                    <th style="width: auto">Số điện thoại</th>
                    <!-- <th style="width: auto">Giới tính</th> -->
                    <th style="width: auto">Ảnh đại diện</th>
                    <th style="width: auto">Email</th>
                    <th style="width: auto">Số lượng dịch vụ</th>
                    <th style="width: 50px">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if(isset($_POST['search'])){
                        $key = $_POST['key'];
                          $sqlSearch = "SELECT * FROM khachhang
                            WHERE name LIKE '%$key%' or diachi like '%$key%' or sdt like '%$key%'
                            or email like '%$key%'
                            ORDER BY id";
                          $dem=0;
                          $qr = mysqli_query ($conn , $sqlSearch);
                          if(mysqli_num_rows($qr)!=0){
                            while ( $row = mysqli_fetch_array($qr)) {
                              $dem++;
                    ?>
                            <tr>
                              <td><?php echo $dem?></td>
                              <td><?php echo $row['name']?></td>
                              <td><?php echo $row['diachi']?></td>
                              <td><?php echo $row['sdt']?></td>
                              <td align='center'>
                                <img src="../dashboard/img_staff/<?php echo $row['avatar']?>" alt="<?php echo $row['avatar']?>" width="100px" height="100px">
                              </td>
                              <td><?php echo $row['email']?></td>
                              <td><?php custom_echo($row['matkhau'], 10);?></td>
                              <td>
                                <div class="btn-group">
                                  <abbr title="Sửa dữ liệu">
                                    <a href="master.php?act=page_edit_dskh&id_nv=<?php echo $row['id']?>">
                                      <button type="button" class="btn btn-default btn-sm mr-2">
                                        <i class="nav-icon fas fa-edit"></i>
                                      </button>
                                    </a>
                                  </abbr>
                                  <abbr title="Xóa dữ liệu">
                                    <a onclick="return xoaNhanVien();" href="Customer/delete.php?id_nv=<?php echo $row['id']?>">
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
                        } else echo "<tr><td colspan='8' align='center'><label>Không tìm thấy thông tin</label><td><tr>";
                      }
                      else{
                    ?>
                    <?php
                    $dem=0;
                      if( mysqli_num_rows ( $dsnv ) !=0){
                        while ( $row = mysqli_fetch_array($dsnv)) {
                          $dem++;
                    ?>
                      <tr>
                        <td><?php echo $dem?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['diachi']?></td>
                        <td><?php echo $row['sdt']?></td>
                        <td align='center'>
                          <img src="../dashboard/img_staff/<?php echo $row['avatar']?>" alt="<?php echo $row['avatar']?>" width="100px" height="100px">
                        </td>
                        <td><?php echo $row['email']?></td>
                        <td><?php
                            $sqltamthoi="SELECT *  from giohang where id_khachhang = '".$row['id']."'";
                            $result = mysqli_query($conn, $sqltamthoi);
                            echo mysqli_num_rows($result);
                        ?></td>
                        <td align="center">
                          <div class="btn-group">
                            <abbr title="Sửa dữ liệu">
                              <a href="master.php?act=page_edit_dscart&id_nv=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-default btn-sm mr-2">
                                  <i class="nav-icon fas fa-edit"></i>
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