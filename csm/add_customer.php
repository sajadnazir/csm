<?php 

session_start();
require_once "db_connection.php";
include_once("session/admin.php");

$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];

$sql="INSERT INTO customers(name,address,contact) VALUES('$name','$address','$contact')";

if(mysqli_query($conn,$sql))
{	
    echo("<script> alert('Customer Added Successfully!')</script>");	  
    print('<script>location.href="dashboard.php" </script>');
}
else
{
    echo "ERROR :".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);

?>