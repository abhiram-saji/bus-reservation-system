<?php
$place=$_POST['place'];
include '../connection.php';  

$sql="insert into place(place) values ('$place')";
mysqli_query($con,$sql);
echo"<script>alert('Added succesfully'); window.location='add_place.php';</script>";
?>