<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$rental_date = filter_input(INPUT_POST, 'rental_date');
$inventory_id = filter_input(INPUT_POST, 'inventory_id');
$customer_id = filter_input(INPUT_POST, 'customer_id');
$return_date = filter_input(INPUT_POST, 'return_date');
$staff_id = filter_input(INPUT_POST, 'staff_id');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$rental_date\", \"$inventory_id\", \"$customer_id\", \"$return_date\", \"$staff_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";