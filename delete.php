<?php
include 'connect.php';

if (isset($_GET['deletedId'])) {
    $id = $_GET['deletedId'];

   
    $sql1 = $sql = "DELETE FROM `crud` WHERE id = $id";
    $result = mysqli_query($con, $sql);
    

    if ($result) {
        header('location:display.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
