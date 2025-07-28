<?php
session_start();
$bus_name=$_POST['bus_name'];
$start_time=$_POST['start_time'];
$arrival_time=$_POST['arrival_time'];
$date=$_POST['date'];

$vehicle_number=$_POST['vehicle_number'];
$image=$_POST['image'];
$seat_image=$_POST['seat_image'];
$route=$_POST['route'];
$log=$_SESSION['login_id'];
include '../connection.php';  
// $str="select*from login where username='$username' or pass='$password'";
// $result=mysqli_query($con,$str);
// if(mysqli_num_rows($result)>0)
// {echo"<script>alert('username and password are already used');window.location='registration.php'</script>";
// }
// else{
// $query="insert into login(username,pass,user_type,user_status) values('$username','$password','travel','0')";
// mysqli_query($con,$query);
// $log=mysqli_insert_id($con);
$sql="insert into bus(bus_name,start_time,arrival_time,date,vehicle_number,image,seat_image,route_id,login_id)
            values('$bus_name','$start_time','$arrival_time','$date','$vehicle_number','$image','$seat_image','$route','$log')";
mysqli_query($con,$sql);
echo"<script>alert('Added succesfully'); window.location='add_bus.php';</script>";
?>