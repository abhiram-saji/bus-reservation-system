<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$username=$_POST['username'];
$password=$_POST['pass'];
include 'connection.php';  
$str="select*from login where username='$username' or pass='$password'";
$result=mysqli_query($con,$str);
if(mysqli_num_rows($result)>0)
{echo"<script>alert('username and password are already used');window.location='registration.php'</script>";
}
else{
$query="insert into login(username,pass,user_type,user_status) values('$username','$password','user','approved')";
mysqli_query($con,$query);
$log=mysqli_insert_id($con);
$sql="insert into register(name,email,phone,address,login_id) values('$name','$email','$phone','$address','$log')";
mysqli_query($con,$sql);
echo"<script>alert('regisrtation succesfull'); window.location='login.php';</script>";
}
?>