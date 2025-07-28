<?php
session_start();
$log=$_SESSION['login_id']
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$seatno=$_POST['seatno'];
$address=$_POST['address'];
include '../connection.php';  
$b_id=$_GET['b_id'];
$str="select*from seat_booking where seatno='$seatno' and bus_id=$b_id ";
 $result=mysqli_query($con,$str);
if(mysqli_num_rows($result)>0)
{
    echo"<script>alert('');window.location='view_seat.php'</script>";
}
else{
// $query="insert into login(username,pass,user_type,user_status) values('$username','$password','travel','0')";
// mysqli_query($con,$query);
// $log=mysqli_insert_id($con);
$sql="insert into seat_booking(name,email,phone,seatno,address,bus_id)
            values('$name','$email','$phone','$seatno','$address','$log','$b_id')";
mysqli_query($con,$sql);
$l=mysqli_insert_id($con);
echo"<script>window.location='payment.php?id=$l';</script>";
}
?>