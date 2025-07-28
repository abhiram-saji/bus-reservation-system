<?php
include '../connection.php';
$t_id=$_GET['t_id'];
$str="update login set user_status='approved' where login_id='$t_id'";
mysqli_query($con,$str);
echo"<script>alert('approvel succesfull'); window.location='index.php';</script>";
?>