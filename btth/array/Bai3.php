<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2-Bai3</title>
</head>
<body>
<?php
    function min_arr($arr){
        $min = $arr[0];
        foreach ($arr as $value) {
            if($value < $min) $min = $value;
        }
        return $min;
    }

    function max_arr($arr){
        $max = $arr[0];
        foreach ($arr as $value) {
            if($value > $max) $max = $value;
        }
        return $max;
    }

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
        $n = $_POST['so'];
        if(is_numeric($n)){
            $arr = array();
            for($i=0; $i<$n; $i++){
                $arr[$i]=rand(0,20);
            }
            $kq=implode(" ", $arr);
        }
        else echo $n = "phai la so";

        $mina = min_arr($arr);
        $maxa =  max_arr($arr);
        $suma = sum_arr($arr);
    }
?>
    <form action="Bai3.php" method="post">
        <table align="center" bgcolor="pink">
            <tr>
                <td bgcolor="orange" colspan="2"><h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1></td>
            </tr>
            <tr>
                <td>Nhập số phần tử:</td>
                <td><input type = "text" name = "so" value="<?php if (isset($n)) echo $n;?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" name = "submit" value = "Phát sinh và tính toán">
                </td>
            </tr>
            <tr>
                <td>Mảng được tạo thành là:</td>
                <td>
                    <textarea name="" id="mang" cols="25" rows="1" disabled><?php if(isset($kq)) echo $kq?></textarea>
                </td>
            </tr>
            <tr>
                <td>Min:</td>
                <td><input type = "text" name = "gtnn" value="<?php if (isset($mina)) echo $mina;?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Max:</td>
                <td><input type = "text" name = "gtln" value="<?php if (isset($maxa)) echo $maxa;?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type = "text" name = "tongmang" value="<?php if (isset($suma)) echo $suma;?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="pink" colspan="2">(<span style="color:red;">Ghi chú: </span>Các phần tử trong mảng có giá trị từ 0-20)</td>
            </tr>
        </table>
    </form>
</body>
</html>