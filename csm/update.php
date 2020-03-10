<?php


session_start();
require_once "db_connection.php";
include_once("session/admin.php");

$id=$_POST['id'];
$sale_id=$_POST['saleId'];
$customer_name=$_POST['bname'];
$vehicle=$_POST['vehicleNumber'];
$fuel_type=$_POST['type'];
$quantity=$_POST['quantity'];
$rate=$_POST['rate'];
$amount=$_POST['amount'];
$payment_type=$_POST['paymentType'];
$paid=$_POST['paid'];
$ccn=$_POST['ccn'];
$date=$_POST['date'];


$sql="UPDATE sales SET vehicle='$vehicle',type='$fuel_type',quantity='$quantity',rate='$rate',
amount='$amount',payment='$payment_type',paid='$paid',ccn='$ccn',date='$date' WHERE saleId='$sale_id' AND id='$id'";

if(mysqli_query($conn,$sql))
{	
    echo("<script> alert('Sale Updated Successfully!')</script>");	  
    print('<script>location.href="dashboard.php" </script>');
}
else
{
    echo "ERROR :".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);


?>