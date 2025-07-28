<?php
session_start();
include '../connection.php';
$rate=$_POST['rate'];
$com=$_POST['com'];
$log=$_SESSION['login_id'];
$r_id=$_GET['req_id'];

$sql="INSERT INTO feedback(comment,rate,cust_id,book_id) 
                     values ('$com','$rate','$log','$r_id')";
mysqli_query($con,$sql);
echo"<script>alert('feedback Added Sucessfuly');window.location='index.php'</script>";
?>