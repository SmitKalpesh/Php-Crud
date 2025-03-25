<?php

session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $user=$_POST['mail'];
    $pass=$_POST['pass'];
}

$sql="SELECT * FROM `auth` where username='$user' AND  password='$pass' AND (type='ADMIN' OR type='MANAGER')";
$result=mysqli_query($con,$sql);

                                                                        
   $sql1="SELECT * FROM `crud` where email='$user' AND  password='$pass'";;
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