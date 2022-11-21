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

<?php
    $id_nv = $_GET['id_nv'];
    $conn = get_connection();
    $sql = "DELETE FROM khachhang WHERE id='$id_nv'";
        if(mysqli_query ($conn, $sql)){
            $_SESSION['nhanvien'] = "Xóa thành công";
    ?>
        
        <script>window.location.href = '../master.php?act=page_dskh';</script>
<?php
    }
?>