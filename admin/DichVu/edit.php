    <?php
    $id_nv = $_GET['id_nv'];
    $conn = get_connection();
    // $sqlLoai = "SELECT * FROM loai_nv";
    // $queryLoai = mysqli_query ($conn , $sqlLoai );

    $sql = "SELECT * FROM dichvu WHERE id=$id_nv";
    $query = mysqli_query ($conn , $sql );
    $row = mysqli_fetch_array($query);

    if(isset($_POST['capnhat'])){
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $id_loai = $_POST['id_loai'];
        $xeploai = $_POST['xeploai'];
        // $ten=$_POST['name'];
        $diachi=$_POST['address'];
        // $ntns=$_POST['ntns'];
        $sdt=$_POST['sdt'];
        // $gioitinh=$_POST['gioitinh'];

        if($_FILES['anhdaidien']['name']==''){
        $anhdaidien=$_POST['anhdaidien'];
        }
        else{
        $anhdaidien=$_FILES['anhdaidien']['name'];
        $tmp_name=$_FILES['anhdaidien']['tmp_name'];
        }

        // $email=$_POST['mail'];
        // $pass= $_POST['pass'];
        // $id_loainv=$_POST['id_loainv'];
        // $soca= $_POST['soca'];

        if(isset($name)&&isset($mota)&&isset($id_loai)&&isset($xeploai)&&isset($diachi)&&
        isset($anhdaidien))
        {
        move_uploaded_file($tmp_name, '../dashboard/image_dichvu/'.$anhdaidien);
        $sql = "UPDATE `dichvu` 
            SET `ten`='$name',`mota`='$mota',`anh`='$anhdaidien',`id_loai`='$id_loai',
            `xeploai`='$xeploai',`sdt`='$sdt',`diachi`='$diachi' 
            WHERE id='$id_nv'";
        $conn = get_connection();
        if (mysqli_query($conn, $sql)) {
            // Child
            if ($_POST['gia0']!==""){
                $sqlTam = "UPDATE `gia` 
                    SET `id_dichvu`='$id_nv',`loaive`='0',`giatien`='".$_POST['gia0']."' 
                    WHERE `id_dichvu`='$id_nv'and `loaive`='0'";
                mysqli_query($conn, $sqlTam);
            }
            else{
                $sqlTam = "DELETE FROM `gia`
                    WHERE `id_dichvu`='$id_nv'and `loaive`='0'";
                mysqli_query($conn, $sqlTam);
            }

            // Adult
            if ($_POST['gia1']!==""){
                $sqlTam = "UPDATE `gia` 
                    SET `giatien` = '".$_POST['gia1']."' 
                    WHERE `id_dichvu`='$id_nv' and `loaive`='1'";
                mysqli_query($conn, $sqlTam);
            }
            // $dem=0;
            // $sqltam="SELECT * from gia where id_dichvu= '".$id_nv."' ";
            // $resulttam = mysqli_query ($conn , $sqltam);
            // if( mysqli_num_rows ( $resulttam ) !=0){
            //     while ( $rowtam = mysqli_fetch_array($resulttam)) {
            //         if ($rowtam['loaive'] === '0')
            //         {   $dem++;   }
            //     }
            // }                        
            // Add child
            if (isset($_POST['gia0_null'])){
                $sqlTam = "INSERT INTO `gia`(`id`, `id_dichvu`, `loaive`, `giatien`) 
                VALUES (null,'$id_nv','0','".$_POST['gia0_null']."')";
                mysqli_query($conn, $sqlTam);
            }

    ?>
        <script>window.location.href = 'master.php?act=page_dsdv';</script>
    <?php
            $_SESSION['nhanvien'] = "Cập nhật thành công";
        } else {
            $thongbao = "Cập nhật thất bại";
        }
        }
        else{
        $thongbao = "Vui lòng điền đầy đủ thông tin";
        }
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chỉnh sửa thông tin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="master.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="master.php?act=page_dsdv">Thông tin</a></li>
                <li class="breadcrumb-item active">Sửa dịch vụ</li>
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
                    <div class="form-group">
                        <label>Tên dịch vụ</label>
                        <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $row['ten']?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea type="text" name="mota" class="form-control"  required><?php 
                            if(isset($_POST['mota'])) echo $_POST['mota']; else echo $row['mota']
                        ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input style="margin-bottom:10px" type="file" name="anhdaidien" class="form-control-file">
                    <input type="hidden" name="anhdaidien" value="<?php echo $row['anh']?>">
                    <img src="../dashboard/image_dichvu/<?php echo $row['anh']?>" alt="<?php echo $row['anh']?>" width="170px" height="120px">
                    </div>
                    <div class="form-group">
                        <label>Loại dịch vụ</label><br>
                        <select name="id_loai">
                            <?php
                                $sqltam="SELECT * from loai_dichvu";
                                $resulttam = mysqli_query ($conn , $sqltam);
                                if( mysqli_num_rows ( $resulttam ) !=0){
                                    while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                        echo "<option value='".$rowtam['id']."'";
                                        if ($rowtam['id']=== $row['id_loai']) echo "selected";
                                        echo ">". $rowtam['tenloai'];
                                        echo "</option>";
                                    }
                                    
                                }
                                // echo "</div>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Xếp loại</label>
                        <input type="text" name="xeploai" class="form-control" style="width: 150px;"
                            value="<?php if(isset($_POST['xeploai'])) echo $_POST['address']; else echo $row['xeploai']?>" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <?php
                                $sqltam="SELECT * from gia where id_dichvu= '".$row['id']."' ";
                                $resulttam = mysqli_query ($conn , $sqltam);

                                echo "<div class='row d-flex p-2'>";
                                echo "Người lớn: &nbsp; ";
                                $dem=0;
                                if( mysqli_num_rows ( $resulttam ) !=0){
                                    while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                        if ($rowtam['loaive'] === '1')
                                        {   $dem++;                      
                        ?>  
                                            <input type="number" name="gia1" class="form-control" style="width: 200px;"
                                                value="<?php 
                                                    if(isset($_POST['gia1'])) echo $_POST['gia1'];echo $rowtam['giatien'] 
                                                ?>"required>&nbsp;VND<br>
                        <?php           }
                                    }
                                }
                                if ($dem===0) {
                        ?>
                                    <input type="number" name="gia1_null" class="form-control" style="width: 200px;"
                                        value="<?php echo "" ?>"required>&nbsp;VND<br>
                        <?php
                                }
                                echo "</div>";

                                echo "<div class='row d-flex p-2'>";
                                // Tre nho
                                echo "Trẻ nhỏ: &emsp;";
                                $dem=0;
                                $resulttam = mysqli_query ($conn , $sqltam);
                                if( mysqli_num_rows ( $resulttam ) !=0){
                                    while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                        if ($rowtam['loaive'] === '0')
                                        {   $dem++;                         
                        ?>  
                                            <input type="number" name="gia0" class="form-control" style="width: 200px;"
                                                value="<?php 
                                                    if(isset($_POST['gia0'])) echo $_POST['gia0']; else echo $rowtam['giatien']
                                                ?>">&nbsp;VND<br>
                        <?php           }
                                    }
                                }
                                if ($dem===0) {
                        ?>
                                <input type="number" name="gia0_null" class="form-control" style="width: 200px;">&nbsp;VND<br>
                        <?php
                                }
                                echo "</div>";
                            ?>
                    </div>
                    <div class="form-group">
                        <label>SDT</label>
                        <input type="text" name="sdt" class="form-control"
                            value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt']; else echo $row['sdt']?>" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control"
                            value="<?php if(isset($_POST['address'])) echo $_POST['address']; else echo $row['diachi']?>"required>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" name="capnhat" class="btn btn-primary">Lưu</button>
                <a href="master.php?act=page_dsdv">
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