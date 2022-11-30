<?php
    include "./user/header.php";

    include "./user/connect.php";

    $id_kh= '';
    if (isset($_COOKIE['type'])){
        if ($_COOKIE['type']=== 'customer'){
            $id_kh=$_COOKIE['login'];
        }
    }

    // if(isset($_GET['id'])){
    //     $id = $_GET['id'];
    // }else {
    //     $id = '';
    // }
    $sql_chitiet = mysqli_query($conn,"SELECT * FROM khachhang WHERE id= '$id_kh'");

    

    // if (isset($_POST['addtocart']))
    // {
    //     $sqlAddtoCart = "SELECT * FROM gia where `id_dichvu`=$id";
    //     $result = mysqli_query($conn,$sqlAddtoCart);
    //     $id_gia="";
    //     $id_giaChild='';
    //     $dem=0;
    //     if (mysqli_num_rows($result) != 0){
    //         while ( $rowtam = mysqli_fetch_array($result)){
    //             if ($rowtam['loaive'] ==='1')
    //             {
    //                 $dem++;
    //                 $id_gia= $rowtam['id'];
    //                 // $giatien = $row
    //             }
    //             if ($rowtam['loaive'] ==='0')
    //             {
    //                 // $dem++;
    //                 // echo $rowtam['id'];
    //                 $id_giaChild= $rowtam['id'];
    //                 // $giatien = $row
    //             }
    //         }
            
    //     }

    //     if ($id_kh !==''){
    //         //____Check Tồn tại sp trong giohangf
    //         $result = mysqli_query($conn,"SELECT * 
    //             FROM gia inner join giohang on gia.id = giohang.id_gia
    //             where giohang.id_khachhang = '$id_kh' and giohang.id_gia = '$id_gia'");
    //         if (mysqli_num_rows($result)!=0){
    //             echo "<script type='text/javascript'>alert('Dịch vụ đã có sẵn trong giỏ hàng');</script>";
    //         }else{
    //             $dateNow = date("Y/m/d");

    //             if ($id_giaChild !==''){
    //                 $sqlAddtoCart = "INSERT INTO `giohang`(`id_khachhang`, `id_gia`, `sl`, `ngaythem`) 
    //                 VALUES ('$id_kh','$id_giaChild','0','$dateNow')";
    //                 mysqli_query($conn,$sqlAddtoCart);
    //             }
                

                
    //             $sqlAddtoCart = "INSERT INTO `giohang`(`id_khachhang`, `id_gia`, `sl`, `ngaythem`) 
    //             VALUES ('$id_kh','$id_gia','1','$dateNow')";

    //             if (mysqli_query($conn,$sqlAddtoCart)){
    //                 echo "<script type='text/javascript'>alert('Thêm giỏ hàng thành công');</script>";
    //             }else {
    //                 echo "<script type='text/javascript'>alert('Thêm giỏ hàng không thành công !!!');</script>";
    //             }
    //         }
    //     }
    //     else {
    //         echo "<script type='text/javascript'>alert('Vui lòng đăng nhập')</script>";

    //     }
        
    // }
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
                
                <a href="giohang.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4"style="font-size:18px;"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<style>
</style>
    <!-- Blog Start -->
    <?php
        while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
    ?>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-4 col-12">
                <img class="img-fluid mb-4" src="./dashboard/img_staff/<?= $row_chitiet['avatar']; ?>" alt=""
                    style="width: 300px;height: 300px; border-radius: 1000px; resize: vertical;"
                >
                <input style="margin-bottom:10px" type="file" name="anhdaidien" class="form-control-file">
                <input type="hidden" name="anhdaidien" value="<?php echo $row_chitiet['avatar']?>">
            </div>
            <div class="col-sm-6">
                <table>
                    <tr>
                        <td><p><b>Họ và tên &emsp;&emsp;&emsp;</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="text"
                                required
                                value="<?php echo $row_chitiet['name'] ?>"
                            >
                        </td>
                    </tr>
                    <tr>
                        <td><p><b>Email</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="text"
                                required
                                value="<?php echo $row_chitiet['email'] ?>"
                            >
                        </td>
                    </tr>
                    <tr>
                        <td><p><b>SĐT</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="text"
                                pattern="[0-9]{10}" 
                                required
                                value="<?php echo $row_chitiet['sdt'] ?>"
                            >
                        </td>
                    </tr>
                    <tr>
                        <td><p><b>Địa chỉ</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="text"
                                required
                                value="<?php echo $row_chitiet['diachi'] ?>"
                            >
                        </td>
                    </tr>
                    
                    <tr>
                        <td><p><b>Giới tính</b></p></td>
                        <td>
                        <input type="radio" name="gioitinh"value="1" <?php if($row_chitiet['gioitinh'] == 1) echo 'checked';?>>
                        <label class="mr-2">Nam</label>
                        <input type="radio" name="gioitinh" value="0" <?php if($row_chitiet['gioitinh'] == 0) echo 'checked';?>>
                        <label>Nữ</label>
                        </td>
                    </tr>

                    <tr>
                        <td><p><b>Ngày sinh</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="date"
                                required
                                value="<?php echo $row_chitiet['ngaysinh'] ?>"
                            >
                        </td>
                    </tr>
                    
                    <!-- <tr>
                        <td><p><b>Địa chỉ</b></p></td>
                        <td>
                            <input
                                class="form-control"
                                style="border-radius: 50px;"
                                type="text"
                                required
                                value="<?php echo $row_chitiet['diachi'] ?>"
                            >
                        </td>
                    </tr> -->
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <?php } ?>
        
    <!-- Blog list End -->


<?php
    include "./user/footer.php"
?>