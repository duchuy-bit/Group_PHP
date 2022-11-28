<?php
    // $severname="localhost";
    // $username="root";
    // $password="";
    // $dbname="tourbooking";
    // $conn=mysqli_connect($severname,$username,$password,$dbname);
    include "./user/connect.php";

    if (isset($_POST['dki'])) {
        $name = $_POST['name'];
		$sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $matkhau  = $_POST['matkhau'];
        $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);

        $check = true;
        $result = mysqli_query ($conn , "SELECT * from khachhang where email = '$email'");
        if( mysqli_num_rows ($result) === 0){
            // while ( $row = mysqli_fetch_array ($result)) {
                $mysql = "INSERT INTO `khachhang`(`id`, `name`, `sdt`, `diachi`, `ngaysinh`, `gioitinh`, `email`, `matkhau`, `avatar`) 
                    VALUES (null,'".$name."','".$sdt."','' , '1000/01/01' ,'1','".$email."','".$matkhau."','') " ;
                
                mysqli_query ($conn , $mysql );
                echo "<script type='text/javascript'>alert('Đăng ký thành công');</script>";
            // }
        }else{
            echo "<script type='text/javascript'>alert('Email đã tồn tại . . .');</script>";
        }

        
    }

    

    

    if (isset($_POST['dnhap'])) { 
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];

        $d=false;

        $sql = "SELECT * FROM `nhanvien`";
        $result = mysqli_query ($conn , $sql);
        if( mysqli_num_rows ($result) !=0){
            while ( $row = mysqli_fetch_array ($result)) {
                if((isset($_POST['email'])) && $email === $row['email']){
                    if((isset($_POST['matkhau'])) && password_verify($matkhau, $row['matkhau']) == true  ) {
                        $d= true;

                        setcookie( 'type' , 'admin' , time () + (604800) , "/");
                        setcookie( 'login' , $row['idnv'] , time () + (604800) , "/");
                        ?>
                            <script>window.location.href = 'index.php';</script>
                        <?php
                        // <!-- header("Location: ../Group_PHP/index.php"); -->
                    }
                }    
            }
        }     

        $sql = "SELECT * FROM `khachhang`";
        $result = mysqli_query ($conn , $sql);
        if( mysqli_num_rows ($result) !=0){
            while ( $row = mysqli_fetch_array($result)) {
                if((isset($_POST['email'])) && $email===$row['email']){
                    if((isset($_POST['matkhau'])) && password_verify($matkhau,$row['matkhau']) === true) {
                        $d= true;
                        setcookie( 'type' , 'customer' , time () + (604800) , "/");
                        setcookie( 'login' , $row['id'] , time () + (604800) , "/");
                        // header("Location: ../Group_PHP/index.php"); 
                        ?>
                            <script>window.location.href = 'index.php';</script>
                        <?php
                    }
                }    
            }
        } 
        
        if ($d=== false ) {
            echo "<script type='text/javascript'>alert('Vui lòng nhập lại tài khoản . . . ');</script>";
        }
    }   

?>



<head>
    <meta charset="utf-8">
    <title>Vinpearl</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/stylelogin.css" rel="stylesheet">
</head>
<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Đăng kí</h1>
			<div class="social-container">
				
			</div>

			<input type="text" name="name" placeholder="Name" />
			<input type="phone" name="sdt" pattern="[0-9]{10}" placeholder="Phone" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="matkhau" placeholder="Password" />
			<button name="dki">Xác nhận</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Đăng nhập</h1>
			<div class="social-container">
			</div>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="matkhau" placeholder="Password" />
			<a href="forgotpassword.php">Quên mật khẩu?
				
			</a>
			<button name="dnhap">Xác nhận</a></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào bạn!</h1>
				<p>Đăng nhập với tài khoản của bạn để kết nối với chúng tôi</p>
				<button class="ghost" id="signIn">Đăng nhập</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hi, Bro!</h1>
				<p>Điền đầy đủ thông tin đăng ký và bắt đầu chuyến tham quan nào ...</p>
				<button class="ghost" id="signUp">Đăng ký</button>
			</div>
		</div>
	</div>
</div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>