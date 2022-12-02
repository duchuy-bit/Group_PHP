<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* input[type="submit"], textarea { */
            /* background-color : #90CEFB;  */
        /* } */
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

    function sx($arr, $check){
        // $dem = 1;
        $new_s = trim($arr);
        $a = explode(",",$new_s);
        $dem=0;
        $arrTam=array();
        foreach($a as $key){
            if($key != ""){
                $arrTam[]= $key;
            }
        }
        $a= $arrTam;
        for ($i=0 ; $i < count($arrTam) ; $i++)
                for ($j=$i+1 ; $j < count($arrTam) ; $j++)
                {
                    if ($check === true){
                        if ($a[$i] > $a[$j]){
                            $t = $a[$i];
                            $a[$i] = $a[$j];
                            $a[$j] = $t;
                        }
                    }
                    else 
                    {
                        if ($a[$i] < $a[$j]){
                            $t = $a[$i];
                            $a[$i] = $a[$j];
                            $a[$j] = $t;
                        }
                    }
                }
                


        return $a;
    }

?>
<form  method= "POST" >
        <table align="center" >
            <tr>
                <td colspan="3" align="center" bgcolor="#33999A">
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
                <td>
                <a style="color: red;">(*)  </a>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td   >
                    <input type= "submit" name="submit" value="Sap xep tang/giam"
                        style="border-width: 5;border-color: blue;">    
                </td>                
            </tr>
            <tr>
                <td colspan="2">
                    <a style="font-weight: bold; color: red;">Sau khi sap xep </a>
                </td>
            </tr>
            
            <tr >
                <td>
                    <a>Tang dan: </a>
                </td>
                <td   >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                foreach(sx($_POST['n'],false) as $key) echo $key." ";
                            }
                        ?>"readonly
                        style="border-width: 5;border-color: blue;background-color: #CCFCFD;">    
                </td>                
            </tr>
            <tr>
                <td>
                    <a>Giam dan: </a>
                </td>
                <td >
                    <input type= "text" name="" value="<?php
                            if(isset($_POST['submit'])) {
                                foreach(sx($_POST['n'],true) as $key) echo $key." ";
                            }
                        ?>" readonly
                        style="border-width: 5;border-color: blue;background-color: #CCFCFD;">    
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