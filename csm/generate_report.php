<?php
session_start();
require_once "db_connection.php";
include_once("session/admin.php");

$id=$_POST['id'];
$from=$_POST['from'];
$to=$_POST['to'];
// echo $id."<br>";
// echo $from."<br>";
// echo $to."<br>";
$output='';

    $sql="SELECT * FROM sales WHERE (date BETWEEN '$from' AND '$to') AND id=$id";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $output .='
        
        <table class="table" border="1">
        <tr>
           <th>SALE NO.</th>
           <th>ID</th>
           <th>NAME</th>
           <th>VEHICLE NO.</th>
           <th>FUEL TYPE</th>
           <th>QUANTITY</th>
           <th>RATE</th>
           <th>AMOUNT</th>
           <th>PAYMENT TYPE</th>
           <th>PAID</th>
           <th>CHQ/CRD</th>
           <th>DATE</th>
           <th>BALANCE</th>
        </tr>
        ';
    }
    $a=0;
    $b=0;
    while($row=mysqli_fetch_array($result))
    
    {
        $a=$a+$row['amount'];
        $b=$b+$row['paid'];
        $total=$a-$b;
        $output .=' 
        <tr>
        <td>'.$row['saleId'].'</td>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['vehicle'].'</td>
        <td>'.$row['type'].'</td>
        <td>'.$row['quantity'].'</td>
        <td>'.$row['rate'].'</td>
        <td>'.$row['amount'].'</td>
        <td>'.$row['payment'].'</td>
        <td>'.$row['paid'].'</td>
        <td>'.$row['ccn'].'</td>
        <td>'.$row['date'].'</td>
        <td>'.$total.'</td>
        </tr>
          ';
    }
    $output .='</table>';
    header("Content-Type:application/xls");
    header("Content-Disposition:attachment;filename=credit-system.xls");
    echo $output;

?>