<?php
include "./user/header.php";
$id_customer = '1';

    // function number_format($a){
    //     $dem = 0;
    //     $tam = (string) $a;
    //     // $tam='';
    //     $t="";
    //     for ($i = strlen($tam) ; $i> 0; $i--){
    //         $dem ++;
    //         if ($dem === 3 && $i !==0) $t = ','. $t ;
    //         $t = $tam[$i]. $t ;
    //     }
    //     return $t;
    // }
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
            <a href="#" class="nav-item nav-link">Admin</a>

            <a href="giohang.php" class="active nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4" style="font-size:18px;"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<main class="page">
    <section class="shopping-cart dark">
        <div class="container p-5">
            <div class="block-heading">
                <h2>Shopping Cart</h2><br>
            </div>
            <div class="content bg-light">
                <!-- <div class="row"> -->
                    <div class="col-md-12 col-lg-12 " >
                        <div class="p-3">
                            <!-- <h3>Danh sách dịch vụ</h3> -->
                            <table class="table ">
                                <tr>
                                    <th style="width: 130px;">Dịch vụ</th>
                                    <th style="width: 250px;"></th>
                                    <th style="width: 250px;">Giá tiền</th>
                                    <th style="width: 200px;">Số lượng</th>
                                    <th style="width: 200px">Tổng</th>
                                    <th style="width: 50px"></th>
                                </tr>
                                <!-- <tr class="table"> -->
                                    <!-- <td></td> -->
                                <!-- </tr> -->
                                <?php
                                    $subTotal=0;
                                    include "./user/connect.php";
                                    $mysql= "SELECT * 
                                    FROM giohang 
                                        INNER JOIN gia on giohang.id_gia = gia.id
                                        inner join dichvu on dichvu.id = gia.id_dichvu
                                    where giohang.id_khachhang = $id_customer";

                                    // class item
                                    // {
                                    //     public $id_dichvu;
                                    //     public $name;
                                    //     public $anh;
                                    //     public $loai_gia;
                                    //     public $gia;
                                    //     public $sl;
                                    //     // public $picture;
                                    // }
                                    $result = mysqli_query($conn, $mysql);
                                    $listItem=array();
                                    $listFilter=array();
                                    if (mysqli_num_rows($result)!=0){
                                        while ($rowCart = mysqli_fetch_array($result)){
                                            array_push($listFilter,$rowCart['id_dichvu']);
                                        }
                                    }

                                    // Loc Array
                                    $listFilter=array_values(array_unique($listFilter));
                                    //     }
                                    // }else echo "<tr><td colspan='4'><h3>Bạn không có dịch vụ nào trong giỏ hàng</h3></td></tr>";

                                    if (count($listFilter) === 0) echo "<tr><td colspan='4'><h4>Bạn không có dịch vụ nào trong giỏ hàng</h4></td></tr>";
                                    else {
                                        for ($i = 0 ; $i < count($listFilter); $i++)
                                        {
                                ?>  
                                    <tr>
                                        <!-- Ảnh mô tả -->
                                        <td><?php 
                                            $sqltamthoi="SELECT * from dichvu 
                                            where dichvu.id = '".$listFilter[$i]."'";
                                            $result = mysqli_query($conn, $mysql);
                                            while($rowtamthoi= mysqli_fetch_array($result)){
                                                if ($rowtamthoi['id'] === $listFilter[$i]){
                                                    echo "<img src='./dashboard/image_dichvu/".$rowtamthoi['anh']."' alt='".$rowtamthoi['anh']."' width='120px' height='80px'>";
                                                    break;
                                                }
                                            }
                                        ?></td>

                                        <!-- Tên dịch vụ -->
                                        <td><?php
                                            $sqltamthoi="SELECT * from dichvu
                                            where dichvu.id = '".$listFilter[$i]."'";
                                            $result = mysqli_query($conn, $mysql);
                                            while($rowtamthoi= mysqli_fetch_array($result)){
                                                if ($rowtamthoi['id'] === $listFilter[$i]){
                                                    echo $rowtamthoi['ten'];
                                                    break;
                                                }
                                            }
                                        ?></td>
                                        
                                        

                                        <!--  Giá -->
                                        <td><?php 
                                            $giaAdult = 0;
                                            $giaChild =0;
                                            $sqltamthoi="SELECT * 
                                            from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                            where dichvu.id = '".$listFilter[$i]."'";
                                            $result = mysqli_query($conn, $sqltamthoi);
                                            echo "<label> - Người lớn:&ensp; </label>";
                                            while($rowtamthoi= mysqli_fetch_array($result)){
                                                if ($rowtamthoi['loaive'] === '1'){
                                                    $giaAdult = $rowtamthoi['giatien'];
                                                    echo number_format($rowtamthoi['giatien'], 0, ',', '.')."VND<br><br>";
                                                }
                                            }

                                            $result = mysqli_query($conn, $sqltamthoi);
                                            $dem=0;
                                            while($rowtamthoi= mysqli_fetch_array($result)){
                                                if ($rowtamthoi['loaive'] === '0'){
                                                    $dem++;
                                                }
                                            }
                                            if ($dem!==0){
                                                echo "<label> - Trẻ em:&ensp;&ensp;&ensp;&nbsp; </label>";
                                                $result = mysqli_query($conn, $sqltamthoi);
                                                $dem=0;
                                                while($rowtamthoi= mysqli_fetch_array($result)){
                                                    if ($rowtamthoi['loaive'] === '0'){
                                                        $giaChild = $rowtamthoi['giatien'];
                                                        echo number_format($rowtamthoi['giatien'], 0, ',', '.')."VND<br>";
                                                    }
                                                }
                                            }
                                        ?></td>

                                            <!-- Số lượng -->
                                            <td><?php 
                                                $slAdult = 0;
                                                $slChild = 0;
                                                $sqltamthoi="SELECT * 
                                                from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                                inner join giohang on giohang.id_gia = gia.id
                                                where giohang.id_khachhang=$id_customer 
                                                    and dichvu.id = '".$listFilter[$i]."'";
                                                $result = mysqli_query($conn, $sqltamthoi);

                                                // echo "x&ensp;";
                                                while($rowtamthoi= mysqli_fetch_array($result)){
                                                    if ($rowtamthoi['loaive'] === '1'){
                                                        $slAdult = $rowtamthoi['sl'];
                                                        ?>
                                                        <form>
                                                            <div class="d-flex flex-row">
                                                                <a href="xuly.php?tru=<?php echo $rowtamthoi['id_gia'] ?>" style="font-size: 22px; font-weight: bold;"> –&nbsp;  </a>
                                                                <div class="p-1"></div>
                                                                <input type="text" readonly class="form-control rounded-3"   
                                                                    value="<?php echo $rowtamthoi['sl'] ?>"
                                                                    style="width: 45px;"
                                                                >
                                                                <div class="p-1"></div>
                                                                <a href="xuly.php?cong=<?php echo $rowtamthoi['id_gia'] ?>" style="font-size: 22px; font-weight: bold;">+</a>
                                                            </div>
                                                        </form>
                                                        <div class="py-1"></div>
                                                        <?php
                                                    }
                                                }
                                                
                                                // $result = mysqli_query($conn, "SELECT * 
                                                //         from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                                //         where dichvu.id = '".$listFilter[$i]."'");
                                                // $dem=0;
                                                // while($rowtamthoi= mysqli_fetch_array($result)){
                                                //     if ($rowtamthoi['loaive'] === '0'){
                                                //         $dem++;
                                                //     }
                                                // }
                                                // if ($dem!==0){
                                                    // echo "<label>Trẻ em: </label>";
                                                    $result = mysqli_query($conn, "SELECT * 
                                                    from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                                    inner join giohang on giohang.id_gia = gia.id
                                                    where giohang.id_khachhang = $id_customer 
                                                        and dichvu.id = '".$listFilter[$i]."'");
                                                    
                                                    if (mysqli_num_rows($result)!==0){

                                                    while($rowtamthoi= mysqli_fetch_array($result)){
                                                        if ($rowtamthoi['loaive'] === '0'){
                                                            $slChild = $rowtamthoi['sl'];
                                                            ?>
                                                                <form>
                                                                    <div class="d-flex flex-row">
                                                                        <a href="xuly.php?tru=<?php echo $rowtamthoi['id_gia'] ?>" style="font-size: 22px; font-weight: bold;"> –&nbsp;  </a>
                                                                        <div class="p-1"></div>
                                                                        <input type="text" readonly class="form-control rounded-3"   
                                                                            value="<?php echo $rowtamthoi['sl'] ?>"
                                                                            style="width: 45px;"
                                                                        >
                                                                        <div class="p-1"></div>
                                                                        <a href="xuly.php?cong=<?php echo $rowtamthoi['id_gia'] ?>" style="font-size: 22px; font-weight: bold;">+</a>
                                                                    </div>
                                                                </form>
                                                            <?php
                                                        }
                                                    }
                                                    }   
                                            ?></td>
                                                <!-- Tong tien 1 dich vu -->
                                            <td>
                                                <?php
                                                    $totalAdult = (int)$giaAdult * (int) $slAdult;
                                                    $subTotal = $subTotal + $totalAdult;
                                                    echo number_format($totalAdult, 0, ',', '.')."VND<br><br>";

                                                    $sqltamthoi="SELECT * 
                                                    from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                                    where dichvu.id = '".$listFilter[$i]."'";
                                                    $result = mysqli_query($conn, $sqltamthoi);
                                                    $dem=0;
                                                    while($rowtamthoi= mysqli_fetch_array($result)){
                                                        if ($rowtamthoi['loaive'] === '0'){
                                                            $dem++;
                                                        }
                                                    }
                                                    if ($dem!==0){
                                                        // echo "<label>Trẻ em: </label>";
                                                        $result = mysqli_query($conn, $sqltamthoi);
                                                        $dem=0;
                                                        while($rowtamthoi= mysqli_fetch_array($result)){
                                                            if ($rowtamthoi['loaive'] === '0'){
                                                                $totalChild = (int)$giaChild * (int) $slChild;
                                                                $subTotal = $subTotal + $totalChild;
                                                                echo number_format($totalChild, 0, ',', '.')."VND<br><br>";
                                                            }
                                                        }
                                                    }

                                                    
                                                ?>
                                                <!-- 2.000.000 VND <br> -->

                                            </td>
                                            <td>
                                                <form>
                                                    <a href="xuly.php?xoa=<?php echo $listFilter[$i] ?>">
                                                        <button type="button" class="btn bg-danger rounded-3 text-light">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </a>
                                                </form>
                                            </td>

                                        </tr>

                                <?php
                                        }
                                    }
                                ?>
<!-- 
                                <tr>
                                    <td colspan="5">
                                        <div class="d-flex justify-content-end px-5">
                                        <div class="summary">
                                            <div class="summary-item "><span class="text">
                                                    <h4>Tổng tiền: </h4>
                                                </span><span class="price">100.000.000 VND </span></div>
                                            <a href="./xuly.php?luu"> <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button></a>
                                        </div>
                                        </div>
                                    </td>
                                </tr> -->
                            </table>
                        </div>
                    </div>

                    
                    <!-- <div class=""></div> --> 
                    <div class="d-flex justify-content-end">
                        <div class="summary">
                            <div class="summary-item">
                                <span class="text">
                                    <h4>Tổng tiền: </h4>
                                </span>
                                <span class="price"><?php 
                                    echo  number_format($subTotal, 0, ',', '.')." VND";
                                ?></span>
                            </div>
                            <a href="./xuly.php?luu=<?php echo $subTotal ?>"> 
                                <button type="button" class="btn btn-primary btn-lg btn-block px-5">Checkout</button>
                            </a>
                        </div>
                        <div class="px-5 py-5"></div>
                    </div>

                    <div class="px-5 py-3"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include "./user/footer.php"
?>