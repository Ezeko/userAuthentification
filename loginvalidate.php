<?php session_start(); 

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['username']) && isset($_POST['password'])){
    $file = fopen('data.txt', 'r');
    $good = false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
        if(!isset($array[3])){
                $array[3]="";
        }
        if(trim($array[3])==($_POST["password"])){
        
            if($_POST["username"] == trim($array[1])){

                $good= true;
                break;
            }else{
                header("Refresh:2, url=login.html");
                 die("INVALID USERNAME");
                
   
            }
            if($_POST['username'] == trim($array[2])){
            $good= true;
            break;
            }else{
                
                header("Refresh:2, url=login.html");
                 die("INVALID EMAIL");
   
            }
        }
    }
    
    if ($good){
        $_SESSION['user'] = $username;
        echo "WELCOME $array[0], \n USERNAME : $array[1] \n EMAIL: $array[2] ";
        echo"<a href='logout.php'>Logout</a>";
    }else{
        header("Refresh:2, url=login.html");
        die("INCORRECT PASSWORD");
        
    }
    fclose($file);
}else{
    echo " Details not filled";
}




?>
