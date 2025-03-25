<?php
session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'ADMIN') {
    die("Unauthorized access!");
}
include 'connect.php';

$query = "SELECT MAX(id) as last_id FROM `crud`";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$last_id = $row['last_id'] ?? 0;
for ($i = $last_id+1; $i <= 100 + $last_id; $i++) {
    

    $name = "user" . $i;
    $email = "user" . $i."@gmail.com";
    $mobile = $i;
    $password = "user".$i;
    $ano = $i;
    $pno = $i;
    $address = "address".$i;
    $bname = "user" . $i;
    $gstno = "user" . $i;
    $uid=$i;

    
    $sql="INSERT INTO `crud` (`name`, email, mobile,`password`) 
          VALUES('$name','$email','$mobile','$password')";
    $result=mysqli_query($con, $sql);




    $sql_1="INSERT INTO `crud_details` (a_no, p_no, `address`, bname, gst_no,userid) 
            VALUES ('$ano', '$pno', '$address', '$bname', '$gstno','$uid')";
    $result_1=mysqli_query($con,$sql_1); 

    
}

header('Location: display.php');
exit();

?>



