<?php
include '../connection.php';
$t_id=$_GET['t_id'];
$str="update login set user_status='cancel' where login_id='$t_id'";
mysqli_query($con,$str);
echo"<script>alert('canceled succesfull'); window.location='index.php';</script>";
?>