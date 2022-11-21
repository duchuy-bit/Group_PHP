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

<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="tourbooking";
    $conn=mysqli_connect($severname,$username,$password,$dbname);

    if (isset($_POST['dki'])) {
        $name = $_POST['name'];
		$sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $matkhau  = $_POST['matkhau'];

        $mysql = "INSERT INTO `khachhang`(`name`, `sdt`, `email`, `matkhau`) VALUES ('".$name."','".$sdt."','".$email."','".$matkhau."') " ;
        $result = mysqli_query ($conn , $mysql );
    }

    $sql = "SELECT * FROM `khachhang`";
    $result = mysqli_query ($conn , $sql);

    if (isset($_POST['dnhap'])) { 
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];


        if( mysqli_num_rows ($result) !=0){
            while ( $row = mysqli_fetch_row ($result)) {
                if((isset($_POST['email'])) && $email===$row[6]){
                    if((isset($_POST['matkhau'])) && $matkhau===$row[7]) header("Location: ../Group_PHP/index.php"); 
                }    
            }
        }       
    }   

?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Đăng kí</h1>
			<div class="social-container">
				
			</div>

			<input type="text" name="name" placeholder="Name" />
			<input type="phone" name="sdt" placeholder="Phone" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="matkhau" placeholder="Password" />
			<button name="dki">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Đăng nhập</h1>
			<div class="social-container">
			</div>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="matkhau" placeholder="Password" />
			<a href="#">Forgot your password?
				
			</a>
			<button name="dnhap">Sign In</a></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
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