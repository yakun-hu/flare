<?php // write a db-select
require 'C:\wamp64\www\flare\my.sql-inc\db.conn-inc.php';
$sql = "SELECT test_return FROM socket_conn WHERE ID='1'"; 
$result = $conn->query($sql); 
$row = $result->fetch_assoc();
// var_dump($row);
echo $row["test_return"]; 
echo $conn->error; ?>
<!-- http://flare/server-read.php -->
<!-- test log: -->