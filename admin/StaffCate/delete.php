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
  $id_dmnv = $_GET['id_dmnv'];
  $conn = get_connection();
  $sql = "DELETE FROM loai_nv WHERE id='$id_dmnv'";
    if(mysqli_query ($conn, $sql)){
?>
      <script>window.location.href = '../master.php?act=page_dmnv';</script>
<?php
        $_SESSION['dmnhanvien'] = "Xóa thành công";
    }
?>