<?php
    include "./user/header.php";
    include('./user/connect.php');
?>
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
                <a href="index.php" class="nav-item nav-link ">Trang chủ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Loại Dịch Vụ</a>
                    <div class="dropdown-menu m-0">
                        <a href="nghiduong.php" class="dropdown-item">Nghỉ Dưỡng</a>
                        <a href="khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                        <a href="golf.php" class="dropdown-item">Golf</a>
                        <a href="amthuc.php" class="dropdown-item">Ẩm thực</a>
                    </div>
                </div>
                <a href="find.php" class="nav-item nav-link active">Tìm kiếm</a>
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

    <div  class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-12 border-start border-5 border-primary ps-5 mb-5" >
                    <h6 class="text-primary text-uppercase">Dịch vụ</h6>
                    <h3 class=" text-uppercase mb-0">Sản phẩm dành cho bạn</h3>
                </div>
                <div class="col-sm-5 col-12">
                    <form method="POST" class="example">
                        <!-- <div class=""> -->
                            <input
                                type="text"
                                class="form-control"
                                style="border-bottom-left-radius: 10px; border-top-left-radius: 10px; width: 300px;margin-top: 25px; height: 50px;"
                                name="key"
                                placeholder="Tìm kiếm"
                                value="<?php
                                    if (isset($_POST['key'])) echo $_POST['key'];
                                ?>" >
                            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                        <!-- </div> -->                        
                    </form>
                    
                </div>
            </div>
            <div id="div1" class="row text-center py-5">
            <!-- <div class="owl-carousel product-carousel"> -->
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
                    $key ="";
                    if (isset($_POST['key'])) $key =  $_POST['key'];

                    $result = mysqli_query($conn, "SELECT * FROM dichvu where ten like '%$key%' LIMIT $begin,8 ");
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
                        $sql_trang= mysqli_query($conn,"SELECT * FROM dichvu where ten like '%$key%'");
                        $row_count = mysqli_num_rows($sql_trang);//đếm số lượng phần tử trong sql
                        $trang = ceil($row_count/8); // ceil làm tròn số, tổng số chia 8
                    ?>
                    <ul class="list_trang">
                        <?php
                        for($i=1; $i<=$trang;$i++){
                        ?>
                        <li>
                            <a onclick="myFunction()" href="find.php?trang=<?php echo $i ?>">
                                <button class="btn btn-primary"><?php echo $i ?></button>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
        </div>
    </div>
<?php
    include "./user/footer.php";
?>

<style>
    
    form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
    }

    form.example button {
    float: left;
    width: 20%;
    height: 50px;
    padding: 10px;
    background: #7AB730;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
    margin-top: 25px;
    margin-left: -8px;
    }

    form.example button:hover {
    background: #7AB730;
    }

    form.example::after {
    content: "";
    clear: both;
    display: table;
    }
</style>    