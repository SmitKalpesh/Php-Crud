<?php
session_start();
include 'connect.php';

$tables=['crud','crud_details','auth'];

foreach ($tables as $tableName){
    $sql = "SHOW TABLES LIKE '$tableName'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0){
        header('location:onetime.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <form>
    <div class="main">
        <h1 class="head">Hello</h1>
        <div class="user">
            <label>Email</label>
            <input type="text" id="user" name="mail">
        </div>
        <div  class="user">
            <label>Password</label>
            <input type="password" id="pass" name="pass">
        </div>

        <div>
            <button id="button" type="button">Login</button>
        </div>
    </div>
    </form>
</body>

<script>
    document.getElementById('button').addEventListener('click', async (e) => {
      e.preventDefault();
      const username = document.getElementById('user').value;
      const password = document.getElementById('pass').value;
    
   


      console.log('Sending:', username, password);

      await fetch('http://localhost/crud/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password})
      });

       window.location.href = "http://localhost/crud/login.php";
    
});


  </script>
</html>