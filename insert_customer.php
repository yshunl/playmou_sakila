<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$store_id = filter_input(INPUT_POST, 'store_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$address_id = filter_input(INPUT_POST, 'address_id');
if (filter_input(INPUT_POST, 'active') === on) {
    $active = 1;
} else {
    $active = 0;
}
$create_date = filter_input(INPUT_POST, 'create_date');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$store_id\", \"$first_name\", \"$last_name\", \"$email\", \"$address_id\", \"$active\", \"$create_date\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";