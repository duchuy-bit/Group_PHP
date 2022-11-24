<?php
    include "./user/header.php"
?>
<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="tourbooking";
    $conn=mysqli_connect($severname,$username,$password,$dbname);

    $id_kh= '1';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }
    $sql_chitiet = mysqli_query($conn,"SELECT * FROM `dichvu` WHERE id='$id'");

    

    if (isset($_POST['addtocart']))
    {
        $sqlAddtoCart = "SELECT * FROM gia where `id_dichvu`=$id";
        $result = mysqli_query($conn,$sqlAddtoCart);
        $id_gia="";
        $id_giaChild='';
        $dem=0;
        if (mysqli_num_rows($result) != 0){
            while ( $rowtam = mysqli_fetch_array($result)){
                if ($rowtam['loaive'] ==='1')
                {
                    $dem++;
                    $id_gia= $rowtam['id'];
                    // $giatien = $row
                }
                if ($rowtam['loaive'] ==='0')
                {
                    // $dem++;
                    echo $rowtam['id'];
                    $id_giaChild= $rowtam['id'];
                    // $giatien = $row
                }
            }
            
        }

        //____Check Tồn tại sp trong giohangf
        $result = mysqli_query($conn,"SELECT * 
            FROM gia inner join giohang on gia.id = giohang.id_gia
            where giohang.id_khachhang = '$id_kh' and giohang.id_gia = '$id_gia'");
        if (mysqli_num_rows($result)!=0){
            echo "<script type='text/javascript'>alert('Dịch vụ đã có sẵn trong giỏ hàng');</script>";
        }else{
            $dateNow = date("Y/m/d");

            if ($id_giaChild !==''){
                $sqlAddtoCart = "INSERT INTO `giohang`(`id_khachhang`, `id_gia`, `sl`, `ngaythem`) 
                VALUES ('$id_kh','$id_giaChild','0','$dateNow')";
                mysqli_query($conn,$sqlAddtoCart);
            }
            

            
            $sqlAddtoCart = "INSERT INTO `giohang`(`id_khachhang`, `id_gia`, `sl`, `ngaythem`) 
            VALUES ('$id_kh','$id_gia','1','$dateNow')";

            if (mysqli_query($conn,$sqlAddtoCart)){
                echo "<script type='text/javascript'>alert('Thêm giỏ hàng thành công');</script>";
            }else {
                echo "<script type='text/javascript'>alert('Thêm giỏ hàng không thành công !!!');</script>";
            }
        }
    }
?>

    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark">
                <img src="./images/logo_vinpearl.jpg" width="60" height="60"/>
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
                    <a href="#" class="nav-link dropdown-toggle active " data-bs-toggle="dropdown">Loại Dịch Vụ</a>
                    <div class="dropdown-menu m-0">
                        <a href="nghiduong.php" class="dropdown-item">Nghỉ Dưỡng</a>
                        <a href="khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                        <a href="golf.php" class="dropdown-item active ">Golf</a>
                        <a href="amthuc.php" class="dropdown-item">Ẩm thực</a>
                    </div>
                </div>
                <a href="baitap.php" class="nav-item nav-link">Bài tập</a>
                <a href="thongtin.php" class="nav-item nav-link">Thông tin</a>
                <a href="#" class="nav-item nav-link">Admin</a>
                
                <a href="giohang.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4"style="font-size:18px;"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <?php
        while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
    ?>
    <div class="container py-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-12">
                <div class="blog-item mb-5">
                    <div class="row  ">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid mb-4" src="./dashboard/image_dichvu/<?= $row_chitiet['anh']; ?>" alt="" >
                        </div>
                        <div class="col-12 col-sm-7  d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Web Design</small>
                                    <small><i class="bi bi-calendar-date me-2"></i>04 Dec, 2022</small>
                                </div>
                                <h5 class="text-uppercase mb-3"><?= $row_chitiet['ten']; ?></h5>
                                <h6><i>Xếp loại: </i><b style="color:orange ;">
                                        <?php 
                                            for ($i=0;$i< (int)$row_chitiet['xeploai'];$i++) echo "<i class='bi bi-star-fill'></i>";
                                            if (($row_chitiet['xeploai'] - (int)$row_chitiet['xeploai'] >= 0.3 ) )
                                                echo "<i class='bi bi-star-half'></i>";
                                            else  
                                                echo "<i class='bi bi-star'></i>";
                                            for ($i=  (int)$row_chitiet['xeploai'] + 1;$i< 5;$i++) 
                                                echo "<i class='bi bi-star'></i>";
                                        ?>
                                    </b></h6>
                                <p><b>Mô tả: </b><?= $row_chitiet['mota']; ?></p>
                                <table colspan="2">
                                    <tr>
                                        <td style="width: 800px;"><h5>Loại vé: Người lớn</h5></td>
                                        
                                    </tr>
                                    <tr><td><h5 style="color:orange ;">&emsp;Giá: 2.000.000 VND</h5></td></tr>
                                </table>
                                <table colspan="2">
                                    <tr>
                                        <td style="width: 800px;"><h5>Loại vé: Trẻ em</h5></td>
                                        
                                    </tr>
                                    <tr><td><h5 style="color:orange ;">&emsp;Giá: 2.000.000 VND</h5></td></tr>
                                </table>
                                
                                    <table>
                                        <tr>
                                        <td>
                                            <a href="./index.php?trang=1">
                                                <button class="btn btn-primary py-2 px-3">Quay lại</button>
                                            </a>
                                        </td>
                                        <td><a> &ensp;</a></td>
                                        <td>
                                            <form action="" method="POST">    
                                                <button class="btn btn-primary py-2 px-3" type="submit" name="addtocart">
                                                    Thêm Giỏ hàng
                                                </button>
                                            </form>
                                        </td>
                                        </tr>
                                    </table>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
        
    <!-- Blog list End -->


<?php
    include "./user/footer.php"
?>