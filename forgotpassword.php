
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<?php
    include "./user/connect.php";
    if (isset($_POST['reset'])){
        // echo "<script type='text/javascript'>alert('ok');</script>";
        $sql= "SELECT * FROM khachhang";
        $result = mysqli_query($conn, $sql);
        $d=0;
        if (mysqli_num_rows($result) !=0){
            while ($row = mysqli_fetch_array($result)){
                if ($row['email'] === $_POST['email']){
                    $d++;
                    break;
                }
            }
        }

        if ($d==0){
            echo "<script type='text/javascript'>alert('Email của bạn không chính xác');</script>";
        }else{
            $to = $_POST['email'];
            $subject = "My subject";
            $txt = "Hello world!";
            $headers = "From: huy.nd.61cntt@ntu.edu.vn" . "\r\n" .
            "CC: somebodyelse@example.com";

            // $to = 'recipient@example.com'; // Could also be $to = $_POST['recipient']; 
            $subject = 'Email Subject'; // Could also be $subject = $_POST['subject']; 
            $message = 'This is the email message body'; // Could also be $message = $_POST['message']; 
            $headers = implode("\r\n", [
            'From: John Conde <webmaster@example.com>',
            'Reply-To: webmaster@example.com',
            'X-Mailer: PHP/' . PHP_VERSION
            ]);
            $fifth = '-fno-reply@example.com';
            
            // log('alo');
            $result = mail($to, $subject, $message, $headers, $fifth);


            if ($result){
                echo "<script type='text/javascript'>alert('Mã xác nhận đã gửi tới email của bạn ... ');</script>";
                ?>
                    <script>window.location.href = 'login.php';</script>
                <?php
            }else{
                echo "<script type='text/javascript'>alert('Loading ... ');</script>";
            }
            // mail($to,$subject,$txt,$headers);
            // echo "<script type='text/javascript'>alert('Mã xác nhận đã gửi tới email của bạn ... ');</script>";
        }

    }

?>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="index.php" title="logo" target="_blank">
                                <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <form method="POST">                                    
                                        <td style="padding:0 35px;">
                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                                Nhập email của bạn ... 
                                            </h1><br>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Email..." 
                                                    type="text"
                                                    name='email'
                                                    style="width: 200px;height: 30px;border-color: grey; border-radius: 25px; padding: 10px; padding-left: 20px; font-size: 16px;"
                                                    required
                                                />
                                            </div>
                                            <!-- <br> -->

                                            <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Chúng tôi sẽ gửi một mã xác nhận về địa chỉ email mà bạn đã nhập. Dựa vào đó bạn có thể thay đổi mật khẩu tài khoản ...
                                            </p>
                                            <button 
                                                name="reset"
                                                style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;"
                                            >
                                                &ensp; Xác nhận &ensp;
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.groupPHP.com.vn</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>