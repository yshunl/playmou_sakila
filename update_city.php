<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE city SET city='$_POST[city]',country_id='$_POST[country_id]' WHERE city_id='$_POST[city_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_city.php'>";
	else
		echo "Not updated";
?>