<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="submit"], textarea {
            background-color : #90CEFB; 
        }
        table {
            border: 1px solid;
            background-color: #D1DED4;
        }
    </style>
</head>
<body>
<?php

    $arr=array();
    $maxarr=0;
    $minarr=20;
    $sumarr=0;

    function timkiem($arr){
        // $dem = 1;
        $new_s = trim($arr);
        $a = explode(",",$new_s);
        $dem=0;
        foreach($a as $key){
            if($key != ""){
                if($key === $_POST['find']) return $dem;
                $dem ++;

            }
        }
        return -1;
    }

    if (isset($_POST['submit']))
    {
        
    }

?>
<form  method= "POST" >
        <table align="center" >
            <tr>
                <td colspan="2" align="center" bgcolor="#33999A">
                    <h3 style="color: white; margin: 20px;">TIM KIEM</h3>
                </td>
            </tr>

            <tr >
                <td align="left ">
                    <a style="color:blue;font-weight: bold;">Nhap Mang : </a>
                </td>
                <td>
                    <input type= "text" name= "n"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['n'];
                        ?>" require><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a>So can tim: </a>
                </td>
                <td   >
                    <input type= "text" name="find" value="<?php
                            if (isset($_POST['submit'])) echo $_POST['find'];
                        ?>" require size="5"
                        style="border-width: 5;border-color: blue">    
                </td>                
            </tr>

            <tr>
                <td></td>
                <td   >
                    <input type= "submit" name="submit" value="Tim Kiem"
                        style="border-width: 5;border-color: blue;color: 'FFFE9E'">    
                </td>                
            </tr>
            
            <tr >
                <td>
                    <a>Mang: </a>
                </td>
                <td   >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                echo $_POST['n'];
                            }
                        ?>"readonly
                        style="border-width: 5;border-color: blue">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Ket qua tim kiem: </a>
                </td>
                <td >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                if (timkiem($_POST['n'])===-1) echo 'Khong tim thay';
                                else{
                                    echo "Tim thay ".$_POST['find']." tai vi tri thu ".timkiem($_POST['n'])." cua mang";
                                }
                            }
                        ?>" readonly
                        style="color: red;border-width: 5;border-color: blue;background-color: #CCFCFD;">    
                </td>                
            </tr>
            <tr  style="background-color: #72D1D0;">
                <td colspan="2" align="center">
                    <a>
                        (Cac phan tu trong mang se cach nhau bang dau ",")
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>


</html>