<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="./btth/form/bt8confirm.php"method= "POST">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: blue;">Enter Your Information</h1>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Full name : </a>
                </td>
                <td>
                    <input type= "text" name= "fullname"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Address : </a>
                </td>
                <td>
                    <input type= "text" name= "address"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Phone : </a>
                </td>
                <td>
                    <input type= "text" name= "phone"
                        value="<?php
                        ?>" required><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Gender : </a>
                </td>
                <td>
                    <input type="radio" name="gender" value="Nam"  checked>
                        <a style="color: red;">Nam</a>
                    <input type="radio" name="gender" value="Nu" >
                        <a style="color: red;">Nu</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Country : </a>
                </td>
                <td>
                <select name="country" id="cars">
                    <option value="Việt Nam" >Việt Nam</option>
                    <option value="Nhật Bổn">Nhật Bổn</option>
                    <option value="Tung Của">Tung Của</option>
                    <option value="Mỹ Tho">Mỹ Tho</option>
                </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Study : </a>
                </td>
                <td>
                    <input type="checkbox" name="study[]" value="PHP & MySQL" >
                        <a style="color: red;">PHP & MySQL</a>
                    <input type="checkbox" name="study[]" value="ASP.NET" >
                        <a style="color: red;">ASP.NET</a>
                    <input type="checkbox" name="study[]" value="CCNA" >
                        <a style="color: red;">CCNA</a>
                    <input type="checkbox" name="study[]" value="SERCURITY+" >
                        <a style="color: red;">SERCURITY+</a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a style="color:blue;font-weight: bold;">Note : </a>
                </td>
                <td>
                    <textarea type= "text" name= "note" required >
                    </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td >
                    <input type= "submit" name='submit' value="Gui" 
                        style="border-width: 5;border-color: blue;">
                    <input type= "reset" name='reset' value="Huy" 
                        style="border-width: 5;border-color: blue;">
                </td>                
            </tr>

        </table>
    </form>
</body>



</html>