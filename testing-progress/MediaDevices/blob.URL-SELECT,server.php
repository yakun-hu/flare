<?php // write a db-select
require 'C:\wamp64\www\flare\my.sql-inc\db.conn-inc.php';
$sql = "SELECT ID, test_return FROM socket_conn2 ORDER BY ID DESC"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	// var_dump($row);
	echo $row["test_return"]; 
	echo $conn->error; 
/* $sql = "DELETE FROM socket_conn2"; 
	$conn->query($sql); 
	// echo $sql; 
	echo $conn->error;
<!-- https://flare/testing-progress/MediaDevices/blob.URL-SELECT,server.php -->
<!-- dev-notes:
	Listening in a row needs to be temperamental; after a URL is read,
	the listener needs to be incremented to the next row. The script needs
	to recognize when it has read something<sentience>as use that recognition, moment<physics>
	to trigger the next increment. This way, the src is not replaced mid.play-back.-->
<!-- test-prog:-->
	12/13/22 22:48 PM: 
		Logic error<v-t>: At least 30% of time from visual glance<10-s>, 
		the SELECT occurs on an empty table, returning no result, from the last DELETE, since
		the INSERT script has not had a chance to update. Timing-wise, this doesn't make sense. 
		Need to investigate further, and possibly build a fallback. 
		Doc: https://www.wordpress.materialinchess.com/2022/10/22/h2s58-condition-oriented-prog/
*/
?>