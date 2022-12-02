<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action= "./btth/form/tinhtoanConfig.php">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: pink;">PHEP TINH TREN HAI SO</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 style="color:pink" align="right">Chon phep tinh : </h3>
                </td>
                <td>
                    <input type="radio" name="pheptinh" value="Cong" >
                        <a style="color: pink;">Cong</a>
                    <input type="radio" name="pheptinh" value="Tru" >
                        <a style="color: pink;">Tru</a>
                    <input type="radio" name="pheptinh" value="Nhan" >
                        <a style="color: pink;">Nhan</a>
                    <input type="radio" name="pheptinh" value="Chia" >
                        <a style="color: pink;">Chia</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:pink;font-weight: bold;">So Thu Nhat : </a>
                </td>
                <td>
                    <input type= "text" name= "a" require><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">So Thu Hai : </a> 
                </td>
                <td >
                    <input type= "text" name= "b"    require>
                </td>
            </tr>

            <tr>
                <td></td>
                <td >
                    <input type= "submit" value="Tinh" 
                        style="border-color: pink;">
                </td>                
            </tr>

        </table>
    </form>
</body>
</html>