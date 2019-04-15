<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$film_id = filter_input(INPUT_POST, 'film_id');
$category_id = filter_input(INPUT_POST, 'category_id');

$sql = "INSERT INTO $tableName VALUES (\"$film_id\", \"$category_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";