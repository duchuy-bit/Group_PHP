    <?php
    $id_nv = $_GET['id_nv'];
    $conn = get_connection();
    // $sqlLoai = "SELECT * FROM loai_nv";
    // $queryLoai = mysqli_query ($conn , $sqlLoai );

    $sql = "SELECT * FROM khachhang WHERE id=$id_nv";
    $query = mysqli_query ($conn , $sql );
    $row = mysqli_fetch_array($query);

    // if(isset($_POST['capnhat'])){
        // $name = $_POST['name'];
        // $mota = $_POST['mota'];
        // $id_loai = $_POST['id_loai'];
        // $xeploai = $_POST['xeploai'];
        // // $ten=$_POST['name'];
        // $diachi=$_POST['address'];
        // // $ntns=$_POST['ntns'];
        // $sdt=$_POST['sdt'];
        // // $gioitinh=$_POST['gioitinh'];

        // if($_FILES['anhdaidien']['name']==''){
        // $anhdaidien=$_POST['anhdaidien'];
        // }
        // else{
        // $anhdaidien=$_FILES['anhdaidien']['name'];
        // $tmp_name=$_FILES['anhdaidien']['tmp_name'];
        // }

        // // $email=$_POST['mail'];
        // // $pass= $_POST['pass'];
        // // $id_loainv=$_POST['id_loainv'];
        // // $soca= $_POST['soca'];

        // if(isset($name)&&isset($mota)&&isset($id_loai)&&isset($xeploai)&&isset($diachi)&&
        // isset($anhdaidien))
        // {
        // move_uploaded_file($tmp_name, '../dashboard/image_dichvu/'.$anhdaidien);
        // $sql = "UPDATE `dichvu` 
        //     SET `ten`='$name',`mota`='$mota',`anh`='$anhdaidien',`id_loai`='$id_loai',
        //     `xeploai`='$xeploai',`sdt`='$sdt',`diachi`='$diachi' 
        //     WHERE id='$id_nv'";
        // $conn = get_connection();
        // if (mysqli_query($conn, $sql)) {
        //     // Child
        //     if ($_POST['gia0']!==""){
        //         $sqlTam = "UPDATE `gia` 
        //             SET `id_dichvu`='$id_nv',`loaive`='0',`giatien`='".$_POST['gia0']."' 
        //             WHERE `id_dichvu`='$id_nv'and `loaive`='0'";
        //         mysqli_query($conn, $sqlTam);
        //     }
        //     else{
        //         $sqlTam = "DELETE FROM `gia`
        //             WHERE `id_dichvu`='$id_nv'and `loaive`='0'";
        //         mysqli_query($conn, $sqlTam);
        //     }

        //     // Adult
        //     if ($_POST['gia1']!==""){
        //         $sqlTam = "UPDATE `gia` 
        //             SET `giatien` = '".$_POST['gia1']."' 
        //             WHERE `id_dichvu`='$id_nv' and `loaive`='1'";
        //         mysqli_query($conn, $sqlTam);
        //     }
        //     // $dem=0;
        //     // $sqltam="SELECT * from gia where id_dichvu= '".$id_nv."' ";
        //     // $resulttam = mysqli_query ($conn , $sqltam);
        //     // if( mysqli_num_rows ( $resulttam ) !=0){
        //     //     while ( $rowtam = mysqli_fetch_array($resulttam)) {
        //     //         if ($rowtam['loaive'] === '0')
        //     //         {   $dem++;   }
        //     //     }
        //     // }                        
        //     // Add child
        //     if (isset($_POST['gia0_null'])){
        //         $sqlTam = "INSERT INTO `gia`(`id`, `id_dichvu`, `loaive`, `giatien`) 
        //         VALUES (null,'$id_nv','0','".$_POST['gia0_null']."')";
        //         mysqli_query($conn, $sqlTam);
        //     }

    ?>
        <!-- <script>window.location.href = 'master.php?act=page_dsdv';</script> -->
    <?php
            // $_SESSION['nhanvien'] = "Cập nhật thành công";
        // } else {
            // $thongbao = "Cập nhật thất bại";
        // }
        // }
        // else{
        // $thongbao = "Vui lòng điền đầy đủ thông tin";
        // }
    // }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Xem chi tiết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="master.php?act=page_dscart">Thông tin</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="card">
            <div class="card card-primary mb-0">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <table class="table ">
                <thead>
                    <tr>
                        <th style="width: 150px"></th>
                        <th style="width: auto">Thông tin khách hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label>Họ và tên</label>
                        </td>
                        <td><?php echo $row['name']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>SDT</label>
                        </td>
                        <td><?php echo $row['sdt']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Địa chỉ</label>
                        </td>
                        <td><?php echo $row['diachi']?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td><?php echo $row['email']?></td>
                    </tr>
                </tbody>
            </table>
            <label class="d-flex justify-content-center">Danh sách dịch vụ trong giỏ hàng</label><br> 
            <!-- List Cart -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: auto">STT</th>
                        <th style="width: auto">Dịch vụ</th>
                        <th style="width: auto">Ảnh</th>
                        <th style="width: auto">Giá tiền</th>
                        <th style="width: auto">Số lượng</th>
                        <!-- <th style="width: 50px">Chức năng</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mysql= "SELECT * 
                        FROM giohang 
                            INNER JOIN gia on giohang.id_gia = gia.id
                            inner join dichvu on dichvu.id = gia.id_dichvu
                        where giohang.id_khachhang = $id_nv";

                        class item
                        {
                            public $name;
                            public $anh;
                            public $loai_gia;
                            public $gia;
                            public $sl;
                            // public $picture;
                        }
                        $result = mysqli_query($conn, $mysql);
                        $listItem=array();
                        $listFilter=array();
                        if (mysqli_num_rows($result)!=0){
                            while ($rowCart = mysqli_fetch_array($result)){
                                array_push($listFilter,$rowCart['id_dichvu']);
                            }
                        }

                        // Loc Array
                        $listFilter=array_values(array_unique($listFilter));

                        // $result = mysqli_query($conn, $mysql);
                        // for ($i = 0; $i < count($listFilter); $i++){
                        //     if (mysqli_num_rows($result)!=0){
                        //         while ($rowCart = mysqli_fetch_array($result)){
                                    
                        //                 if ($rowCart['id_dichvu'] === $listFilter[$i]){
                        //                     $obj= new item();
                        //                     $obj->name = $rowCart['ten'];
                        //                     $obj->anh = $rowCart['anh'];
                        //                     array_push($listItem,$obj);
                        //                     // array_push($listFilter,$rowCart['ten']);
                        //                 }
                        //             }
                                    
                        //         }
                        // }

                        // // Sx Array
                        // $price = array_column($listItem, 'name');
                        // array_multisort($price, SORT_DESC, $listItem);

                        

                        for ($i = 0 ; $i < count($listFilter); $i++)
                        {
                    ?>
                        <tr>
                            <!-- STT -->
                            <td><?php echo  $i+1 ?></td>
                            <!-- Tên dịch vụ -->
                            <td><?php 
                                $sqltamthoi="SELECT * from dichvu
                                where dichvu.id = '".$listFilter[$i]."'";
                                $result = mysqli_query($conn, $mysql);
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['id'] === $listFilter[$i]){
                                        echo $rowtamthoi['ten'];
                                        break;
                                    }
                                }
                            ?></td>
                            <!-- Ảnh mô tả -->
                            <td><?php 
                                $sqltamthoi="SELECT * from dichvu 
                                where dichvu.id = '".$listFilter[$i]."'";
                                $result = mysqli_query($conn, $mysql);
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['id'] === $listFilter[$i]){
                                        echo "<img src='../dashboard/image_dichvu/".$rowtamthoi['anh']."' alt='".$rowtamthoi['anh']."' width='120px' height='80px'>";
                                        break;
                                    }
                                }
                            ?></td>
                            <!--  Giá -->
                            <td><?php 
                                $sqltamthoi="SELECT * 
                                from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                where dichvu.id = '".$listFilter[$i]."'";
                                $result = mysqli_query($conn, $sqltamthoi);
                                echo "<label>Người lớn: &emsp;</label>";
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['loaive'] === '1'){
                                        echo number_format($rowtamthoi['giatien'], 0, ',', '.')."VND<br>";
                                    }
                                }

                                $result = mysqli_query($conn, $sqltamthoi);
                                $dem=0;
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['loaive'] === '0'){
                                        $dem++;
                                    }
                                }
                                if ($dem!==0){
                                    echo "<label>Trẻ em: &emsp;&emsp;</label>";
                                    $result = mysqli_query($conn, $sqltamthoi);
                                    $dem=0;
                                    while($rowtamthoi= mysqli_fetch_array($result)){
                                        if ($rowtamthoi['loaive'] === '0'){
                                            echo number_format($rowtamthoi['giatien'], 0, ',', '.')."VND<br>";
                                        }
                                    }
                                }
                            ?></td>
                            <!-- Số lượng -->
                            <td><?php 
                                $sqltamthoi="SELECT * 
                                from dichvu inner join gia on gia.id_dichvu = dichvu.id
                                inner join giohang on giohang.id_gia = gia.id
                                where giohang.id_khachhang=$id_nv and dichvu.id = '".$listFilter[$i]."'";
                                $result = mysqli_query($conn, $sqltamthoi);
                                // echo "<label>Người lớn: </label>";
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['loaive'] === '1'){
                                        echo $rowtamthoi['sl']."<br>";
                                    }
                                }
                                
                                $result = mysqli_query($conn, $sqltamthoi);
                                $dem=0;
                                while($rowtamthoi= mysqli_fetch_array($result)){
                                    if ($rowtamthoi['loaive'] === '0'){
                                        $dem++;
                                    }
                                }
                                if ($dem!==0){
                                    // echo "<label>Trẻ em: </label>";
                                    $result = mysqli_query($conn, $sqltamthoi);
                                    $dem=0;
                                    while($rowtamthoi= mysqli_fetch_array($result)){
                                        if ($rowtamthoi['loaive'] === '0'){
                                            echo $rowtamthoi['sl']."<br>";
                                        }
                                    }
                                }
                            ?></td>
                            <!-- <td align="center"> -->
                                <!-- <abbr title="Xóa dữ liệu">
                                    <a>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </a>
                                </abbr> -->
                            <!-- </td> -->
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
                </div>

                <div class="card-footer">
                <!-- <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button> -->
                <a href="master.php?act=page_dscart">
                    <button type="button" class="btn btn-primary">Quay lại</button>
                </a>
                </div>
            
            </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->