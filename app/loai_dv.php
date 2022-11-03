<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'tourbooking';
    
    $conn = mysqli_connect($servername,$username,$password,$database);

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $name= $obj['name'];
    $email = $obj['email'];
    $pass = $obj['pass'];
    
    // echo "name = ".$name;
    // echo "<br> pass".$pass; 
    
    $sql = "INSERT INTO `loai_nv`(`id`, `tenloai`, `luongcoban`) VALUES (null,'".$name."','".$pass."')";
    $result = mysqli_query ($conn , $sql );

    $age = array("name"=>$name, "luong"=>$pass);

    echo json_encode($age);    


    mysqli_close($con);



?>