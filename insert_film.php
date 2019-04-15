<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$title = filter_input(INPUT_POST, 'title');
$release_year = filter_input(INPUT_POST, 'release_year');
$language_id = filter_input(INPUT_POST, 'language_id');
$original_language_id = filter_input(INPUT_POST, 'original_language_id');
$rental_duration = filter_input(INPUT_POST, 'rental_duration');
$rental_rate = filter_input(INPUT_POST, 'rental_rate');
$length = filter_input(INPUT_POST, 'length');
$replacement_cost = filter_input(INPUT_POST, 'replacement_cost');
$rating = filter_input(INPUT_POST, 'rating');
$special_features = filter_input(INPUT_POST, 'special_features');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$title\", \"$release_year\", \"$language_id\", \"$original_language_id\", \"$rental_duration\", \"$rental_rate\", \"$length\", \"$replacement_cost\", \"$rating\", \"$special_features\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";