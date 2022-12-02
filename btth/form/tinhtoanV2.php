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
    $err1 = '';
    $err2 = '';
    $loiBig= '';


    // $pheptinh=$_POST['pheptinh'];

    if (isset($_POST['submit'])){
        $a=$_POST['a'];
        $b=$_POST['b'];
        $pheptinh=$_POST['pheptinh'];
        if (isset($a)) 
        {
            if (!is_numeric($a)) {
                $err1 = 'loi';
                $loiBig='Nhap sai';
            }            
        }  
        if (isset($b)) 
        {
            if (!is_numeric($b)) {
                $err2='loi';
                $loiBig='Nhap sai';
            }
        }  
        if (($pheptinh === 'Chia')&& ($b === '0')){
            $loiBig = 'Sai';
        }
    }  
?>

<form 
    action= "./btth/form/tinhtoanConfig.php"
    method= "POST">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue;">PHEP TINH TREN HAI SO</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 style="color:brown" align="right">Chon phep tinh : </h3>
                </td>
                <td>
                    <input type="radio" name="pheptinh" value="Cong"  checked>
                        <a style="color: red;">Cong</a>
                    <input type="radio" name="pheptinh" value="Tru" >
                        <a style="color: red;">Tru</a>
                    <input type="radio" name="pheptinh" value="Nhan" >
                        <a style="color: red;">Nhan</a>
                    <input type="radio" name="pheptinh" value="Chia" >
                        <a style="color: red;">Chia</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">So Thu Nhat : </a>
                </td>
                <td>
                    <input type= "text" name= "a"
                        value="<?php
                            if (isset($err1)) echo $err1;
                        ?>" require><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">So Thu Hai : </a> 
                </td>
                <td >
                    <input type= "text" name= "b" 
                        value="<?php
                            if (isset($err2)) echo $err2;
                        ?>"   require>
                </td>
            </tr>

            <tr>
                <td></td>
                <td >
                    <input type= "submit" name='submit' value="Tinh" 
                        style="border-width: 5;border-color: blue;">
                </td>                
            </tr>

        </table>
    </form>
</body>



</html>