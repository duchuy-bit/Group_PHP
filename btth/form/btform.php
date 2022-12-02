<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action= "" method= "POST">
        <table align="center">
            <tr>
                <td>
                    Chieu dai : 
                </td>
                <td>
                    <input type= "text" name= "d"
                        value="<?php 
                            if(isset($_POST['reset'])) {
                                echo '';
                                // $_POST['d']="";
                            }
                            else
                                if((isset($_POST['d'])) && (is_numeric($_POST['d']))) echo $_POST['d'];  
                                // else echo 'err';
                        ?>" require
                    ><br>
                </td>
            </tr>
            <tr>
                <td>
                    Chieu rong : 
                </td>
                <td>
                    <input type= "text" name= "r" 
                        value="<?php 
                        if(isset($_POST['reset'])) {
                            echo '';
                            // $_POST['r']="";
                        }
                        else
                        if((isset($_POST['r'])) && (is_numeric($_POST['r']))) echo $_POST['r'];
                        // else echo'er'
                        ?>"
                        require
                    >
                    <!-- <br>
                    <br> -->

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
                    if(isset($_POST['d'])&& ($_POST['r']))   echo (($_POST['d']) + ($_POST['r']))*2; ?>"
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
                        if(isset($_POST['d'])&& ($_POST['r']))   echo (($_POST['d']) * ($_POST['r'])); ?>"
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
                    <input type= "submit" value="Xoa" 
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