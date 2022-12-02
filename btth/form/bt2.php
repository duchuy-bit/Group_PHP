<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action= "" method= "POST" >
        <table align="center" style="background-color: pink; padding: '40';">
            <tr>
                <td>
                    Ban kinh : 
                </td>
                <td>
                    <input type= "text" name= "d"
                        value="<?php 
                        $r =isset($_POST['d']) ? $_POST['d'] : 0 ;
                        // if ( isset($_POST['d'])){
                            // if ( is_numeric($_POST['d']))  $r= $_POST['d'];
                        // }
                        // if ( is_numeric($_POST['d']))  $r= $_POST['d']; 
                        
                        // else $r='err';
                        echo $r;
                            // if(is_numeric($_POST["d"])) {
                            //     echo "la so";
                            // }else{ 
                            //     echo "khong phai so";
                            // }
                            // if (isset($_POST['d'])) echo $_POST['d'];
                            // else 
                                // if (is_numeric($_POST['d'])) echo $_POST['d'];
                                // else echo'loi';
                            // else{
                            //     if(isset($_POST['d'])){ 
                            //         echo $_POST['d'];
                            //     }
                            //     else{
                            //         if(is_numeric($_POST['d'])) {
                            //             echo 'Nhap so';                                    
                            //         }else echo $_POST['d'];
                            //     }
                            // }
                        ?>" >
                        <!-- <br> -->
                </td>
            </tr>

            <tr>
                <td>
                    Chu vi: 
                </td>
                <td>
                    <input type= "text" name= "cv" readonly
                    value="<?php 
                    if(isset($_POST['reset'])) echo '';
                    else
                    if(isset($_POST['d']))   echo (($_POST['d'])*2*3.14); ?>"
                    >
                    <!-- <br>
                    <br> -->

                </td>
            </tr>

            <tr>
                <td>
                    Dien tich : 
                </td>
                <td>
                    <input type= "text" name= "dt" readonly
                        value="<?php 
                        if(isset($_POST['reset'])) echo '';
                        else
                        if(isset($_POST['d']))   echo (($_POST['d'])*($_POST['d'])*3.14); ?>"
                    >
                    <!-- <br>
                    <br> -->

                </td>
            </tr>

            <tr>
                <!-- <td>

                </td> -->
                <td colspan="2" align="center">
                    <input type= "submit" value="Tinh" 
                        style="background-color: pink;"
                        
                    >
                    <input type= "submit" value="Reset" 
                        style="background-color: pink;"
                        name="reset"
                    >
                </td>
                
                
            </tr>
            <!-- Full name: <input type= "text" name= "name"> 
            User name: <input type= "text" name= "user"> 
            <br><br>
            Email: <input type= "text" name= "email"> 
            Phone: <input type= "text" name= "phone"> 
            <br><br>
            Password: <input type= "text" name= "pass"> 
            Confirm Password: <input type= "text" name= "confpass"> 
            <br><br>
            Sexy : <br >
            <input type= "radio" name= "sex" value= "nam "> Yé<br>
            <input type= "radio" name= "sex" value= "nu"  > Nô<br>
            <input type= "radio" name= "sex" value= "nu"  > Not Set<br> -->

            <!-- <br><br> -->

            <!-- <input type= "submit" value="Register"> -->

        </table>
    </form>
</body>
</html>