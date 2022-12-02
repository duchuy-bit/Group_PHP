<?php
    include "./user/header.php"
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
                <a href="baitap.php" class="nav-item nav-link active ">Bài tập</a>
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
    <div class="px-5 d-flex justify-content-center" style="margin-top: 50px; align-items: center; justify-content: center;">
        <h2 >Bài tập PHP</h2>
    </div>
    <!-- Hero Start -->
    <div class="px-5 py-5" style="margin-left: 150px;margin-right: 150px;">
        <?php

            switch ($_GET['act']){
                case '1_1': include './btth/form/btform.php'; break;
                case '1_2': include './btth/form/bt2.php'; break;
                case '1_3': include './btth/form/tiendien.php'; break;
                case '1_4': include './btth/form/thiDH.php'; break;
                case '1_5': include './btth/form/karaOK.php'; break;
                case '1_6': include './btth/form/tinhtoan.php'; break;
                case '1_7': include './btth/form/tinhtoanV2.php'; break;
                case '1_8': include './btth/form/bt8.php'; break;

                case '2_1': include './btth/array/'; break;
                case '2_2': include './btth/array/bt3.php'; break;
                case '2_3': include './btth/array/bt3.php'; break;
                case '2_4': include './btth/array/mang_tim_kiem.php'; break;
                case '2_5': include './btth/array/mang_thay_the.php'; break;
                case '2_6': include './btth/array/mang_sx.php'; break;
                case '2_7': include './btth/array/mang_nam_am_lich.php'; break;

                case '3_1': include './btth/sql/2.1.php'; break;
                case '3_2': include './btth/sql/2.2.php'; break;
                case '3_3': include './btth/sql/2.3.php'; break;
                case '3_4': include './btth/sql/2.4.php'; break;
                case '3_5': include './btth/sql/2.5.php'; break;
                case '3_6': include './btth/sql/2.6.php'; break;
                case '3_7': include './btth/sql/2.7.php'; break;
                case '3_8': include './btth/sql/2.8.php'; break;
                case '3_9': include './btth/sql/2.9.php'; break;
                // case '3_10': include './btth/sql/2.10.php'; break;
            }

        ?>
    </div>  
    <!-- Hero End -->

<?php
    include "./user/footer.php"
?>