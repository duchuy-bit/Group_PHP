<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="" method="post"  >
            <table align="center" style="background-color: yellow;">
            <td colspan="2" align="center" style="background-color: orange;">
                    <h1>Hình tròn</h1>
                </td>
                <tr>
                    <td>Bán kính: </td>
                    <td><input type="text" name="bk" 
                    value="<?php if (isset($_POST['submit'])) echo $_POST('bk')
                    ?>" required
                    ></td>
                </tr>
                    <td>Chu vi: </td>
                    <td><input type="text" name="cv" style="background-color: pink;" readonly
                    value="<?php 
                    if (isset($_POST['submit']))
                        echo (2*($_POST['bk'])*(3.14));
                    
                    ?>"
                    ></td>
                </tr>
                <tr>
                    <td>Diện tích: </td>
                    <td><input type="text" name="dt" style="background-color: pink;" readonly
                    value="<?php 
                    if (isset($_POST['submit'])) echo $_POST('bk') ((3.14)*($_POST['bk'])*($_POST['bk']));

                    ?>"
                    ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Tinh">
                        <input type="submit" name="reset" value="Delete">
                    </td>
                </tr>
            
            </table>
        </form>
</body>
</html>