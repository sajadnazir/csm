
<!DOCTYPE html>
<html>
    <head>
        <title>CSM | Dashboard</title>
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
        <main>

        <div class="upper-strip">
            <div>NAME</div>
             <div>ADDRESS</div>
             <div>CONTACT</div>
        </div>
        <?php
session_start();
require_once "db_connection.php";
include_once("session/admin.php");

if(isset($_GET['keywords']))
         $keywords=($_GET['keywords']);
		$row = array();
		$query = "SELECT id,name,address,contact FROM customers WHERE id LIKE '%{$keywords}%' OR name LIKE '%{$keywords}%'  ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		 while($row=mysqli_fetch_assoc($result)){
             
           ?>
          
                <a href="add_sale_to_customer.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'];?>">
                <div class="one-user card"> 
                  <div><?php  echo $row['name']; ?></div>
                  <div><?php  echo $row['address']; ?></div>
                  <div><?php  echo $row['contact']; ?></div>

                  </div>
                 </a>
                 <?php
         }
                 ?>
           
        </main>
        
    </body>
</html>