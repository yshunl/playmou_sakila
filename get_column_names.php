<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$columnNamesResult = mysqli_query($conn, "SHOW COLUMNS FROM $tableName");

$columnNames = array();
while ($columnName = mysqli_fetch_array($columnNamesResult)) {
    $columnNames[] = $columnName['Field'];
}