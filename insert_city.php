<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$city = filter_input(INPUT_POST, 'city');
$country_id = filter_input(INPUT_POST, 'country_id');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$city\", \"$country_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";