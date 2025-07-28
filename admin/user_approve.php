<?php
include '../connection.php';
$user_id=$_GET["user_id"];
$str="update login set user_status='Approved' where login_id='$user_id'";
mysqli_query($con,$str);
echo "<script>alert('Request Approved');window.location='manage_user.php'</script>";
?>