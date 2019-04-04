<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE actor SET first_name='$_POST[first_name]',last_name='$_POST[last_name]' WHERE actor_id='$_POST[actor_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_actor.php'>";
	else
		echo "Not updated";
?>
