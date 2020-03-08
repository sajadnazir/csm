<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csm_db";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
		if(!$conn)
        {
			echo "Can't connect database " . mysqli_connect_error($connection);
			
		}
?>