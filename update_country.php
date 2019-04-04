<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE country SET country='$_POST[country]' WHERE country_id='$_POST[country_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_country.php'>";
	else
		echo "Not updated";
?>