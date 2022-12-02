<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2-Bai2</title>
</head>
<body>
<?php
    function sum_arr($arr){
        $sum = 0;
        foreach ($arr as $value) {
            $sum = $sum + $value;
        }
        return $sum;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['dayso'];

        $arr = explode(',', $n);
        $sum = sum_arr($arr);
    }
?>
    <form action="Bai2.php" method="post">
        <table align="center" bgcolor="skyblue">
            <tr>
                <td bgcolor="blue" colspan="2"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type = "text" name = "dayso" value="<?php if (isset($n)) echo $n;?>"><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" name = "submit" value = "Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type = "text" style="color:red;" name = "tongmang" value="<?php if (isset($sum)) echo $sum;?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;">(*) </span>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>