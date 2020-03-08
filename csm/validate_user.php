<?php
session_start();	
require_once "db_connection.php";

$email = trim($_POST['username']);
$password = trim($_POST['password']);

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$query = "SELECT * from users WHERE username='$email' AND password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if($row>0)
{      
$_SESSION['admin'] = true;
header("Location:dashboard.php");
}
else{
echo("<script> alert('Username or Password is incorrect')</script>");	  
print('<script>location.href="index.html" </script>');
}
mysqli_close($conn);
	
?>