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
    $tongdiem=0.0;
    $kq ="Rot";
    if (isset($_POST['submit'])){
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $diemchuan = $_POST['diemchuan'];

        $tongdiem= ($toan + $ly + $hoa);
        if ($tongdiem >= $diemchuan && $toan >0 && $ly >0 && $hoa >0) $kq="dau";
    }

?>
<form method= "post" >
        <table align="center" style="background-color: pink;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue; margin: 20px;">Xet diem thi Dai Hoc</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <a>toan</a>
                </td>
                <td>
                    <input type= "text" name= "toan" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['toan']
                        ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <a>ly</a>
                </td>
                <td>
                    <input type= "text" name= "ly" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['ly']
                        ?>" required>
                </td>
            </tr>

            <tr>
                <td>
                    <a>hoa</a>
                </td>
                <td>
                    <input type= "text" name= "hoa" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['hoa']
                        ?>" required>
                </td>
            </tr>

            <tr>
                <td>
                    <a>diem chuan</a>
                </td>
                <td>
                    <input type= "text" name= "diemchuan" size="50"
                        value="<?php
                        if(isset($_POST['submit'])) echo $_POST['diemchuan']
                        ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Tong diem</a>
                </td>
                <td>
                    <input type= "text" name= "tongdiem" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $tongdiem
                        ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Ket qua</a>
                </td>
                <td>
                    <input type= "text" name= "kq" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $kq
                        ?>" readonly>
                </td>
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