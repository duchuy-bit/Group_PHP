<?php
include "./user/header.php"
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
            <a href="thongtin.php" class="nav-item nav-link active ">Thông tin</a>
            <a href="#" class="nav-item nav-link">Admin</a>
            <a href="giohang.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4" style="font-size:18px;"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Hero Start -->
<div class="thongtin py-5" style="text-align: center">
    <h2 style="color:#7AB730">Thông tin cá nhân của từng thành viên</h2>
</div>
<div class="container">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class=" col-md-6 col-sm-12 pb-1">
                <div class=" align-items-center bg-light mb-4">
                    <div class="d-flex">
                        <img src=" ./images/pic1.jpg" alt="" srcset="" style="width:150px;height: 170px;">
                        <h3 class="font-weight-semi-bold pt-4 ps-4" style="margin-top: 50px;">Nguyễn Đức Huy</h3>
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <!-- <input type="submit" name="btcn" value="Bài tập cá nhân"> -->
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 pb-1">
                <div class=" align-items-center bg-light mb-4">
                    <div class="d-flex">
                        <img src="./images/vhuy.jpg" alt="" srcset="" style="width:150px;height: 170px;">
                        <h3 class="font-weight-semi-bold pt-4 ps-4" style="margin-top: 50px;">Trần Văn Huy</h3>
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <!-- <input type="submit" name="btcn" value="Bài tập cá nhân"> -->
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 pb-1">
                <div class=" align-items-center bg-light mb-4">
                    <div class="d-flex">
                        <img src="./images/tam.jpg" alt="" srcset="" style="width:150px;height: 170px;">
                        <h3 class="font-weight-semi-bold pt-4 ps-4" style="margin-top: 50px;">Lê Thị Thanh Tâm</h3>
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <!-- <input type="submit" name="btcn" value="Bài tập cá nhân"> -->
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 pb-1">
                <div class=" align-items-center bg-light mb-4">
                    <div class="d-flex">
                        <img src="./images/quynh.jpg" alt="" srcset="" style="width:150px;height: 170px;">
                        <h3 class="font-weight-semi-bold pt-4 ps-4" style="margin-top: 50px;">Trương Thị Diễm Quỳnh</h3>
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <!-- <button><a href="../Group_PHP/baitap/baicanhan/quynh/quynh.php">Bài tập cá nhân</a></button> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Hero End -->

<?php
include "./user/footer.php"
?>