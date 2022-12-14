<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Tạo login box đơn giản</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="css/dialog.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="dialog.js"></script>
    </head>
    <body>
        <a href="#login-box" class="login-window button">Đăng nhập</a>
        <div id="login-box" class="login">
            <p class="login_title"> Đăng nhập</p>
            <a href="#" class="close"><img src="close.png" class="img-close" title="Close Window" alt="Close" /></a>
            <form method="post" class="login-content" action="#">
            <label class="username">
            <span>Tên hoặc email</span>
            <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
            </label>
            <label class="password">
            <span>Mật khẩu</span>
            <input id="password" name="password" value="" type="password" placeholder="Password">
            </label>
            <button class="button submit-button" type="button">Đăng nhập</button>
            <p>
            <a class="forgot" href="#">Quên mật khẩu?</a>
            </p>        
            </form>
        </div>
        
        <script>
            $(document).ready(function() {
    $('a.login-window').click(function() {

        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var loginBox = $(this).attr('href');

        //cho hiện hộp đăng nhập trong 300ms
        $(loginBox).fadeIn("slow");

        // thêm phần tử id="over" vào cuối thẻ body
        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);
        
        return false;
    });

    // khi click đóng hộp thoại
    $(document).on('click', "a.close, #over", function() { 
        $('#over, .login').fadeOut(300 , function() {
            $('#over').remove();  
        }); 
        return false;
    });
	
});
        </script>
    </body>
</html>