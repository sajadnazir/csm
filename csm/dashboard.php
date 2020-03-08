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
                <li><a href="reports.php">Reports</a></li>
                <li><a href="export.php">Backup Data</a></li>

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

        <div class="customers">

        <div class="upper-strip-sale card">
            <div>SALE NO</div>
            <div>ID</div>
            <div>NAME</div>
            <div>VEHICLE NO.</div>
            <div>QUANTITY</div>
            <div>RATE </div>
            <div>T.AMOUNT</div>
            <div>PAYMENT MODE</div>
            <div>PAID</div>
            <div>DATE</div>
            <div>EDIT</div>
            
        </div>

                <?php
               session_start();
               require_once "db_connection.php";
               include_once("session/admin.php");
               
                        $query = "SELECT * FROM sales  ORDER BY saleId DESC LIMIT 30";
                        $result = mysqli_query($conn, $query);
                         while($row=mysqli_fetch_assoc($result)){
                             
                           ?>
                                <div class="one-user-sale card"> 
                                  <div><?php echo $row['saleId']; ?>   </div>
                                  <div><?php echo $row['id']; ?>   </div>
                                  <div><?php  echo $row['name']; ?></div>
                                  <div><?php  echo $row['vehicle']; ?></div>
                                  <div><?php  echo $row['quantity']; ?></div>
                                  <div><?php  echo $row['rate']; ?></div>
                                  <div><?php  echo $row['amount']; ?></div>
                                  <div><?php  echo $row['payment']; ?></div>
                                  <div><?php  echo $row['paid']; ?></div>
                                  <div><?php  echo $row['date']; ?></div>
                                  <div><a class="black-color" href="edit.php?id=<?php echo $row['saleId']; ?>"> Edit</a></div>
                
                                  </div>
                                 
                                 <?php
                         }
                                 ?>
            </div>
        
    </body>
</html>