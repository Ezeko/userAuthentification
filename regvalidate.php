<?php
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 =$_POST['confirmPassword'];
    if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
        if ($password == $password2){
            //check if user exist
            $file = fopen("data.txt", "r");
            $finduser = false;

            while(!feof($file)){
                $line = fgets($file);
                $array = explode(";", $line);
                if(trim($array[1]) == $username){
                    $finduser = true;
                    break;
                }
            }
            fclose($file);

            if ($finduser){
                echo ("$username already registered");
                header("Refresh:4, url=register.html");
            }else{
                $file = fopen("data.txt", "a");
                fputs($file, $fullname.";".$username.";".$email.";". $password."\r\n");
                die("$username REGISTRATION SUCCESSFUL!!!"); 
                header("Refresh:4, url=login.html");
                    }

        }else {
            echo "<script>alert('Password doesn't match'); window.location.replace('register.html');</script>";
        }
    }else{
        echo "<script>alert('Some field(s) is(are) empty!!! Check that you fill the correct details in all the fields'); window.location.replace('register.html');</script>";
    }
    





?>