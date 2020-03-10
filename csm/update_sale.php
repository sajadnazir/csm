<?php

session_start();
require_once "db_connection.php";
include_once("session/admin.php");

$customer_id=$_POST['id'];
$customer_name=$_POST['bname'];
$vehicle_number=$_POST['vehicleNumber'];
$fuel_type=$_POST['type'];
$quantity=$_POST['quantity'];
$amount=$_POST['amount'];
$payment_type=$_POST['paymentType'];
$ccn=$_POST['ccn'];
$rate=$_POST['rate'];
$paid=$_POST['paid'];
$date=$_POST['date'];


$sql="INSERT INTO sales(id,name,vehicle,type,quantity,rate,amount,payment,paid,ccn,date) 
VALUES('$customer_id','$customer_name','$vehicle_number','$fuel_type','$quantity','$rate','$amount',
'$payment_type','$paid','$ccn','$date')";

if(mysqli_query($conn,$sql))
{	
    echo("<script> alert('Sale Added Successfully!')</script>");	  
    print('<script>location.href="dashboard.php" </script>');
}
else
{
    echo "ERROR :".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);

?>