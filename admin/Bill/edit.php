    <?php
    $id_nv = $_GET['id_nv'];
    $conn = get_connection();

    $sql = "SELECT * FROM hoadon WHERE id=$id_nv";
    $query = mysqli_query ($conn , $sql );
    $row = mysqli_fetch_array($query);


    ?>
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Xem chi tiết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="master.php?act=page_dsbill">Thông tin</a></li>
                <li class="breadcrumb-item active">Hóa đơn</li>
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
                <table class="table ">
                <thead>
                    <tr>
                        <th style="width: 200px"></th>
                        <th style="width: auto">Thông tin hóa đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label>Mã hóa đơn</label>
                        </td>
                        <td><?php echo $row['id']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Họ và tên khách hàng</label>
                        </td>
                        <td><?php echo $row['ten_khachhang']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>SDT khách hàng</label>
                        </td>
                        <td><?php echo $row['sdt_khachhang']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email khách hàng</label>
                        </td>
                        <td><?php echo $row['email_khachhang']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tổng tiền</label>
                        </td>
                        <td><?php echo $row['tongtien'] ."&nbsp;&nbsp;VNĐ"?></td>
                    </tr>
                </tbody>
            </table>
            <label class="d-flex justify-content-center">Danh sách dịch vụ trong Hóa đơn</label><br> 
            <!-- List Cart -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: auto">STT</th>
                        <th style="width: auto">Dịch vụ</th>
                        <th style="width: auto">Ảnh</th>
                        <th style="width: auto">Loại dịch vụ</th>
                        <th style="width: auto">Giá tiền</th>
                        <th style="width: auto">Số lượng</th>
                        <th style="width: 50px">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mysql= "SELECT * 
                        FROM hoadon inner join cthd on hoadon.id = cthd.id_hd 
                            INNER JOIN gia on cthd.id_gia = gia.id
                            inner join dichvu on dichvu.id = gia.id_dichvu
                        where hoadon.id_khachhang = '".$row['id_khachhang']."'
                        and hoadon.id = '".$row['id']."'";

                        $d=0;
                        $resulttam= mysqli_query($conn,$mysql);
                        if (mysqli_num_rows($resulttam) !=0){                            
                            while ($rowtam = mysqli_fetch_array($resulttam)){
                                $d++;
                    ?>
                        <tr>
                            <td><?php echo $d; ?></td>
                            <td><?php echo $rowtam['ten']; ?></td>
                            <td><?php 
                                echo "<img src='../dashboard/image_dichvu/".$rowtam['anh']."' alt='".$rowtam['anh']."' width='100px' height='75px'>";
                            ?></td>
                            <td><?php 
                                if ($rowtam['loaive'] === '0') echo "Trẻ nhỏ";
                                if ($rowtam['loaive'] === '1') echo "Người lớn";
                            ?></td>
                            <td><?php echo $rowtam['giatien'] ."&nbsp;&nbsp;VNĐ" ?></td>
                            <td><?php echo $rowtam['sl'] ?></td>
                            <td><?php
                                $giatien= (int)$rowtam['giatien'];
                                $sl = (int)$rowtam['sl'];
                                echo  $giatien * $sl."&nbsp;&nbsp;VNĐ"
                            ?></td>
                        </tr>
                    <?php
                            }
                        }else echo "<tr><td>Không có dịch vụ nào<td></tr>";
                    ?>
                </tbody>
            </table>
                </div>

                <div class="card-footer">
                <!-- <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button> -->
                <a href="master.php?act=page_dsbill">
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