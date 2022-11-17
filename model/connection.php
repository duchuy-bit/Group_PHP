<?php
    function get_connection(){
        $servename = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'tourbooking';
        $conn = mysqli_connect($servename, $username, $password, $dbname);
    
        return $conn;
    }
?>