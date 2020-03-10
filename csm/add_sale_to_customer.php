<?php
session_start();
require_once "db_connection.php";
include_once("session/admin.php");
if(isset($_GET['id']))
{
        $customer_id = (int) $_GET['id'];
        $customer_name=$_GET['name'];
        
	}
	else
	{
		echo "not set";
    }
    
$query = "SELECT * from rates ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$ratePetrol=$row['petrol'];
$rateDiesel=$row['diesel'];

?> 

<!DOCTYPE html>
<html>
    <head>
        <title>CSM | Sales</title>
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
            <form class="form-sale" method="POST" action="update_sale.php">
                <div>
                    <div class="main-login-sale card">
               <div >
                   <label class="font15">ID:<?php echo $customer_id; ?></label>
                   <input type="hidden" name="id" value="<?php echo $customer_id; ?>" />
               </div>

                <div >
                    <label class="font15"> Name:<?php echo $customer_name; ?></label>
                    <input type="hidden" name="bname" value="<?php echo $customer_name; ?>" />
                </div>
                
                <div class="form-element"> 
                    <label> Vehicle Number:</label>
                    <input type="text" name="vehicleNumber" >
                </div>

                <div class="form-element">
                    <label> Type:</label>
                    <select name="type" onchange="fuelType()" id="fuel">
                        <option >--------select fuel--------</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>

                <div class="form-element">
                    <label> Quantity:</label>
                    <input type="number" name="quantity"  id="quantity" oninput="cal()" required>
                </div>

                <div class="form-element">
                    <label> Rate:</label>
                    <input type="text" name="rate"  id="rate" required>
                </div>

                <div class="form-element">
                    <label> Total Amount:</label>
                    <input type="text" name="amount" id="total"  required>
                </div>

                <div class="form-element">
                    <label> Payment Type:</label>
                    <select name="paymentType">
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="credit">Credit</option>
                        <option value="cheque">Cheque</option>
                    </select>
                </div>

                <div class="form-element">
                    <label> Cheque/Card Number:</label>
                    <input type="text" name="ccn" >
                </div>

                <div class="form-element">
                    <label> Amount Paid:</label>
                    <input type="number" name="paid" required>
                </div>

                <div class="form-element">
                    <label> Date:</label>
                    <input type="date" name="date" required>
                </div>

                <div class="form-element">
                    <input type="submit" value="SAVE" class="btn">
                </div>
                </div>
                
                </div>

            </form>

            <div class="rate">
                <div class="card-sale">
                    <div class="font30">Todays Rate</div>
                    <div class="font20" >
                        Petrol :<?php echo $ratePetrol;?> 
                        <input type="hidden" id="petrol" value="<?php echo $ratePetrol; ?>" />
                    </div>
                    <div class="font20">
                        Diesel :<?php echo $rateDiesel;?> 
                        <input type="hidden" id="diesel" value="<?php echo $rateDiesel; ?>" />
                    </div>
                </div>
            </div>
            
        </main>
        
    </body>
    <script>

function fuelType(){
    var fuel=document.getElementById("fuel").value ;
    var fuelValue = document.getElementById("petrol").value;
    if(fuel== "petrol"){
        fuelValue = document.getElementById("petrol").value;
    }else{
        fuelValue = document.getElementById("diesel").value;
    }
   document.getElementById("rate").value =fuelValue;
  
}

  function cal() {
  var quantity=document.getElementById("quantity").value ;
  var rate=document.getElementById("rate").value ;
  var totalAmount=quantity*rate;
  document.getElementById("total").value = totalAmount;
  
}

</script>
</html>
