<?php
 session_start();
include 'connect.php';


 $raw = file_get_contents('php://input');
 $data = json_decode($raw, true);
 
 if ($data) {
     $_SESSION['username'] = $data['username'];
     $_SESSION['password'] = $data['password'];
     

 }



 
$sql="SELECT * FROM `auth` where username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}' AND (type='ADMIN' OR type='MANAGER')";
$result=mysqli_query($con,$sql);

                                                                        
   $sql1="SELECT * FROM `crud` where email='{$_SESSION['username']}' AND  password='{$_SESSION['password']}'";;
   $result1=mysqli_query($con,$sql1);

  

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['type'] = $row['type'];
        header('location:display.php');
       
        exit();

    }
    elseif(mysqli_num_rows($result1)==1){
       
        $row=mysqli_fetch_assoc($result1);
        $_SESSION['mail']=$row['email'];
        
        header('location:user_data.php');
        exit();
    } 
        else{
            header('location:index.php');
            exit();
        }    

?>