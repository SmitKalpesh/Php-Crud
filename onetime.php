<?php
session_start();

include 'connect.php';

$tables = [
            "crud" => "CREATE TABLE crud (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                mobile VARCHAR(15) NOT NULL,
                password VARCHAR(255) NOT NULL
            )",
            
            "auth" => "CREATE TABLE auth (
                username VARCHAR(50) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                type ENUM('ADMIN','MEMBER','MANAGER') NOT NULL
            )",
            
            "crud_details" => "CREATE TABLE crud_details (
                id INT AUTO_INCREMENT PRIMARY KEY,
                userid INT NOT NULL,
                a_no VARCHAR(20) NOT NULL,
                p_no VARCHAR(20) NOT NULL,
                address TEXT NOT NULL,
                bname VARCHAR(100) NOT NULL,
                gst_no VARCHAR(20) NOT NULL,
                FOREIGN KEY (userid) REFERENCES crud(id) ON DELETE CASCADE ON UPDATE CASCADE
            )"
        ];

if(isset($_POST['submit'])){

    $password=$_POST['pass'];
    $username=$_POST['user'];

    if ($userrname || $password===""){
        
        echo '<script>alert("Username or password is null"); window.location.href="onetime.php";</script>';
        die();
    }else{
    $missing=false;

    foreach ($tables as $tableName => $query) {
    
  
        $sql = "SHOW TABLES LIKE '$tableName'";
        $result = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($result) == 0) {
            echo " <h1>Creating Table</h1>";
            if (mysqli_query($con, $query)) {
                echo "Table '$tableName' created successfully!<br>";
            } else {
                $missing = true;
            }
        } 
        else {
            echo "Table '$tableName' already exists.<br>";
        }
    }

    
    $sql_2 = "INSERT INTO `auth` (`username`, `password`, `type`) VALUES ('$username','$password','ADMIN')";

    $result2 = mysqli_query($con,$sql_2);

    if($missing==false){
        header('location:index.php');
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Visit</title>
</head>
<body>
        <form method="post">
            <h1 style="margin-top:20px;">Enter Username And Password<h1>
    
            <label>Username</label>
            <input type="text" id="user" name="user">

            <label>Password</label>
            <input type="password" id="pass" name="pass">   

            <button name="submit">Submit</button>
        </form>
</body>
</html>