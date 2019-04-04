<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE category SET name='$_POST[name]' WHERE category_id='$_POST[category_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_category.php'>";
	else
		echo "Not updated";
?>