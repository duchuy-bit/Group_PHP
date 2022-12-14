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
        <div class="row bg-light px-5 py-3">
            <div class="col-xs-12 col-md-4 d-flex justify-content-center">
                <div style="align-items: center;">
                    <h5>FORM PHP</h5>
                    <!-- <a href="./btth//form/btform.php" style="font-size: 20px;"> - Bài 1 - </a></br>
                    <a href="./btth//form/bt2.php" style="font-size: 20px;"> - Bài 2 - </a></br>
                    <a href="./btth//form/tiendien.php" style="font-size: 20px;"> - Bài 3 - </a><br>
                    <a href="./btth//form/thiDH.php" style="font-size: 20px;"> - Bài 4 - </a><br>
                    <a href="./btth//form/karaOK.php" style="font-size: 20px;"> - Bài 5 - </a><br>
                    <a href="./btth//form/tinhtoan.php" style="font-size: 20px;"> - Bài 6 - </a><br>
                    <a href="./btth//form/tinhtoanV2.php" style="font-size: 20px;"> - Bài 7 - </a><br>
                    <a href="./btth//form/bt8.php" style="font-size: 20px;"> - Bài 8 - </a><br> -->
                    <a href="configbt.php?act=1_1" style="font-size: 20px;"> - Bài 1 - </a></br>
                    <a href="configbt.php?act=1_2" style="font-size: 20px;"> - Bài 2 - </a></br>
                    <a href="configbt.php?act=1_3" style="font-size: 20px;"> - Bài 3 - </a><br>
                    <a href="configbt.php?act=1_4" style="font-size: 20px;"> - Bài 4 - </a><br>
                    <a href="configbt.php?act=1_5" style="font-size: 20px;"> - Bài 5 - </a><br>
                    <a href="configbt.php?act=1_6" style="font-size: 20px;"> - Bài 6 - </a><br>
                    <a href="configbt.php?act=1_7" style="font-size: 20px;"> - Bài 7 - </a><br>
                    <a href="configbt.php?act=1_8" style="font-size: 20px;"> - Bài 8 - </a><br>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 d-flex justify-content-center">
            <div style="align-items: center;">
                    <h5>ARRAY PHP</h5>
                    <a href="configbt.php?act=2_1" style="font-size: 20px;"> - Bài 1 - </a></br>
                    <a href="configbt.php?act=2_2" style="font-size: 20px;"> - Bài 2 - </a></br>
                    <a href="configbt.php?act=2_3" style="font-size: 20px;"> - Bài 3 - </a><br>
                    <a href="configbt.php?act=2_4" style="font-size: 20px;"> - Bài 4 - </a><br>
                    <a href="configbt.php?act=2_5" style="font-size: 20px;"> - Bài 5 - </a><br>
                    <a href="configbt.php?act=2_6" style="font-size: 20px;"> - Bài 6 - </a><br>
                    <a href="configbt.php?act=2_7" style="font-size: 20px;"> - Bài 7 - </a><br>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 d-flex justify-content-center">
            <div style="align-items: center;">
                    <h5>SQL + PHP</h5>
                    <a href="configbt.php?act=3_1" style="font-size: 20px;"> - Bài 1 - </a></br>
                    <a href="configbt.php?act=3_2" style="font-size: 20px;"> - Bài 2 - </a></br>
                    <a href="configbt.php?act=3_3" style="font-size: 20px;"> - Bài 3 - </a><br>
                    <a href="./btth/sql/2.4.php" style="font-size: 20px;"> - Bài 4 - </a><br>
                    <a href="configbt.php?act=3_5" style="font-size: 20px;"> - Bài 5 - </a><br>
                    <a href="configbt.php?act=3_6" style="font-size: 20px;"> - Bài 6 - </a><br>
                    <a href="configbt.php?act=3_7" style="font-size: 20px;"> - Bài 7 - </a><br>
                    <a href="./btth/sql/2.8.php" style="font-size: 20px;"> - Bài 8 - </a><br>
                    <a href="configbt.php?act=3_9" style="font-size: 20px;"> - Bài 9 - </a><br>
                    <!-- <a href="configbt.php?act=3_10" style="font-size: 20px;"> - Bài 10 - </a><br> -->
                </div>
            </div>
        </div>
    </div>  
    <!-- Hero End -->

<?php
    include "./user/footer.php"
?>