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
    $kq=0;
    if (isset($_POST['submit']))
    {
        $csmoi = $_POST['csmoi'];
        $cscu = $_POST['cscu'];
        $dongia = $_POST['dongia'];
        // $csmoi = $_POST['csmoi'];
        $kq= ($csmoi - $cscu)*$dongia ;
    }
?>
<form method= "POST" >
        <table align="center" style="background-color: pink;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue; margin: 20px;">THANH TOAN TIEN DIEN</h1>
                </td>
            </tr>
            <tr>
                <td align="left ">
                    <a style="color:blue;font-weight: bold;">Tên chu ho : </a>
                </td>
                <td>
                    <input type= "text" name= "ten" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['ten']
                        ?>" require>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Chi so cu</a>
                </td>
                <td>
                    <input type= "text" name= "cscu" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['cscu']
                        ?>" require>
                </td>
            </tr>

            <tr>
                <td>
                    <a>Chi so moi</a>
                </td>
                <td>
                    <input type= "text" name= "csmoi" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['csmoi']
                        ?>" require>
                </td>
            </tr>

            <tr>
                <td>
                    <a>Don gia</a>
                </td>
                <td>
                    <input type= "text" name= "dongia" size="50"
                        value="200000" require>
                </td>
            </tr>
            <tr>
                <td>
                    <a>So tien thanh toan</a>
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