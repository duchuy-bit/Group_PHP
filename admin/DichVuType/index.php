<script>
  function xoaLoaiDV() {
    var conf = confirm("Bạn có chắc chắn muốn xóa dịch vụ này không?");
    return conf;
  }
</script>

<?php
  $conn = get_connection();
  $sql = "SELECT * FROM loai_dichvu ORDER BY id";
  $loaidv = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loại dịch vụ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Loại dịch vụ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php
          if(isset($_SESSION['loaidv'])){
        ?>
            <div class='alert alert-success'><?php echo $_SESSION['loaidv'];?></div>
        <?php
            unset($_SESSION['loaidv']);
          }
          if(isset($thongbao))
            echo "<div class='alert alert-success'>".$thongbao."</div>";
        ?>
        <div class="card-header">
          <a href="master.php?act=page_add_loaidv">
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
                    <th style="width: auto">Loại dịch vụ</th>
                    <th style="width: auto">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      if(isset($_POST['search'])){
                        $key = $_POST['key'];
                          $sqlSearch = "SELECT * FROM loai_dichvu
                            WHERE tenloai LIKE '%$key%'
                            ORDER BY id";
                          $qr = mysqli_query ($conn , $sqlSearch);
                            while ( $row = mysqli_fetch_array($qr)) {
                    ?>
                       <tr>
                        <td><?php echo $row['tenloai']?></td>
                        <td>
                          <div class="btn-group">
                            <abbr title="Sửa dữ liệu">
                              <a href="master.php?act=page_edit_loaidv&id_loaidv=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-default btn-sm mr-2">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                              </a>
                            </abbr>
                            <abbr title="Xóa dữ liệu">
                              <a onclick="return xoaLoaiDV();" href="DichVuType/delete.php?id_loaidv=<?php echo $row['id']?>">
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
                      if( mysqli_num_rows ( $loaidv ) !=0){
                        while ( $row = mysqli_fetch_array($loaidv)) {
                    ?>
                      <tr>
                        <td><?php echo $row['tenloai']?></td>
                        <td>
                          <div class="btn-group">
                            <abbr title="Sửa dữ liệu">
                              <a href="master.php?act=page_edit_loaidv&id_loaidv=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-default btn-sm mr-2">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                              </a>
                            </abbr>
                            <abbr title="Xóa dữ liệu">
                              <a onclick="return xoaLoaiDV();" href="DichVuType/delete.php?id_loaidv=<?php echo $row['id']?>">
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
                        echo "<td>"."Không có loại dịch vụ"."</td>";
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