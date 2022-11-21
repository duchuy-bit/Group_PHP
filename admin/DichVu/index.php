<script>
  function xoaNhanVien() {
    var conf = confirm("Bạn có chắc chắn muốn xóa thông tin dịch vụ này không?");
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
  $sql = "SELECT * FROM dichvu";
  $dsnv = mysqli_query($conn, $sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin dịch vụ</h1>
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
          <a href="master.php?act=page_add_dsdv">
            <h3 class="card-title">Thêm mới</h3>
          </a>
          <div class="card-tools">
            <form action="" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key" class="form-control float-right" 
                  placeholder="Search"
                  value="<?php
                    if (isset($_POST['search'])) echo $_POST['key']
                  ?>"
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
                    <th style="width: 250px">Tên</th>
                    <th style="width: auto">Ảnh</th>
                    <th style="width: 125px">Loại dịch vụ</th>
                    <th style="width: 50px">Xếp loại</th>
                    <th style="width: auto">Giá</th>
                    <th style="width: auto">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if(isset($_POST['search'])){
                        $key = $_POST['key'];
                          $d=0;
                          $sqlSearch = "SELECT * FROM dichvu
                            where ten like '%$key%' or mota like '%$key%' or xeploai like '%$key%' or diachi like '%$key%' ";
                          $qr = mysqli_query ($conn , $sqlSearch);
                            while ( $row = mysqli_fetch_array($qr)) {
                              $d++;
                    ?>
                            <tr>
                              <td><?php echo $d?></td>
                              <td><?php echo $row['ten']?></td>
                              <td align='center'>
                                <img src="../dashboard/image_dichvu/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="120px" height="80px">
                              </td>
                              
                              <td><?php 
                                $sqltam="SELECT * from loai_dichvu where id= '".$row['id_loai']."' ";
                                $resulttam = mysqli_query ($conn , $sqltam);

                                if( mysqli_num_rows ( $resulttam ) !=0){
                                  while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                    echo $rowtam['tenloai'] ."";
                                  }
                                }
                              ?></td>
                              <td><?php echo $row['xeploai'];?></td>
                              <td><?php 
                                $sqltam="SELECT * from gia where id_dichvu= '".$row['id']."' ";
                                $resulttam = mysqli_query ($conn , $sqltam);

                                if( mysqli_num_rows ( $resulttam ) !=0){
                                  echo "<div class='row'>";
                                  while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                    if ($rowtam['loaive'] === '1')
                                      echo "Người lớn: &nbsp; ";
                                    else 
                                      echo "Trẻ nhỏ: &emsp; &nbsp;";
                                    echo $rowtam['giatien'] ." VND<br>";
                                  }
                                  echo "</div>";
                                }
                              ?></td>
                              <td>
                                <div class="btn-group">
                                  <abbr title="Sửa dữ liệu">
                                    <a href="master.php?act=page_edit_dsdv&id_nv=<?php echo $row['id']?>">
                                      <button type="button" class="btn btn-default btn-sm mr-2">
                                        <i class="nav-icon fas fa-edit"></i>
                                      </button>
                                    </a>
                                  </abbr>
                                  <abbr title="Xóa dữ liệu">
                                    <a onclick="return xoaNhanVien();" href="Dichvu/delete.php?id_nv=<?php echo $row['id']?>">
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
                    ?>
                    <?php
                      $d=0;
                      if( mysqli_num_rows ( $dsnv ) !=0){
                        while ( $row = mysqli_fetch_array($dsnv)) {
                          $d++;
                    ?>
                      <tr>
                        <td><?php echo $d?></td>
                        <td><?php echo $row['ten']?></td>
                        <td align='center'>
                          <img src="../dashboard/image_dichvu/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="120px" height="80px">
                        </td>
                        
                        <td><?php 
                          $sqltam="SELECT * from loai_dichvu where id= '".$row['id_loai']."' ";
                          $resulttam = mysqli_query ($conn , $sqltam);

                          if( mysqli_num_rows ( $resulttam ) !=0){
                            while ( $rowtam = mysqli_fetch_array($resulttam)) {
                              echo $rowtam['tenloai'] ."";
                            }
                          }
                        ?></td>
                        <td><?php echo $row['xeploai'];?></td>
                        <td><?php 
                          $sqltam="SELECT * from gia where id_dichvu= '".$row['id']."' ";
                          $resulttam = mysqli_query ($conn , $sqltam);

                          if( mysqli_num_rows ( $resulttam ) !=0){
                            echo "<div class='row'>";
                            while ( $rowtam = mysqli_fetch_array($resulttam)) {
                              if ($rowtam['loaive'] === '1')
                                echo "Người lớn: &nbsp; ";
                              else 
                                echo "Trẻ nhỏ: &emsp; &nbsp;";
                              echo $rowtam['giatien'] ." VND<br>";
                            }
                            echo "</div>";
                          }
                        ?></td>
                        <td>
                          <div class="btn-group">
                            <abbr title="Sửa dữ liệu">
                              <a href="master.php?act=page_edit_dsdv&id_nv=<?php echo $row['id']?>">
                                <button type="button" class="btn btn-default btn-sm mr-2">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                              </a>
                            </abbr>
                            <abbr title="Xóa dữ liệu">
                              <a onclick="return xoaNhanVien();" href="Dichvu/delete.php?id_nv=<?php echo $row['id']?>">
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