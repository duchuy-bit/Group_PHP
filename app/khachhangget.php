<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php
    // $servername = 'localhost';
    // $username = 'root';
    // $password = '';
    // $database = 'tourbooking';
    
    // $conn = mysqli_connect($servername,$username,$password,$database);
    include "../user/connect.php";

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);

    $email = $obj['email'];
    $pass = $obj['pass'];

    // $email = 'huy.nd.61cntt@ntu.edu.vn';
    // $pass = '123';

    $mysql = "SELECT * from khachhang";
    $result = mysqli_query($conn, $mysql);

    // $arr = array();

    $check = 'false';
    // mysqli_fetch_array()

    while ($row = mysqli_fetch_array($result)){
        if ($email === $row['email'] &&  password_verify( $pass,$row['matkhau']) ){
            $check = $row['id'];
        }
    }
    if ($check === 'false') echo '{"check": "false"}'; else echo '{"check":'.$check.'}';
    // foreach($arr as )
    // echo json_encode($arr,JSON_UNESCAPED_UNICODE);

    // $json = file_get_contents('php://input');
    // $obj = json_decode($json, true);
    // $name= $obj['name'];
    // $email = $obj['email'];
    // $pass = $obj['pass'];
    
    // // echo "name = ".$name;
    // // echo "<br> pass".$pass; 
    
    // $sql = "INSERT INTO `loai_nv`(`id`, `tenloai`, `luongcoban`) VALUES (null,'".$name."','".$pass."')";
    // $result = mysqli_query ($conn , $sql );

    // $age = array("name"=>$name, "luong"=>$pass);

    // echo json_encode($age);    


    mysqli_close($conn);



?>