<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE address SET address='$_POST[address]',district='$_POST[district]',postal_code='$_POST[postal_code]',phone='$_POST[phone]' WHERE address_id='$_POST[address_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_address.php'>";
	else
		echo "Not updated";
?>