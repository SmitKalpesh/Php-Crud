<?php

session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $ano=$_POST['ano'];
    $pno=$_POST['pno'];
    $address=$_POST['address'];
    $bname=$_POST['bname'];
    $gstno=$_POST['gstno'];

   
    $sql="INSERT INTO `crud` (`name`, email, mobile,`password`) 
          VALUES('$name','$email','$mobile','$password')";
    $result=mysqli_query($con, $sql);

    $uid = mysqli_insert_id($con);  
    
    if($result){
      
        $sql_1="INSERT INTO `crud_details` (a_no, p_no, `address`, bname, gst_no,userid) 
                VALUES ('$ano', '$pno', '$address', '$bname', '$gstno','$uid')";
        $result_1=mysqli_query($con,$sql_1);

        if($result_1){
            echo "Data inserted successfully";
        } else {
            echo "Error in crud_details: " . mysqli_error($con);
        }
    } else {
        echo "Error in Crud: " . mysqli_error($con);
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <title>Crud Operation</title>
  </head>
  <body>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">

  <li class="breadcrumb-item" aria-current="page"><a href="index.php">Login</a></li>
  <li class="breadcrumb-item " aria-current="page"><a href="display.php">Display</a></li>
  <li class="breadcrumb-item " aria-current="page"><a href="logout.php">Logout</a></li>
    
    
  </ol>
</nav>

<h1 style="text-align:center">Enter Details</h1>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" required> 
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" required> 
  </div>

  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" name="mobile" required> 
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" required> 
  </div>

  <div class="form-group">
    <label>Adhar Number</label>
    <input type="text" class="form-control" name="ano" required> 
  </div>

  <div class="form-group">
    <label>Pan Number</label>
    <input type="text" class="form-control" name="pno" required> 
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" required> 
  </div>

  <div class="form-group">
    <label>Business Name</label>
    <input type="text" class="form-control" name="bname" required> 
  </div>

  <div class="form-group">
    <label>Gst Number</label>
    <input type="text" class="form-control" name="gstno" required> 
  </div>
 
  <button name="submit" class="btn btn-primary">Submit</button>
  <?php


if (isset($_SESSION['type']) && $_SESSION['type'] === 'ADMIN') {
  echo '<button class="btn btn-warning" onclick="window.location.href=\'randomGenerator.php\'">Add Random Users</button>';

}
?>

</form>
    </div>

  </body>
 
</html>