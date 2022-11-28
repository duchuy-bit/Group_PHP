<?php
    function get_connection(){
        // $servename = 'localhost';
        // $username = 'root';
        // $password = '';
        // $dbname = 'tourbooking';
        // $conn = mysqli_connect($servename, $username, $password, $dbname);
        $conn=mysqli_connect('37.59.55.185','EskUSL83Cb','awaNOX5Q9v', 'EskUSL83Cb');
    
        return $conn;
    }
?>