<?php /* write a db-write, with the check being, that a write is being shown
in phpmyAdmin */
require 'C:\wamp64\www\flare\my.sql-inc\db.conn-inc.php';
// echo 'Line<br>';
if(isset($_POST['blob'])) {
	echo $_POST['blob'];
	// echo 'test';	
}
if(isset($_POST['counter'])) {
	echo '<br>' . $_POST['counter']; 
	// echo 'hihi';
} 
$sql = "INSERT INTO socket_conn2 (ID, test_return) VALUES ('{$_POST["counter"]}', '{$_POST["blob"]}') ";
$conn->query($sql);
echo $conn->error; 
/* <!-- https://flare/testing-progress/MediaDevices/record-write.php -->
<!-- test-log
	Wrote correct INSERT-statement that inputs both POST values into table. 
	When cam-record.php start-record is run in context, each blob-url, and counter value, is added<20%, 5-s view, intermittent>
	into the MySQL-table. All syntax in the INSERT INTO statement is correct. 
		Test passed. 
*/
?>

