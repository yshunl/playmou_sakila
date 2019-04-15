<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$first_name\", \"$last_name\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";