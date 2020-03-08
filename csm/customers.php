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
            

            <div class="customer-container">

            <form class="everything-center" method="POST" action="add_customer.php">

             <div class="main-login card">

                <div class="info font30">
                    Add New Customer
                </div>

                <div class="form-element">
                    <label> Name:</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-element">
                    <label> Address:</label>
                    <input type="text" name="address" required>
                </div>

                <div class="form-element">
                    <label> Contact:</label>
                    <input type="text" name="contact" required>
                </div>

                <div class="form-element">
                    <input type="submit" value="Add Customer" class="btn white-color">
                </div>
            </div>
            </form>
            <div class="v-line"></div>


            <div class="customers">

                <?php
                session_start();
                require_once "db_connection.php";
                include_once("session/admin.php");
               
                        $query = "SELECT id,name,address,contact FROM customers ";
                        $result = mysqli_query($conn, $query);
                         while($row=mysqli_fetch_assoc($result)){
                             
                           ?>
                                <div class="one-user-customer card"> 
                                  <div><?php echo $row['id'] ?>   </div>
                                  <div><?php  echo $row['name']; ?></div>
                                  <div><?php  echo $row['address']; ?></div>
                                  <div><?php  echo $row['contact']; ?></div>
                
                                  </div>
                                 
                                 <?php
                         }
                                 ?>
            </div>
        </div>

            
        </main>
        
    </body>
</html>