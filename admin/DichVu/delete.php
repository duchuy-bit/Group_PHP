<?php
    $id = $_GET['id_nv'];
    // $conn = get_connection();
    // $servename = 'localhost';
    //     $username = 'root';
    //     $password = '';
    //     $dbname = 'tourbooking';
    //     $conn = mysqli_connect($servename, $username, $password, $dbname);
    $conn=mysqli_connect('37.59.55.185','EskUSL83Cb','awaNOX5Q9v', 'EskUSL83Cb');

    // $sql = "DELETE FROM gia
    // where id_dichvu='$id_loaidv'";
    // mysqli_query ($conn, $sql);

    $sql = "DELETE FROM dichvu where id = $id";
    if(mysqli_query ($conn, $sql)){
?>
        <script>window.location.href = '../master.php?act=page_dsdv';</script>
<?php
        $_SESSION['nhanvien'] = "Xóa loại dịch vụ thành công ";
    }
?>