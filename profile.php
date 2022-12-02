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
    

    if (isset($_POST['save'])){
        $ten=$_POST['hoten'];
        $diachi=$_POST['diachi'];
        $ntns=$_POST['ntns'];
        $sdt=$_POST['sdt'];
        $gioitinh=$_POST['gioitinh'];

        if($_FILES['anhdaidien']['name']==''){
            $anhdaidien=$_POST['anhdaidien'];
        }
        else{
            $anhdaidien=$_FILES['anhdaidien']['name'];
            $tmp_name=$_FILES['anhdaidien']['tmp_name'];
        }

        $email=$_POST['email'];

        $sql = "UPDATE `khachhang` 
        SET `name`='$ten',`sdt`='$sdt',`diachi`='$diachi',`ngaysinh`='$ntns',
            `gioitinh`='$gioitinh',`email`='$email',`avatar`='$anhdaidien'
        WHERE `id` = '$id_kh'";
        move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'].'/Group_PHP/dashboard/img_staff/'.$anhdaidien);
        if (mysqli_query($conn, $sql)){
            
            ?>
                <script>window.location.href = 'profile.php';</script>
            <?php
        }else {
            echo "<script type='text/javascript'>alert('ERROR !!!')</script>";
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
        <form method="POST" enctype="multipart/form-data">
            <div class="row g-5">
                <div class="col-sm-2"></div>
                <div class="col-sm-4 col-12">
                    <img class="img-fluid mb-4" src="./dashboard/img_staff/<?= $row_chitiet['avatar']; ?>" alt=""
                        style="width: 300px;height: 300px; border-radius: 1000px; resize: vertical;"
                    >
                    <input style="margin-bottom:10px" type="file" name="anhdaidien"
                        class="form-control-file"
                    >
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
                                    name="hoten"
                                    required
                                    value="<?php echo $row_chitiet['name'] ?>"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Email</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="email"
                                    required
                                    value="<?php echo $row_chitiet['email'] ?>"
                                ><br>
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
                                    name="sdt"
                                    required
                                    value="<?php echo $row_chitiet['sdt'] ?>"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td><p><b>Địa chỉ</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="text"
                                    name="diachi"
                                    required
                                    value="<?php echo $row_chitiet['diachi'] ?>"
                                ><br>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><p><b>Giới tính</b></p></td>
                            <td>
                            <input type="radio" name="gioitinh"value="1" <?php if($row_chitiet['gioitinh'] == 1) echo 'checked';?>>
                            <label class="mr-2">Nam</label>
                            <input type="radio" name="gioitinh" value="0" <?php if($row_chitiet['gioitinh'] == 0) echo 'checked';?>>
                            <label>Nữ</label><br>
                            </td>
                        </tr>

                        <tr>
                            <td><p><b>Ngày sinh</b></p></td>
                            <td>
                                <input
                                    class="form-control"
                                    style="border-radius: 50px;"
                                    type="date"
                                    name="ntns"
                                    required
                                    value="<?php echo $row_chitiet['ngaysinh'] ?>"
                                ><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <!-- <a href=""> -->
                                    <button  
                                        type="submit"
                                        class="btn btn-primary rounded-3 px-5 py-1 "
                                        name="save"
                                    >
                                        <p style="justify-content: center; flex: 1; align-items: center;">
                                            <b>Lưu</b>
                                        </p>
                                    </button>
                                <!-- </a> -->
                            </td>
                        </tr>
                        
                    </table>
                    
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
    <?php } ?>
        
    <!-- Blog list End -->


<?php
    include "./user/footer.php"
?>