<?php
	// Connect with Database
	include_once("dbconfig.php");
	// Update Query
	$sql = "UPDATE film SET title='$_POST[title]',description='$_POST[description]',release_year='$_POST[release_year]',language_id='$_POST[language_id]',original_language_id='$_POST[original_language_id]',rental_duration='$_POST[rental_duration]',rental_rate='$_POST[rental_rate]',length='$_POST[length]',replacement_cost='$_POST[replacement_cost]',rating='$_POST[rating]',special_features='$_POST[special_features]' WHERE film_id='$_POST[film_id]'";
	// Execute the Query
	if($conn->query($sql))
		echo "<meta http-equiv='refresh' content='0;url=select_film.php'>";
	else
		echo "Not updated";
?>