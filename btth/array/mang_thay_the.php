<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="submit"], textarea {
            background-color : #FDFFA7; 
        }
        table {
            border: 1px solid;
            background-color: white;
        }
    </style>
</head>
<body>
<?php

    $arr=array();
    $maxarr=0;
    $minarr=20;
    $sumarr=0;

    function thaythe($arr){
        // $dem = 1;
        $new_s = trim($arr);
        $a = explode(",",$new_s);
        $dem=0;
        $arrTam=array();
        foreach($a as $key){
            if($key != ""){
                if($key === $_POST['find']) {
                    $arrTam[]= $_POST['replace'];
                }
                else {
                    $arrTam[]= $key;
                }
                $dem ++;

            }
        }
        return $arrTam;
    }

    if (isset($_POST['submit']))
    {
        
    }

?>
<form  method= "POST" >
        <table align="center" >
            <tr>
                <td colspan="2" align="center" bgcolor="#A6086D">
                    <h3 style="color: white; margin: 20px;">TIM KIEM</h3>
                </td>
            </tr>

            <tr style="background-color: #FED6F1;">
                <td align="left ">
                    <a style="font-weight: bold;">Nhap Mang : </a>
                </td>
                <td>
                    <input type= "text" name= "n"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['n'];
                        ?>" require><br>
                </td>
            </tr>
            <tr style="background-color: #FED6F1;">
                <td>
                    <a>Gia tri can thay the: </a>
                </td>
                <td   >
                    <input type= "text" name="find" value="<?php
                            if (isset($_POST['submit'])) echo $_POST['find'];
                        ?>" require size="5"
                        style="border-width: 5;border-color: blue">    
                </td>                
            </tr>
            <tr style="background-color: #FED6F1;">
                <td>
                    <a>Gia tri thay the: </a>
                </td>
                <td   >
                    <input type= "text" name="replace" value="<?php
                            if (isset($_POST['submit'])) echo $_POST['replace'];
                        ?>" require size="5"
                        style="border-width: 5;border-color: blue">    
                </td>                
            </tr>

            <tr>
                <td></td>
                <td   >
                    <input type= "submit" name="submit" value="Thay the"
                        style="border-width: 5;border-color: blue;color: 'FFFE9E'">    
                </td>                
            </tr>
            
            <tr >
                <td>
                    <a>Mang cu: </a>
                </td>
                <td   >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                $new_s = trim($_POST['n']);
                                $a = explode(",",$new_s);
                                foreach($a as $key){
                                    if($key !== " "){
                                        echo $key." ";
                                    }
                                }
                            }
                        ?>"readonly
                        style="border-width: 5;border-color: blue;background-color:#FEA3A4 ;">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Mang sau khi thay the: </a>
                </td>
                <td >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                foreach( thaythe($_POST['n']) as $key)
                                echo $key." ";
                            }
                        ?>" readonly
                        style="border-width: 5;border-color: blue;background-color: #FEA3A4;">    
                </td>                
            </tr>
            <tr  style="background-color: #72D1D0;">
                <td colspan="2" align="center">
                    <a>
                        (<span style="font-weight: bold;color: #ff0000">Ghi chu</span>: Cac phan tu trong mang se cach nhau bang dau ",")
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>


</html>