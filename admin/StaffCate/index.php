<script>
  function xoaDmNhanVien() {
    var conf = confirm("Bạn có chắc chắn muốn xóa chức vụ này không?");
    return conf;
  }
</script>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM loai_nv ORDER BY id";
  $dmnv = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chức vụ nhân viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chức vụ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php
          if(isset($_SESSION['dmnhanvien'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['dmnhanvien'];?></div>
        <?php
            unset($_SESSION['dmnhanvien']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card-header">
          <a href="master.php?act=page_add_dmnv">
            <h3 class="card-title">Thêm mới</h3>
          </a>
          <div class="card-tools">
          <form action="" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key" class="form-control float-right" placeholder="Search" required>
  
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
                    <th style="width: auto">Chức vụ</th>
                    <th style="width: auto">Lương cơ bản</th>
                    <th style="width: auto">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      if(isset($_POST['search'])){
                        $key = $_POST['key'];
                          $sqlSearch = "SELECT * FROM loai_nv
                            WHERE tenloai LIKE '%$key%'
                            ORDER BY id";
                          $qr = mysqli_query ($conn , $sqlSearch);
                            while ( $row = mysqli_fetch_array($qr)) {
                    ?>
                            <tr>
                            <td><?php echo $row['tenloai']?></td>
                            <td><?php echo number_format($row['luongcoban'])." VNĐ"?></td>
                            <td>
                              <div class="btn-group">
                                <abbr title="Sửa dữ liệu">
                                  <a href="master.php?act=page_edit_dmnv&id_dmnv=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-default btn-sm mr-2">
                                      <i class="nav-icon fas fa-edit"></i>
                                    </button>
                                  </a>
                                </abbr>
                                <abbr title="Xóa dữ liệu">
                                  <a onclick="return xoaDmNhanVien();" href="StaffCate/delete.php?id_dmnv=<?php echo $row['id']?>">
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
                        if( mysqli_num_rows ( $dmnv ) !=0){
                          while ( $row = mysqli_fetch_array($dmnv)) {
                    ?>
                          <tr>
                            <td><?php echo $row['tenloai']?></td>
                            <td><?php echo number_format($row['luongcoban'])." VNĐ"?></td>
                            <td>
                              <div class="btn-group">
                                <abbr title="Sửa dữ liệu">
                                  <a href="master.php?act=page_edit_dmnv&id_dmnv=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-default btn-sm mr-2">
                                      <i class="nav-icon fas fa-edit"></i>
                                    </button>
                                  </a>
                                </abbr>
                                <abbr title="Xóa dữ liệu">
                                  <a onclick="return xoaDmNhanVien();" href="StaffCate/delete.php?id_dmnv=<?php echo $row['id']?>">
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
                          echo "<td>"."Không có chức vụ nhân viên"."</td>";
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