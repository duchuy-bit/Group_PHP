<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="submit"], textarea {
            background-color : #FFFFA1; 
        }
        table {
            border: 1px solid;
        }
    </style>
</head>
<body>
<?php

    $arr=array();
    $maxarr=0;
    $minarr=20;
    $sumarr=0;

    if (isset($_POST['submit']))
    {
        // echo"sibmit";
        $n = $_POST['n'];
        // echo $n;
        for ($i=0;$i<$n;$i++)
        {
            $arr[$i]= rand(0,20);

            echo $arr[$i]," ";
            if ($arr[$i] > $maxarr) $maxarr= $arr[$i];
            if ($arr[$i] < $minarr) $minarr= $arr[$i];
            $sumarr= $sumarr + $arr[$i];
        }
        echo $minarr;
    }

?>
<form  method= "POST" >
        <table align="center" >
            <tr>
                <td colspan="2" align="center" bgcolor="A70E74">
                    <h3 style="color: white; margin: 20px;">PHAT SINH MANG VA TINH TOAN</h3>
                </td>
            </tr>

            <tr  style="background-color: pink;">
                <td align="left ">
                    <a style="color:blue;font-weight: bold;">Nhap so phan tu : </a>
                </td>
                <td>
                    <input type= "text" name= "n"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['n'];
                        ?>" require><br>
                </td>
            </tr>

            <tr  style="background-color: pink;">
                <td></td>
                <td   >
                    <input type= "submit" name="submit" value="Phat sinh va tinh toan"
                        style="border-width: 5;border-color: blue;color: 'FFFE9E'">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Mang: </a>
                </td>
                <td   >
                    <input type= "text" name="arr" value="<?php
                            if(isset($_POST['submit'])) {
                                foreach($arr as $key){
                                    echo $key." ";
                                }
                            }
                        ?>" readonly
                        style="border-width: 5;border-color: blue;background-color: #FFA6A7;">    
                </td>                
            </tr>
            <tr >
                <td>
                    <a>GTLN(MAX) trong mang: </a>
                </td>
                <td   >
                    <input type= "text" name="maxarr" value="<?php
                            if(isset($_POST['submit'])) echo $maxarr;
                        ?>" readonly
                        style="border-width: 5;border-color: blue;background-color: #FFA6A7;">    
                </td>                
            </tr>
            <tr >
                <td>
                    <a>GTNN(MIN) trong mang: </a>
                </td>
                <td   >
                    <input type= "text" name="minarr" value="<?php
                            if(isset($_POST['submit'])) echo $minarr;
                        ?>"readonly
                        style="border-width: 5;border-color: blue;background-color: #FFA6A7;">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Tong mang: </a>
                </td>
                <td  >
                    <input type= "text" name="sumarr" value="<?php
                            if(isset($_POST['submit'])) echo $sumarr;
                        ?>" readonly
                        style="border-width: 5;border-color: blue;background-color: #FFA6A7;">    
                </td>                
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a>
                        (
                        <span style="font-weight: bold;color: #ff0000">Ghi chu</span>
                        : cac phan tu trong mang se cos gia tri tu 0 den 20)
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>


</html>