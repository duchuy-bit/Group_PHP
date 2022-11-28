<?php
    function get_connection(){
        $conn=mysqli_connect('37.59.55.185','EskUSL83Cb','awaNOX5Q9v', 'EskUSL83Cb');
    
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