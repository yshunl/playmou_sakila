<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$district = filter_input(INPUT_POST, 'district');
$city_id = filter_input(INPUT_POST, 'city_id');
$postal_code = filter_input(INPUT_POST, 'postal_code');
$phone = filter_input(INPUT_POST, 'phone');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$address\", \"$address2\", \"$district\", \"$city_id\", \"$postal_code\", \"$phone\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";