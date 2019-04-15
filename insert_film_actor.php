<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$actor_id = filter_input(INPUT_POST, 'actor_id');
$film_id = filter_input(INPUT_POST, 'film_id');

$sql = "INSERT INTO $tableName VALUES (\"$actor_id\", \"$film_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";