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
            $findemail = false;
            
            while(!feof($file)){
                $line = fgets($file);
                $array = explode(";", $line);
                
                //initializing array
                if(!isset($array[1])){
                    $array[1]="";
                }
                if(!isset($array[2])){
                    $array[2]="";
                }
                
                
                if(trim($array[1]) == $username){
                    $finduser = true;
                    break;
                }
                if(trim($array[2]) == $email){
                    $findemail = true;
                    break;
                }
            }
            fclose($file);

            if ($finduser){
                    header("Refresh:4, url=register.html");
                echo (" User: $username already registered");
            }else if($findemail){
                    header("Refresh:4, url=register.html");
                echo (" Email: $email already registered");
            }else{
                $file = fopen("data.txt", "a");
                fputs($file, $fullname.";".$username.";".$email.";". $password."\r\n");
                header("Refresh:4, url=login.html");
                $user = strtoupper($username);
                die(" User: $user REGISTRATION SUCCESSFUL!!!"); 
        
                    }

        }else {
            
            header("Refresh:4, url=register.html");
            die("Password doesn't match");
        }
    }else{
        header("Refresh:3, url=register.html");
        die("Some field(s) is(are) empty!!! Check that you fill the correct details in all the fields");
    }
    





?>
