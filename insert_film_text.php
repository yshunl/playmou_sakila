<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$film_id = filter_input(INPUT_POST, 'film_id');
$description = filter_input(INPUT_POST, 'description');

$sql = "INSERT INTO $tableName VALUES (\"$film_id\", \"$description\")";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";