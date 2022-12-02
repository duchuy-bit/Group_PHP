<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* input[type="submit"], textarea { */
            /* background-color : #90CEFB;  */
        /* } */
        table {
            border: 1px solid;
            background-color: #D1DED4;
            width: 30%;
        }
    </style>
</head>
<body>
<?php

$hangchi  = array(   "Hợi",   "Tý",    "Sửu",    "Dần",    "Mão",    "Thìn",    "Tị",    "Ngọ",    "Mùi",    "Thân",    "Dậu",    "Tuất");
//mảng các hàng can
$hangcan    = array(       "Quý",    "Giáp",    "Ất",    "Bính",    "Đinh",    "Mậu",    "Kỷ", "Canh",    "Tân",    "Nhâm");

$pic = array(
    "../../btth/array/images/hoi.jpg",
    "../../btth/array/images/ti.jpg",
    "../../btth/array/images/suu.jpg",
    "../../btth/array/images/dan.jpg",
    "../../btth/array/images/mao.jpg",
    "../../btth/array/images/thin.jpg",
    "../../btth/array/images/ty.jpg",
    "../../btth/array/images/ngo.jpg",
    "../../btth/array/images/mui.jpg",
    "../../btth/array/images/than.jpg",
    "../../btth/array/images/dau.jpg",
    "../../btth/array/images/tuat.jpg",
);

    $can=0;
    $chi=0;
    if (isset($_POST['submit'])){
        $n= $_POST['nam'];
        $n =$n - 3;
        echo $n;
        $can= $n % 10;
        $chi = $n % 12;
    }

    
?>
<!-- <img src= ""> -->
<form  method= "POST" >
        <table align="center" >
            <tr>
                <td colspan="3" align="center" bgcolor="#33999A">
                    <h3 style="color: white; margin: 20px;">TIM KIEM</h3>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <a>Nam duong lich </a>
                </td>
                <td></td>
                <td align="center">
                    <a>Nam am lich</a>
                </td>
            </tr>
            <tr >
                <td align="center">
                    <input type= "text" name= "nam" size="5"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['nam'];
                        ?>" require><br>
                    
                </td>
                <td align="center">
                    <input type= "submit" name="submit" value="=>"
                        style="border-width: 5;border-color: blue;color: 'FFFE9E'">
                </td>
                <td align="center">
                    <input type= "text" name="" size="6" readonly
                    value="<?php
                        if (isset($_POST['submit'])){
                            echo $hangcan[$can]." ".$hangchi[$chi];
                        }
                    ?>"
                        style="border-width: 5;border-color: blue ;background-color: pink ;">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <img src="<?php
                        echo $pic[$chi];
                    ?>" width="200" height="200">
                </td>
            </tr>
            
        </table>
    </form>
</body>

</html>