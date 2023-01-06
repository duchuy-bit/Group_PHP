<?php
    include('connect.php');
?>

<?php
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
    $query= "SELECT * FROM `dichvu` LIMIT $begin,8";//bắt đầu từ begin lấy 8 sản phẩm trên 1 trang
    $result= mysqli_query($conn,$query);


    
?>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
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
                <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Loại Dịch Vụ</a>
                    <div class="dropdown-menu m-0">
                        <a href="nghiduong.php" class="dropdown-item">Nghỉ Dưỡng</a>
                        <a href="khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                        <a href="golf.php" class="dropdown-item">Golf</a>
                        <a href="amthuc.php" class="dropdown-item">Ẩm thực</a>
                    </div>
                </div>
                <a href="find.php" class="nav-item nav-link">Tìm kiếm</a>
                <!-- <a href="baitap.php" class="nav-item nav-link">Bài tập</a>
                <a href="thongtin.php" class="nav-item nav-link">Thông tin</a> -->
                <!-- -------------------------ADMIN -------------------------- -->
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

<!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-uppercase text-white mb-lg-4">Vinpearl</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Siêu quần thể Vinpearl</h1>
                    <p class="fs-4 text-white mb-lg-4">Siêu quẩn thể nghỉ dưỡng, vui chơi giải trí, mua sắm và ẩm thực tại các điểm đến hàng đầu Việt Nam</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/mYEs9d0jZOo" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Xem Video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="./images/nhiemvu.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">Tổng quan</h6>
                        <h1 class="display-5 text-uppercase mb-0">NƠI KHỞI ĐẦU KỲ TÍCH CỦA TRIỆU NIỀM VUI</h1>
                    </div>
                    <h4 class="text-body mb-4">Vinpearl Nha Trang - Quần thể du lịch nghỉ dưỡng, vui chơi và khám phá biển hàng đầu Đông Nam Á, top 10 vịnh biển đẹp nhất hành tinh tạo nên vạn trải nghiệm nghỉ dưỡng đỉnh cao.</h4>
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                    aria-selected="true">Nhiệm vụ</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                    aria-selected="false">Our Mission</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0">Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">Vinpearl Resort Nha Trang welcomes guests with pure Asian beauty with luxurious Indochine-style architecture and a private beach that attracts customers. In the midst of thousands of exciting experiences, at the top beach resort - entertainment clothes in Hon Tre area, Vinpearl Resort Nha Trang is a hidden, peaceful paradise for those who love relaxation and health exercise. a place to restore energy for vibrant souls who demand entertainment and discovery, mark their happiness with a dream wedding, or high-class meeting to lead the way to success.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Products Start -->
    <div  class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Dịch vụ</h6>
                <h3 class=" text-uppercase mb-0">Sản phẩm dành cho bạn</h3>
            </div>
            <div id="div1" class="row text-center py-5">
            <!-- <div class="owl-carousel product-carousel"> -->
                <?php 
                    while ( $row = mysqli_fetch_array($result)){?>
                    <div class="pb-5 col-md-3 col-sm-6 my-md-0">
                        <div class="product-item position-relative bg-light d-flex flex-column text-center"
                        style="height: 320px;width: 270px;">
                            <img class="img-fluid mb-4" src="./dashboard/image_dichvu/<?php echo $row['anh']; ?>" alt="" 
                            style="width: 200px; height: 150px;">
                            <h6 class="text-uppercase"><?= $row['ten']; ?></h6>
                            <h6><i></i><b style="color:orange;"><?php 
                                        // echo (int)$row['xeploai'];
                                        rating($row['xeploai']);
                                        // for ($i=0;$i< (int)$row['xeploai'];$i++) 
                                                // echo "<i class='bi bi-star-fill'></i>";
                                        // if (($row['xeploai'] - (int)$row['xeploai'] >= 0.3 ) )
                                        // echo "<i class='bi bi-star-half'></i>";
                                        // else  echo "<i class='bi bi-star'></i>";
                                        // for ($i=  (int)$row['xeploai'] + 1;$i< 5;$i++) 
                                        // echo "<i class='bi bi-star'></i>";
                                    ?></b></h6>
                            <div class="btn-action d-flex justify-content-center">
                                <!-- <form> -->
                                    <a class="btn btn-primary py-2 px-3" href="addtocart.php?id=<?php echo $row['id'] ?>"><i class="bi bi-cart"></i></a>
                                <!-- </form> -->
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
                        $sql_trang= mysqli_query($conn,"SELECT * FROM `dichvu`");
                        $row_count = mysqli_num_rows($sql_trang);//đếm số lượng phần tử trong sql
                        $trang = ceil($row_count/8); // ceil làm tròn số, tổng số chia 8
                    ?>
                    <ul class="list_trang">
                        <?php
                        for($i=1; $i<=$trang;$i++){
                        ?>
                        <li>
                            <a onclick="myFunction()" href="index.php?trang=<?php echo $i ?>">
                                <button class="btn btn-primary"><?php echo $i ?></button>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
        </div>
    </div>

    <!-- Products End -->


