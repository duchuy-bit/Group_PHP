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
  $id_loaidv = $_GET['id_loaidv'];
  $conn = get_connection();
  $sql = "DELETE FROM loai_dichvu
    where id='$id_loaidv'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_loaidv';</script>
<?php
        $_SESSION['loaidv'] = "Xóa loại dịch vụ thành công";
    }
?>