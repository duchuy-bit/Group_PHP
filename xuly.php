<?php 

    $id_customer = $_COOKIE['login'] ;

    include "./user/connect.php";

    
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        echo $id;

        $sql= "SELECT * from  
            giohang inner join gia on gia.id = giohang.id_gia
            inner join dichvu on dichvu.id=gia.id_dichvu
            where dichvu.id = '$id' and giohang.id_khachhang = $id_customer";
        $query = mysqli_query($conn, $sql);



        if (mysqli_num_rows($query) !=0){
            while ($result  = mysqli_fetch_array($query)){
                echo "<br> ".$result['id_gia'];
                $sqlTam= "DELETE from  giohang 
                where giohang.id_khachhang = $id_customer and id_gia = '".$result['id_gia']."'";
                mysqli_query($conn, $sqlTam);
            }
        }

        // $sql= "DELETE from  giohang where id_giohang = '$id'";
        // $query = mysqli_query($conn, $sql);
        header('Location:giohang.php');
    }



    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        // echo $id;
        $sql= "SELECT  * from  giohang where id_khachhang = '$id_customer' and id_gia='$id'";
        $query = mysqli_query($conn, $sql);
        $giohang = mysqli_fetch_array($query);
        //  print_r($giohang);
        $newsl = $giohang['sl']+1;
        //  print_r($giohang);
        if($newsl <=10){
            $sql= "UPDATE giohang set sl = '$newsl' where id_khachhang = '$id_customer' and id_gia='$id'";
            $query = mysqli_query($conn, $sql);
            header('Location:giohang.php');
        }else{
            header('Location:giohang.php');
        }
    }
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        // echo $id;
        $sql= "SELECT  * from  giohang where id_khachhang = '$id_customer' and id_gia='$id'";
        $query = mysqli_query($conn, $sql);
        $giohang = mysqli_fetch_array($query);
        //  print_r($giohang);
        // $newsl = $giohang['sl']+1;
        //  print_r($giohang);
        $newsl = $giohang['sl']-1;
        //  print_r($giohang);
        if($newsl>=0){
            $sql= "UPDATE giohang set sl = '$newsl' where id_khachhang = '$id_customer' and id_gia='$id'";
            $query = mysqli_query($conn, $sql);
            header('Location:giohang.php');
        }else{
            header('Location:giohang.php');
        }
        
    }
    if(isset($_GET['luu'])){
        $subToTal = $_GET['luu'];
        $dateNow = date("Y/m/d");

        // GEt Infomation Customer
        $infoCustomer = mysqli_fetch_array(
            mysqli_query($conn,"SELECT * from khachhang where id= $id_customer")
        );
        // Create Bill
        mysqli_query($conn, "INSERT INTO 
            `hoadon`(`id`, `id_khachhang`, `id_nhanvien`, `ngaythanhtoan`, `ten_khachhang`, 
            `sdt_khachhang`, `email_khachhang`, `tongtien`)
            VALUES 
            (null,'$id_customer','1','$dateNow','".$infoCustomer['name']."',
            '".$infoCustomer['sdt']."','".$infoCustomer['email']."','$subToTal')"
        );
        // Get id BILL
        $sql= "SELECT  * from  hoadon where id_khachhang = '$id_customer'";
        $query = mysqli_query($conn, $sql);
        $d=0;
        $id_bill='';
        if (mysqli_num_rows($query)!=0){
            while ( $row = mysqli_fetch_array($query)){
                $d++;
                if ($d === mysqli_num_rows($query))
                {
                    $id_bill = $row['id'];
                }
            }
        }

        //Insert Detail Bill
        $sql= "SELECT  * from  giohang inner join gia on gia.id=giohang.id_gia
        where id_khachhang = '$id_customer'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query)!=0){
            while ( $row = mysqli_fetch_array($query)){
                // mysqli_fetch_array(
                    if ($row['sl'] !== '0' ){
                        mysqli_query(
                            $conn,
                            "INSERT INTO `cthd`(`id_hd`, `id_gia`, `sl`, `giatien`) 
                                VALUES ('$id_bill','".$row['id_gia']."','".$row['sl']."','".$row['giatien']."')"
                        );
                    }
            }
        }
        mysqli_query($conn,"DELETE FROM `giohang` WHERE id_khachhang=$id_customer");

        header('Location:giohang.php');
        // for()
}
