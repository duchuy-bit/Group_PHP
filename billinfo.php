<?php

    include "./user/header.php";

    $id_kh= '';
    if (isset($_COOKIE['type'])){
        if ($_COOKIE['type']=== 'customer'){
            $id_kh=$_COOKIE['login'];
        }
    }

    if(isset($_GET['id'])){
        $idbill = $_GET['id'];
        // echo $idbill;
    }else {
        $idbill = '';
    }

    include "./user/connect.php";

    $result = mysqli_query($conn, "SELECT * FROM cthd
        inner join hoadon on hoadon.id = cthd.id_hd
        inner join gia on gia.id = cthd.id_gia
        inner join dichvu on dichvu.id = gia.id_dichvu
    where id_hd = '$idbill' ");

?>


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand ms-lg-5">
        <h1 class="m-0 text-uppercase text-dark">
            <img src="./images/logo_vinpearl.jpg" width="60" height="60" />
            Vinpearl
        </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Trang chủ</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Loại Dịch Vụ</a>
                <div class="dropdown-menu m-0">
                    <a href="nghiduong.php" class="dropdown-item">Nghỉ Dưỡng</a>
                    <a href="khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                    <a href="golf.php" class="dropdown-item">Golf</a>
                    <a href="amthuc.php" class="dropdown-item">Ẩm thực</a>
                </div>
            </div>
            <a href="baitap.php" class="nav-item nav-link">Bài tập</a>
            <a href="thongtin.php" class="nav-item nav-link">Thông tin</a>
            <?php
                    if( isset($_COOKIE["type"]))
                    {
                        if ($_COOKIE["type"] === 'admin'){       
                ?>
                    <a href="./admin/master.php" class="nav-item nav-link">Admin</a>
                <?php
                        }
                    }
                ?>

            <a href="giohang.php" class="active nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4" style="font-size:18px;"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<main class="page">
    <section class="shopping-cart dark">
        <div class="container p-5">
            <div class="block-heading">
                <h2>Hóa đơn</h2><br>
            </div>
            <div class="content bg-light">
                <!-- <div class="row"> -->                
                <div class="col-md-12 col-lg-12">
                        <div class="p-5">
                            <b style="font-weight: bold; font-size: 20px; color: grey;">&emsp;&emsp;&emsp;Thông tin hóa đơn</b><br>
                            <table>
                                <?php
                                    $resultkh = mysqli_query($conn, "SELECT * FROM khachhang where id= '$id_kh'");
                                    $rowkh = mysqli_fetch_array($resultkh);
                                ?>
                                <tr>
                                    <th style="width: 150px;"></th>
                                    <th style="width: auto;"></th>
                                </tr>
                                <tr>
                                    <td><b>Mã hóa đơn</b></td>
                                    <td><?php echo $idbill?></td>
                                </tr>
                                <tr>
                                    <td><b>Họ và tên</b></td>
                                    <td><?php echo $rowkh['name']?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?php echo $rowkh['email'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Số điện thoại</b></td>
                                    <td><?php echo $rowkh['sdt']?></td>
                                </tr>
                                <tr>
                                    <td><b>Địa chỉ</b></td>
                                    <td><?php echo $rowkh['diachi']?></td>
                                </tr>
                                <tr>
                                    <td><b>Tổng tiền</b></td>
                                    <td><?php 
                                        $subTotal = mysqli_fetch_array($result);
                                        echo number_format($subTotal['tongtien'], 0, ',', '.')." VND";
                                    ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            
                    <b style="font-weight: bold; font-size: 20px; color: grey;">&emsp;&emsp;&emsp;Danh sách dịch vụ</b>
                    <div class="col-md-12 col-lg-12 " >
                        <div class="p-3">
                            <!-- <h3>Danh sách dịch vụ</h3> -->
                            <table class="table ">
                                <tr>
                                    <th style="width: 50px;">STT</th>
                                    <th style="width: 130px;">Dịch vụ</th>
                                    <th style="width: 350px;"></th>       
                                    <th style="width: 100px;">Loại vé</th>                             
                                    <th style="width: 100px;">Số lượng</th>
                                    <th style="width: 250px;">Giá tiền</th>
                                    <!-- <th style="width: 200px">Tổng</th> -->
                                    <!-- <th style="width: 50px"></th> -->
                                </tr>
                                <!-- <tr class="table"> -->
                                    <!-- <td></td> -->
                                <!-- </tr> -->
                                <?php
                                    $dem=0;
                                    $subTotal = 0;
                                    $result = mysqli_query($conn, "SELECT * FROM cthd
                                        inner join hoadon on hoadon.id = cthd.id_hd
                                        inner join gia on gia.id = cthd.id_gia
                                        inner join dichvu on dichvu.id = gia.id_dichvu
                                    where id_hd = '$idbill' ");

                                    while ($row = mysqli_fetch_array($result)){
                                        $dem++;
                                        $subTotal = $row['tongtien'];
                                    
                                ?>  
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php
                                            echo "<img src='./dashboard/image_dichvu/".$row['anh']."' 
                                            alt='".$row['anh']."' width='120px' height='80px'>";
                                        ?></td>
                                        <td><?php echo $row['ten']?></td>
                                        <td><?php
                                            if ($row['loaive'] == '0') echo "Trẻ nhỏ";
                                            else echo "Người lớn";
                                        ?></td>
                                        <!-- <td><?php echo "".$row['giatien']."VND"?></td> -->
                                        <td><?php echo "x".$row['sl']?></td>
                                        <td><?php echo number_format($row['giatien'], 0, ',', '.')." VND" ?></td>
                                    </tr>
                                <?php
                                        
                                    }
                                ?>                 
                            </table>
                        </div>
                    </div>
                <!-- </div> -->

                    
                    <!-- <div class=""></div> --> 
                    

                    <div class="px-5 py-3"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include "./user/footer.php"
?>
