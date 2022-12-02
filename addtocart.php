<?php
    // $id = $_GET['id'];
    include "./user/connect.php";

    $id_kh= '';
    if (isset($_COOKIE['type'])){
        if ($_COOKIE['type']=== 'customer'){
            $id_kh=$_COOKIE['login'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }
    $sql_chitiet = mysqli_query($conn,"SELECT * FROM `dichvu` WHERE id='$id'");

    

    // if (isset($_POST['addtocart']))
    // {
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
                    // echo $rowtam['id'];
                    $id_giaChild= $rowtam['id'];
                    // $giatien = $row
                }
            }
            
        }

        if ($id_kh !==''){
            //____Check Tồn tại sp trong giohangf
            $result = mysqli_query($conn,"SELECT * 
                FROM gia inner join giohang on gia.id = giohang.id_gia
                where giohang.id_khachhang = '$id_kh' and giohang.id_gia = '$id_gia'");
            if (mysqli_num_rows($result)!=0){
                echo "<script type='text/javascript'>alert('Dịch vụ đã có sẵn trong giỏ hàng');</script>";
                ?>
                    <script>window.history.back(-1);</script>
                <?php
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
                    ?>
                        <!-- <script>window.location.href = 'login.php';</script> -->
                        <script>window.history.back(-1);</script>
                        <!-- "javascript:window.history.back(-1);" -->
                    <?php
                }else {
                    echo "<script type='text/javascript'>alert('Thêm giỏ hàng không thành công !!!');</script>";
                    ?>
                        <script>window.history.back(-1);</script>
                    <?php
                }
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Vui lòng đăng nhập')</script>";
            ?>
                <script>window.location.href = 'login.php';</script>
            <?php
        }
        
    // }
?>