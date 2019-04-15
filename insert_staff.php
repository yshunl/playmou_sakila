<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$address_id = filter_input(INPUT_POST, 'address_id');
$picture = filter_input(INPUT_POST, 'picture');
$email = filter_input(INPUT_POST, 'email');
$store_id = filter_input(INPUT_POST, 'store_id');
if (filter_input(INPUT_POST, 'active') === on) {
    $active = 1;
} else {
    $active = 0;
}
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$first_name\", \"$last_name\", \"$address_id\", \"$picture\", \"$email\", \"$store_id\", \"$active\", \"$username\", \"$password\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";