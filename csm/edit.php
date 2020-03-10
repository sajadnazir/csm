<?php
session_start();
require_once "db_connection.php";
include_once("session/admin.php");
if(isset($_GET['id']))
{
        $sale_id = (int) $_GET['id'];
        
        
	}
	else
	{
		echo "not set";
    }
    
$query = "SELECT * from sales where saleId=$sale_id ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$id=$row['id'];
$customer_name=$row['name'];
$vehicle=$row['vehicle'];
$fuel_type=$row['type'];
$quantity=$row['quantity'];
$rate=$row['rate'];
$amount=$row['amount'];
$payment_type=$row['payment'];
$paid=$row['paid'];
$ccn=$row['ccn'];
$date=$row['date'];

?> 

<!DOCTYPE html>
<html>
    <head>
        <title>CSM | Edit</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <nav>
            <ul>
            <div class="nav-grid">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="rates.html">Manage Rates</a></li>
                <li><a href="customers.php">Add Customer</a></li>
            </div>
            <div class="nav-grid flex-end">
                <li>
                    <form class="display-flex" method="GET" action="search.php">
                        <input type="search" name="keywords" required placeholder="Search......" class="search" required>
                        <input type="submit" value="Search" class="bg-white btn nav-button">
                    </form>
                    
                </li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            </ul>
        </nav>
        <main class="main-section">
            <form class="form-sale" method="POST" action="update.php">
                <div>
                    <div class="main-login-sale card">
               <div >
                   <label class="font15"> SALE NO:<?php echo $sale_id; ?></label>
                   <input type="hidden" name="saleId" value="<?php echo $sale_id; ?>" />
               </div>

               <div >
                   <label class="font15"> ID:<?php echo $id; ?></label>
                   <input type="hidden" name="id" value="<?php echo $id; ?>" />
               </div>

                <div >
                    <label class="font15"> Name:<?php echo $customer_name; ?></label>
                    <input type="hidden" name="bname" value="<?php echo $customer_name; ?>" />
                </div>
                
                <div class="form-element"> 
                    <label> Vehicle Number:</label>
                    <input type="text"  name="vehicleNumber" value="<?php echo $vehicle; ?>">
                </div>

                <div class="form-element">
                    <label> Type:</label>
                    <select name="type">
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>

                <div class="form-element">
                    <label> Quantity:</label>
                    <input type="number" required name="quantity" value="<?php echo $quantity; ?>">
                </div>

                <div class="form-element">
                    <label> Rate:</label>
                    <input type="text" required name="rate" value="<?php echo $rate; ?>">
                </div>

                <div class="form-element">
                    <label> Total Amount:</label>
                    <input type="text" required name="amount" value="<?php echo $amount; ?>">
                </div>

                <div class="form-element">
                    <label> Payment Type:</label>
                    <select name="paymentType">
                        <option value="cash">Cash</option>
                        <option value="card">card</option>
                        <option value="credit">Credit</option>
                        <option value="cheque">Cheque</option>
                    </select>
                </div>

                <div class="form-element">
                    <label> Amount Paid:</label>
                    <input type="number" required name="paid" value="<?php echo $paid; ?>">
                </div>

                <div class="form-element">
                    <label> Cheque/Card No:</label>
                    <input type="number"  name="ccn" value="<?php echo $ccn; ?>">
                </div>

                <div class="form-element">
                    <label> Date:</label>
                    <input type="date" required name="date" value="<?php echo $date; ?>">
                </div>

                <div class="form-element">
                    <input type="submit" value="UPDATE" class="btn">
                </div>
                </div>
                
                </div>

            </form>

            
        </main>
        
    </body>
</html>
