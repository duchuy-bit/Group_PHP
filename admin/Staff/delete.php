<?php
    function get_connection(){
        $servename = 'localhost:3307';
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
  $sql = "DELETE FROM nhanvien WHERE idnv='$id_nv'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_dsnv';</script>
<?php
        $_SESSION['nhanvien'] = "Xóa thành công";
    }
?>