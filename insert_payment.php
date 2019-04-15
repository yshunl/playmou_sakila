<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$customer_id = filter_input(INPUT_POST, 'customer_id');
$staff_id = filter_input(INPUT_POST, 'staff_id');
$rental_id = filter_input(INPUT_POST, 'rental_id');
$amount = filter_input(INPUT_POST, 'amount');
$payment_date = filter_input(INPUT_POST, 'payment_date');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$customer_id\", \"$staff_id\", \"$rental_id\", \"$amount\", \"$payment_date\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";