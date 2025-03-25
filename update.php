<?php
session_start();
if (!isset($_SESSION['type'])) {
  
  header("Location: index.php");
  exit();
}
include 'connect.php';
$id=$_GET['updateId'];

$fetch_data="select * from `crud` INNER JOIN `crud_details` on crud.id=crud_details.userid where crud.id=$id" ;

$result_fetch=mysqli_query($con,$fetch_data);

$row=mysqli_fetch_assoc($result_fetch);



if(isset($_POST['submit'])){
  

    $name = !empty($_POST['name']) ? $_POST['name'] : $row['name'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $row['email'];
    $mobile = !empty($_POST['mobile']) ? $_POST['mobile'] : $row['mobile'];
    $password = !empty($_POST['password']) ? $_POST['password'] : $row['password'];
    $ano = !empty($_POST['ano']) ? $_POST['ano'] : $row['a_no'];
    $pno = !empty($_POST['pno']) ? $_POST['pno'] : $row['p_no'];
    $address = !empty($_POST['address']) ? $_POST['address'] : $row['address'];
    $bname = !empty($_POST['bname']) ? $_POST['bname'] : $row['bname'];
    $gstno = !empty($_POST['gstno']) ? $_POST['gstno'] : $row['gst_no'];

    
   
    $sql="update `crud` set name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";
    $result=mysqli_query($con, $sql);

    
    if($result){
      
        $sql_1="update `crud_details` set a_no='$ano',p_no='$pno',address='$address',bname='$bname',gst_no='$gstno' where userid=$id";
        $result_1=mysqli_query($con,$sql_1);

        if($result_1){
            echo "Data updated successfully";
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

    <title>Update</title>
  </head>
  <body>

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item " aria-current="page"><a href="display.php">Display</a></li>
  </ol>
</nav>

<h1 style="text-align:center">Update Details</h1>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name"> 
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email"> 
  </div>

  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" name="mobile"> 
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password"> 
  </div>

  <div class="form-group">
    <label>Adhar Number</label>
    <input type="text" class="form-control" name="ano"> 
  </div>

  <div class="form-group">
    <label>Pan Number</label>
    <input type="text" class="form-control" name="pno"> 
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address"> 
  </div>

  <div class="form-group">
    <label>Business Name</label>
    <input type="text" class="form-control" name="bname"> 
  </div>

  <div class="form-group">
    <label>Gst Number</label>
    <input type="text" class="form-control" name="gstno"> 
  </div>
 
  <button name="submit" class="btn btn-warning btn-lg">Update</button>
 
</form>
    </div>

  </body>
</html>