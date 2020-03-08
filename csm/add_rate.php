<?php 

session_start();
require_once "db_connection.php";
include_once("session/admin.php");

$petrol=$_POST['ratePetrol'];
$diesel=$_POST['rateDiesel'];


$sql="UPDATE rates SET petrol='$petrol',diesel='$diesel'";

if(mysqli_query($conn,$sql))
{	
    echo("<script> alert('Rate Updated Successfully!')</script>");	  
    print('<script>location.href="dashboard.php" </script>');
}
else
{
    echo "ERROR :".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);

?>