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

<?php
    $id_loaidv = $_GET['id_loaidv'];
    $conn = get_connection();

    // $sql = "DELETE FROM gia
    // where id_dichvu='$id_loaidv'";
    // mysqli_query ($conn, $sql);

    $sql = "DELETE FROM loai_dichvu
    where id='$id_loaidv'";
    if(mysqli_query ($conn, $sql)){
?>
        <script>window.location.href = '../master.php?act=page_loaidv';</script>
<?php
        $_SESSION['loaidv'] = "Xóa loại dịch vụ thành công";
    }
?>