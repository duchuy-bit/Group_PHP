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
  // $sql = "SELECT * FROM hoadon";
  // $dsnv = mysqli_query($conn, $sql);

  if(isset($_GET['trang'])){
      $page=$_GET['trang'];
  } else {
      $page = '';
  }
  if($page == '' || $page == 1){
      $begin = 0; // biến bắt đầu sẽ chạy từ 0
  }else {
      $begin = ($page*15)-15;
  }

  $conn = get_connection();
  $sql = "SELECT * FROM hoadon LIMIT $begin,15";
  $dsnv = mysqli_query($conn, $sql);
  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin hóa đơn</h1>
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
            <form method="POST">
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
                    <!-- <th style="width: auto">STT</th> -->
                    <th style="width: auto">Mã Hóa đơn</th>
                    <th style="width: auto">Tên khách hàng</th>
                    <th style="width: auto">Ảnh</th>
                    <th style="width: auto">Email</th>
                    <th style="width: auto">Ngày thanh toán</th>
                    <!-- <th style="width: auto">Giới tính</th> -->
                    <th style="width: auto">Số lượng dich vụ</th>
                    <th style="width: auto">Tổng tiền</th>
                    <!-- <th style="width: auto">Email</th> -->
                    <!-- <th style="width: auto">Số lượng dịch vụ</th> -->
                    <th style="width: 50px">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if(isset($_POST['search'])){
                        $key = $_POST['key'];
                          $sqlSearch = "SELECT * 
                            FROM hoadon 
                            WHERE hoadon.id LIKE '%$key%' 
                              -- or hoadon.sl like '%$key%' 
                              or hoadon.ngaythanhtoan like '%$key%'
                              or hoadon.ten_khachhang like '%$key%'
                              or hoadon.email_khachhang like '%$key%'
                              or hoadon.sdt_khachhang like '%$key%'
                              or hoadon.tongtien like '%$key%'
                            ORDER BY hoadon.id";
                          $dem=0;
                          $qr = mysqli_query ($conn , $sqlSearch);
                            if (mysqli_num_rows($qr)!=0)
                            {
                            while ( $row = mysqli_fetch_array($qr)) {
                              $dem++;
                    ?>
                            <tr>
                              <td><?php echo $row['id']?></td>
                              <td><?php echo $row['ten_khachhang']?></td>
                              <td align='center'>
                                <?php
                                  $sqltamthoi="SELECT *  
                                  from hoadon inner join khachhang on hoadon.id_khachhang = khachhang.id
                                    where hoadon.id = '".$row['id']."'  and khachhang.id = '".$row['id_khachhang']."'";
                                  $result = mysqli_query($conn, $sqltamthoi);
                                  $fetch = mysqli_fetch_array($result);
                                  echo ' <img src="../dashboard/img_staff/'. $fetch['avatar'].'" alt="'. $fetch['avatar'].'" width="100px" height="100px"> ';
                                ?>
                              </td>
                              <td><?php echo $row['email_khachhang']?></td>
                              <td><?php echo date("d-m-Y", strtotime($row['ngaythanhtoan'])) ?></td>
                              
                              
                              <td><?php
                                  $sqltamthoi="SELECT *  
                                    from hoadon inner join cthd on cthd.id_hd = hoadon.id
                                    where hoadon.id = '".$row['id']."'";
                                  $result = mysqli_query($conn, $sqltamthoi);
                                  echo mysqli_num_rows($result);
                              ?></td>

                              <td><?php echo number_format($row['tongtien'], 0, ',', '.')?></td>

                              <td align="center">
                                <div class="btn-group">
                                  <abbr title="Xem chi tiết">
                                    <a href="master.php?act=page_edit_dsbill&id_nv=<?php echo $row['id']?>">
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
                        } else echo "<tr><td colspan='5'><label>Không tìm thấy hóa đơn</label></td></tr>";
                      }
                      else{
                    ?>
                    <?php
                    // $dem=0;
                      if( mysqli_num_rows ( $dsnv ) !=0){
                        while ( $row = mysqli_fetch_array($dsnv)) {
                          // $dem++;
                    ?>
                      <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['ten_khachhang']?></td>
                        <td align='center'>
                          <?php
                            $sqltamthoi="SELECT *  
                            from hoadon inner join khachhang on hoadon.id_khachhang = khachhang.id
                              where hoadon.id = '".$row['id']."'  and khachhang.id = '".$row['id_khachhang']."'";
                            $result = mysqli_query($conn, $sqltamthoi);
                            $fetch = mysqli_fetch_array($result);
                            echo ' <img src="../dashboard/img_staff/'. $fetch['avatar'].'" alt="'. $fetch['avatar'].'" width="100px" height="100px"> ';
                          ?>
                        </td>
                        <td><?php echo $row['email_khachhang']?></td>
                        <td><?php echo date("d-m-Y", strtotime($row['ngaythanhtoan']))?></td>
                        
                        
                        <td><?php
                            $sqltamthoi="SELECT *  
                              from hoadon inner join cthd on cthd.id_hd = hoadon.id
                              where hoadon.id = '".$row['id']."'";
                            $result = mysqli_query($conn, $sqltamthoi);
                            echo mysqli_num_rows($result);
                        ?></td>

                        <td><?php echo number_format($row['tongtien'], 0, ',', '.')."&ensp;VND"?></td>

                        <td align="center">
                          <div class="btn-group">
                            <abbr title="Xem chi tiết">
                              <a href="master.php?act=page_edit_dsbill&id_nv=<?php echo $row['id']?>">
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
                        echo "<td colspan='5'>"."Không có hóa đơn nào"."</td>";
                      }
                    }
                    ?>
                </tbody>
            </table>
            <div style="clear:both;"></div>
                <style type="text/css">
                    ul.list_trang {
                        padding: 0;
                        margin: 0;
                        list-style: none;
                        align-self: center;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                        display: flex;
                        /* margin-left: 45%; */
                    }
                    ul.list_trang li {
                        float: left;
                        padding: 5px 13px;
                        /* margin: 5px; */
                        /* background: burlywood; */
                        
                    }
                    ul.list_trang li a {
                        color: #000;
                        text-align: center;
                        text-decoration: none;
                    }
                </style>
                    
                    <?php 
                        $sql_trang= mysqli_query($conn,"SELECT * FROM `hoadon`");
                        $row_count = mysqli_num_rows($sql_trang);//đếm số lượng phần tử trong sql
                        $trang = ceil($row_count/15); 
                    ?>
                    <ul class="list_trang">
                        <?php
                        for($i=1; $i<=$trang;$i++){
                        ?>
                        <li>
                            <a onclick="myFunction()" href="master.php?act=page_dsbill&trang=<?php echo $i ?>">
                                <button class="btn btn-primary"><?php echo $i ?></button>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>