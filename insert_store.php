<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$manager_staff_id = filter_input(INPUT_POST, 'manager_staff_id');
$address_id = filter_input(INPUT_POST, 'address_id');

$sql = "INSERT INTO $tableName VALUES (NULL, \"$manager_staff_id\", \"$address_id\", CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";