<?php
session_start();
require_once "db_connection.php";
include_once("session/admin.php");
if(isset($_GET['id']))
{
        $customer_id = (int) $_GET['id'];
        
	}
	else
	{
		echo "not set";
    }
    
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>CSM | Reports</title>
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
                    <!-- <form class="display-flex" method="GET" action="php/search.php">
                        <input type="search" name="keywords" placeholder="Search......" class="search" required>
                        <input type="submit" value="Search" class="bg-white btn nav-button">
                    </form> -->
                    
                </li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            </ul>
        </nav>
 <div>
     <form method="post" action="generate_report.php" class="card">
     <div class="report-container">
         <div class="main-login card">
        
         <div >
                   <input type="hidden" name="id" value="<?php echo $customer_id; ?>" />
        </div>

            <div class="form-element">
                <div><label>From</label></div>
                <div><input type="text" required name="from" placeholder="yyyy-mm-dd" class="i-report"></div>
            </div>

            <div class="form-element">
                <div><label>To</label></div>
                <div><input type="text" required name="to" placeholder="yyyy-mm-dd" class="i-report"></div>
            </div>

            <div class="form-element">
        
                <input type="submit"  value="Generate" class="i-report btn" onclick="alert('Do you want to generate a report?');">
                
            </div>
            
            </div>

            </div>
      </form>
 </div>

</body>
</html>