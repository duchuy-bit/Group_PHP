<?php
    include "./user/header.php"
?>


<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="tourbooking";
    $conn=mysqli_connect($severname,$username,$password,$dbname);

    if(isset($_GET['trang'])){
        $page=$_GET['trang'];
    } else {
        $page = '';
    }
    if($page == '' || $page == 1){
        $begin = 0; // biến bắt đầu sẽ chạy từ 0
    }else {
        $begin = ($page*8)-8;
    }
    $query= "SELECT * FROM `dichvu` WHERE id_loai=1 LIMIT $begin,8";//bắt đầu từ begin lấy 8 sản phẩm trên 1 trang
    $result= mysqli_query($conn,$query);


    
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
                        <a href="nghiduong.php" class="dropdown-item active ">Nghỉ Dưỡng</a>
                        <a href="khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                        <a href="golf.php" class="dropdown-item">Golf</a>
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

    <!-- Hero Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Dịch vụ</h6>
                <h1 class="display-5 text-uppercase mb-0">Sản phẩm dành cho bạn</h1>
            </div>
            <div id="div1" class="row text-center py-5">
                <?php 
                    while ( $row = mysqli_fetch_array($result)){?>
                    <div class="pb-5 col-md-3 col-sm-6 my-md-0">
                        <div class="product-item position-relative bg-light d-flex flex-column text-center"
                        style="height: 320px;width: 270px;">
                            <img class="img-fluid mb-4" src="./images/<?= $row['anh']; ?>" alt="">
                            <h6 class="text-uppercase"><?= $row['ten']; ?></h6>
                            <h6><i></i><b style="color:orange;"><?php 
                                        // echo (int)$row['xeploai'];
                                        for ($i=0;$i< (int)$row['xeploai'];$i++) echo "<i class='bi bi-star-fill'></i>";
                                        if (($row['xeploai'] - (int)$row['xeploai'] >= 0.3 ) )echo "<i class='bi bi-star-half'></i>";
                                        else  echo "<i class='bi bi-star'></i>";
                                        for ($i=  (int)$row['xeploai'] + 1;$i< 5;$i++) echo "<i class='bi bi-star'></i>";
                                    ?></b></h6>
                            <div class="btn-action d-flex justify-content-center">
                                <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                                <a class="py-1 px-1"></a>
                                <a class="btn btn-primary py-2 px-3" href="ctsp.php?id=<?=$row['id'] ?>"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
                <div style="clear:both;"></div>
                <style type="text/css">
                    ul.list_trang {
                        padding: 0;
                        margin: 0;
                        list-style: none;
                        margin-left: 45%;
                    }
                    ul.list_trang li {
                        float: left;
                        padding: 5px 13px;
                        margin: 5px;
                        background: burlywood;
                        
                    }
                    ul.list_trang li a {
                        color: #000;
                        text-align: center;
                        text-decoration: none;
                    }
                </style>
                    
                    <?php 
                        $sql_trang= mysqli_query($conn,"SELECT * FROM `dichvu` where id_loai=1");
                        $row_count = mysqli_num_rows($sql_trang);//đếm số lượng phần tử trong sql
                        $trang = ceil($row_count/8); // ceil làm tròn số, tổng số chia 8
                    ?>
                    <ul class="list_trang">
                        <?php
                        for($i=1; $i<=$trang;$i++){
                        ?>
                        <li><a href="nghiduong.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
        </div>
    </div>
    <!-- Hero End -->

<?php
    include "./user/footer.php"
?>