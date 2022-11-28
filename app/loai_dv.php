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

    $mysql = "SELECT * from loai_nv";
    $result = mysqli_query($conn, $mysql);

    $arr = array();

    while ($row = mysqli_fetch_array($result)){
        array_push($arr, $row);
        // echo $row."<br>";
    }
    // foreach($arr as )
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);

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