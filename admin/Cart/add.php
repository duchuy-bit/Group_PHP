    <?php
    if(isset($_POST['themmoi']))
    {
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

        if(isset($name)&&isset($mota)&&isset($id_loai)&&isset($xeploai)&&isset($diachi)&&
        isset($anhdaidien))
        {
            move_uploaded_file($tmp_name, '../dashboard/image_dichvu/'.$anhdaidien);
            $sql = "INSERT INTO `dichvu`(`id`, `ten`, `mota`, `anh`, `id_loai`, `xeploai`, `sdt`, `diachi`)
                VALUES (null,'$name','$mota','$anhdaidien','$id_loai','$xeploai','$sdt','$diachi')";
            $conn = get_connection();
            if (mysqli_query($conn, $sql)) {

                // ----GET ID DICH VU----------
                $sqltam="SELECT * from dichvu";
                $resulttam = mysqli_query ($conn , $sqltam);
                $dem=0; $id_dichvu ="";
                if( mysqli_num_rows ( $resulttam ) !=0){
                    while ( $rowtam = mysqli_fetch_array($resulttam)) {
                        $dem++;
                        if ($dem === mysqli_num_rows($resulttam)) $id_dichvu = $rowtam['id'];
                    }
                }

                if (isset($_POST['gia1'])){
                    $sqltam="INSERT INTO `gia`(`id`, `id_dichvu`, `loaive`, `giatien`) 
                    VALUES (null,'$id_dichvu','1','".$_POST['gia1']."')";
                    mysqli_query ($conn , $sqltam);
                }

                if (isset($_POST['gia0'])){
                    $sqltam="INSERT INTO `gia`(`id`, `id_dichvu`, `loaive`, `giatien`) 
                    VALUES (null,'$id_dichvu','0','".$_POST['gia0']."')";
                    mysqli_query ($conn , $sqltam);
                }
                // $sql1 = "INSERT into soca (soca) VALUES ('$soca')";
                // mysqli_query($conn, $sql1);
    ?>
                <script>window.location.href = 'master.php?act=page_dsdv';</script>
    <?php
                $_SESSION['nhanvien'] = "Th??m th??nh c??ng";
            } else {
                $thongbao = "Th??m th???t b???i";
            }
        }
        else{
        $thongbao = "Vui l??ng ??i???n ?????y ????? th??ng tin";
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
                <h1>Th??m m???i</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="master.php">Trang ch???</a></li>
                <li class="breadcrumb-item"><a href="master.php?act=page_dsdv">Th??ng tin</a></li>
                <li class="breadcrumb-item active">Th??m d???ch v???</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="card">
            <?php
                if(isset($thongbao))
                echo "<div class='alert alert-success'>".$thongbao."</div>";
            ?>
            <!-- /.card-header -->
            <div class="card card-primary mb-0">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                        <label>T??n d???ch v???</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>M?? t???</label>
                        <textarea type="text" name="mota" class="form-control"  required></textarea>
                    </div>
                    <div class="form-group">
                        <label>???nh ?????i di???n</label>
                        <input type="file" name="anhdaidien" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Lo???i d???ch v???</label><br>
                        <select name="id_loai">
                            <?php
                                $conn = get_connection();
                                $sqltam="SELECT * from loai_dichvu";
                                $resulttam = mysqli_query ($conn , $sqltam);
                                if( mysqli_num_rows ( $resulttam ) !=0){
                                    while ( $rowtam = mysqli_fetch_array($resulttam)) {
                                        echo "<option value='".$rowtam['id']."'";
                                        // if ($rowtam['id']=== $row['id_loai']) echo "selected";
                                        echo ">". $rowtam['tenloai'];
                                        echo "</option>";
                                    }
                                    
                                }
                                // echo "</div>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>X???p lo???i</label>
                        <input type="text" name="xeploai" class="form-control" style="width: 150px;" required>
                    </div>
                    <div class="form-group">
                        <label>Gi??</label>
                        <div class='row d-flex p-2'>
                            Ng?????i l???n: &nbsp; 
                            <input type="number" name="gia1" class="form-control" style="width: 200px;"
                            required>&nbsp;VND<br>
                        </div>

                        <div class='row d-flex p-2'>
                            Tr??? nh???: &emsp;
                            <input type="number" name="gia0" class="form-control" style="width: 200px;">&nbsp;VND<br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>SDT</label>
                        <input type="text" name="sdt" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>?????a ch???</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <!-- <div class="form-group">
                        <label>???nh ?????i di???n</label>
                        <input type="file" name="anhdaidien" class="form-control-file">
                    </div> -->
                    
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="themmoi" class="btn btn-primary">Th??m</button>
                    <a href="master.php?act=page_dsnv">
                        <button type="button" class="btn btn-primary">Quay l???i</button>
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