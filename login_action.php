<?php
session_start();

include 'connection.php';
$name=$_POST["username"];
$pass=$_POST["pass"];
$str = "SELECT * FROM login WHERE username='$name' AND pass='$pass'";
$result=mysqli_query($con,$str);
if($result)
{    
$data=mysqli_fetch_array($result);
if($data)
{
$_SESSION['login_id']=$data['login_id'];
$_SESSION['username']=$data['username'];
$_SESSION['user_type']=$data['user_type'];
if($data['user_type']=="admin")
{ 
header ("Location: admin/index.php");
}
else if($data['user_type']=="user" && $data['user_status']=="approved")
{
header ("Location: user/index.php") ;
}
else if($data['user_type']=="travel" && $data['user_status']=="approved")
{
header ("Location: travel/index.php");
}
else
{
echo "<script>alert('Not approved');window.location='login.php'</script>";
}
}
else
{
    echo "<script>alert('Invalid username or password');window.location='login.php'</script>";
}
}else{
    echo "<script>alert('Invalid database');window.location='login.php'</script>";
}
?>