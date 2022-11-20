<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tour Booking</title>
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <script type = "text/javascript" 
        src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- <script type = "text/javascript" language = "javascript">
            $(document).ready(function() {
                $("a").click(function(event){
                event.preventDefault();
                // alert( "Default behavior is disabled!" );
                });
            });
    </script> -->
</head>
<?php 
//-- you can modified it like you want

// echo $width = "<script>var w = window.innerWidth;
// var h = window.innerHeight;</script><br>";
    // $height = "<script>document.write(window.innerHeight);</script>";
// echo $height."<br>";
// echo $width = "<script>document.write(window.innerWidth);</script>";

?>


<!-- ---------------------------------------------------- -->
<script >
        window.onload=function () {
            
            // var objDiv = document.getElementById("div1");
            // objDiv.scrollTop = objDiv.scrollHeight;
            <?php
            if(isset($_GET['trang'])){
            ?>
            document.querySelector('#div1').scrollIntoView()
            // alert( "Default behavior is disabled!" + objDiv.scrollHeight );
            <?php
            }
            ?>
        }
        // var objDiv = document.getElementById("list_service");
        // objDiv.scrollTop = objDiv.scrollHeight;
        // $("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 1000);
        // window.setInterval(function() {
        //     var elem = document.getElementById('list_service');
        //     elem.scrollTop = elem.scrollHeight;
        // }, 5000);
    </script> 
<!-- ---------------------------------------------------------- -->

<body style='overflow:auto'>
    <!-- Topbar Start -->
    <div class=" container-fluid padding">
        <div class="row padding">
            
            <div class="col-xs-0 col-sm-0 col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Địa chỉ</h6>
                        <span>02 Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-3 border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email</h6>
                        <span>GroupPHP@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Phone</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 text-center col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1"><a href="login.php">Nguyen Duc Huy</a></h6>
                        <span style="font-weight: bold;text-decoration:underline;">
                            <a href="" style="color: grey;"> Đăng xuất</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
