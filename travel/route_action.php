<?php
$start=$_POST['start'];
$destiny=$_POST['destiny'];
include '../connection.php';  

$sql="insert into route(start,destiny) values ('$start','$destiny')";
mysqli_query($con,$sql);
echo"<script>alert('Added succesfully'); window.location='add_route.php';</script>";
?>