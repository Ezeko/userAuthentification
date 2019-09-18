<?php session_start(); 

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['username']) && isset($_POST['password'])){
    $file = fopen('data.txt', 'r');
    $good = false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";", $line);
        if(trim($array[3])==$_POST['password']){
            if($_POST['username'] == trim($array[1])){

                $good= true;
                break;
            }else{
                echo "INVALID USERNAME";
                    header("Refesh:2, url=login.html");
   
            }
            if($_POST['username'] == trim($array[2])){
            $good= true;
            break;
            }else{
                echo "INVALID EMAIL";
                    header("Refesh:2, url=login.html");
   
            }
        }
    }
    
    if ($good){
        $_SESSION['user'] = $username;
        echo "WELCOME $array[1] \n <a href='logout.php>Logout</a>";
    }else{
        echo "INCORRECT PASSWORD";
        header("Refesh:2, url=login.html");
    }
    fclose($file);
}else{
    echo " Details not filled";
}




?>