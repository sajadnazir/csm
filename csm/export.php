<?php
session_start();
include_once("session/admin.php");
require_once('db_connection.php');

date_default_timezone_set("Asia/Calcutta");

$output='';

    $sql="SELECT * FROM sales";
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
        </tr>
        ';
    }
    while($row=mysqli_fetch_array($result))
    
    {
        
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
        </tr>
          ';
    }
    $output .='</table>';
    header("Content-Type:application/xls");
    header("Content-Disposition:attachment;filename=backup". date("Y-m-d h:i:sa"). ".xls");
    echo $output;

?>