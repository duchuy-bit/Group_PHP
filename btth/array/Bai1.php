<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2-Bai1</title>
</head>
<body>
<?php
    
?>
    <form action="Bai1.php" method="post">
        <table align="center" bgcolor="pink">
            <!-- <tr>
                <td bgcolor="orange" colspan="2"><h1>DIỆN TÍCH và CHU VI HÌNH TRÒN</h1></td>
            </tr> -->
            <tr>
                <td>Nhập n:</td>
                <td><input type = "text" name = "so" value="<?php if (isset($_POST['so'])) echo $_POST['so'];?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <textarea align="left" name="" id="mang" cols="25" rows="10" disabled>
                        <?php
                        $arr = array();
                            if (isset($_POST['so']) and is_numeric($_POST['so']) and $_POST['so']>0){
                                $arr = array();
                                echo "Mảng: ";
                                for($i = 0; $i<$_POST['so']; $i++)
                                {
                                    $arr[$i] = rand(-100,100);
                                    echo $arr[$i] . " ";
                                }

                                echo " Phần tử chẵn: ";
                                foreach ($arr as $value) {
                                    if($value%2 == 0 && $value>0)
                                        echo $value . " ";
                                }

                                echo " Phần tử nhỏ hơn 100: ";
                                foreach ($arr as $value) {
                                    if($value<100)
                                        echo $value . " ";
                                }
                                
                                echo " Tổng phần tử số âm: ";
                                $kq = 0;
                                foreach ($arr as $value) {
                                    if($value<0)
                                        $kq = $kq + $value;
                                }
                                echo $kq;

                                echo " Vị trí phần tử bằng 0: ";
                                for($i = 0; $i<$_POST['so']; $i++)
                                {
                                    foreach ($arr as $value) {
                                        if($value == 0)
                                            echo $i;
                                    }
                                }

                                echo " Mảng đã sắp xếp: ";
                                $tam = 0;
                                for($i = 0; $i < $_POST['so']-1; $i++){
                                    for($j = $i + 1; $j < $_POST['so']; $j++){
                                        if($arr[$i] > $arr[$j]){
                                            $tam = $arr[$i];
                                            $arr[$i] = $arr[$j];
                                            $arr[$j] = $tam;        
                                        }
                                    }
                                }
                                for($i = 0; $i<$_POST['so']; $i++)
                                {
                                    echo $arr[$i] . " ";
                                }
                            }
                            else
                            {
                                if(!isset($_POST['so'])) echo "";
                                else echo "n không phải là số nguyên dương";
                            }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Thực hiện">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>