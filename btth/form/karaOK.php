<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $kq =0.0;
    $err ="";

    if (isset($_POST['submit'])){
        $bd = $_POST['bd'];
        $kt = $_POST['kt'];

        if ($bd >= $kt) $err = "Gio ket thuc > Gio bat dau";
        else {
            if ($bd <17 && $kt<=17) $kq=($kt- $bd) *20000;
            if ($bd <=17 && $kt>=17) $kq=(17- $bd)*20000 + ($kt- 17) * 45000;
            if ($bd >=17 && $kt>17) $kq=($kt- $bd) *45000;
        }
        
    }

?>
<form method= "post" >
        <table align="center" style="background-color: pink;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue; margin: 20px;">Tinh Toan KaraOKLA</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Gio bat dau</a>
                </td>
                <td>
                    <input type= "text" name= "bd" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['bd']
                        ?>" required>
                </td>
                <td><a>(h)</a></td>
            </tr>
            <tr>
                <td>
                    <a>Gio ket thuc</a>
                </td>
                <td>
                    <input type= "text" name= "kt" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['kt']
                        ?>" required>
                </td>
                <td><a>(h)</a></td>
            </tr>

            <tr>
                <td>
                    <a>Tien thanh toan</a>
                </td>
                <td>
                    <input type= "text" name= "kq" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $kq
                        ?>" readonly>
                </td>
                <td><a>(VND)</a></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Tinh">
                </td>
            </tr>

        </table>
    </form>
</body>


</html>