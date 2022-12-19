<?php /* write a db-write, with the check being, that a write is being shown
in phpmyAdmin */
require 'C:\wamp64\www\flare\my.sql-inc\db.conn-inc.php';
echo 'Line<br>';
if(isset($_POST['message'])) {
	echo $_POST['message']; 
	echo 'test';
} 
$sql = "UPDATE socket_conn SET test_return='{$_POST["message"]}' WHERE ID='1'";
$conn->query($sql);
echo $conn->error; ?>
<!-- http://flare/server.php -->
<!-- internal lib:
	'{$_POST["message"]}' --> 
<!-- test log: 
	$sql UPDATE works with a hard-coded string upon refresh: 11/16/22 20:20
	$_POST from client-send.php is WORKING, successful write to db upon 
	single char-write. -->