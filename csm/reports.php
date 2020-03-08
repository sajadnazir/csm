<?php

session_start();
include_once("session/admin.php");

?>
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

            </div>
            <div class="nav-grid flex-end">
                <li>
            <form class="display-flex" style="width:30vw" method="GET" action="process_reports.php">
                        <input type="search" name="keywords" required placeholder="Search......" class="search" required>
                        <input type="submit" value="Search" class="bg-white btn nav-button">
                    </form>
                    
                </li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            </ul>
        </nav>
