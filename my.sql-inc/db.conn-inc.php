<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flare-db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	} else {
	// echo "Connection successful!";
	}
// echo 'test';
?>
<!-- http://flare/my.sql-inc/db.conn-inc.php -->
<!-- test-log 
1:24 AM 10/30/22:
	URL test, db-conn test; created new db, swapped in db-name. 
	Test-passed:
		Connection successful! displayed, when this URL is visited. -->
