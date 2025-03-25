<?php
session_start();
if (!isset($_SESSION['type'])) {
  
  header("Location: index.php");
  exit();
}


include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>Data</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css">


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
</head>
<body>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">

    <li class="breadcrumb-item"><a href="user.php">User</a></li>
    
    <li class="breadcrumb-item" aria-current="page"><a href="index.php">Login</a></li>

    <li class="breadcrumb-item " aria-current="page"><a href="logout.php">Logout</a></li>
  </ol>
</nav>
    <div class="container">
        <button class="btn btn-success my-5 btn-lg"><a href="user.php" class='text-light'>Add User</a>
    </button>
    <table id="example" class="display nowrap" style="width:100%">
  <thead class="thead-dark">
    <tr>
    <th scope="col">USERID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">MOBILE</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">Adhar Number</th>
      <th scope="col">Pan Number</th>
      <th scope="col">Address</th>
      <th scope="col">Business Name</th>
      <th scope="col">Gst Number</th>
      <th scope="col">OPERATION</th>
      
    </tr>
    </tr>
  </thead>
  <tbody>

  <?php

    $sql="SELECT * FROM `crud` INNER JOIN `crud_details` on crud.id=crud_details.userid";
  
    $result=mysqli_query($con,$sql);
    if($result){
        while( $row=mysqli_fetch_assoc($result)){
      
            $name=$row['name'];
            $email=$row['email'];
            $mobile=$row['mobile'];
            $password=$row['password'];
            $userid=$row['userid'];
            $a_no=$row['a_no'];
            $p_no=$row['p_no'];
            $address=$row['address'];
            $bname=$row['bname'];
            $gst_no=$row['gst_no'];
            

            echo '<tr>
      <td>'.$userid.'</td>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>'.$password.'</td> 
      <td>'.$a_no.'</td>
      <td>'.$p_no.'</td>
      <td>'.$address.'</td>
      <td>'.$bname.'</td>
      <td>'.$gst_no.'</td>
     
      <td>
      <button class="btn btn-primary"><a href="update.php?updateId='.$userid.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="delete.php?deletedId='.$userid.'" class="text-light">Delete</a></button>
      </td>
    </tr>';
   
        }
    }

?>
 
  </tbody>
</table>
    </div>
</body>
<script>
new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
            
    </script>
</html>