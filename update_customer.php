<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE customer SET customer='$_POST[customer]' WHERE customer_id='$_POST[customer_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_customer.php'>";
	else
		echo "Not updated";
?>