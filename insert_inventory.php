<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$film_id = filter_input(INPUT_POST, 'film_id');
$store_id = filter_input(INPUT_POST, 'store_id');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$film_id\", \"$store_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";