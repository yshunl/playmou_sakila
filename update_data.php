<?php

include_once 'get_column_names.php';

$oldData = array();
foreach ($columnNames as $columnName) {
    $oldData[] = filter_input(INPUT_POST, "old_$columnName");
}

$newData = array();
foreach ($columnNames as $columnName) {
    if ($columnName === 'active') {
        if (filter_input(INPUT_POST, 'active') === on) {
            $newData[] = 1;
        } else {
            $newData[] = 0;
        }
    } else {
        $newData[] = filter_input(INPUT_POST, $columnName);
    }
}

$sql = "UPDATE $tableName SET ";
foreach ($columnNames as $index => $columnName) {
    if ($columnName === 'picture') {
        continue;
    } elseif ($columnName === 'last_update') {
        $sql .= $columnName . '=NULL, ';
    } else {
        $sql .= $columnName . '="' . $newData[$index] . '", ';
    }
}
$sql = substr($sql, 0, -2) . " WHERE ";
foreach ($columnNames as $index => $columnName) {
    if ($columnName === 'picture') {
        continue;
    } else {
        $sql .= $columnName . '="' . $oldData[$index] . '" AND ';
    }
}

mysqli_query($conn, substr($sql, 0, -5));

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";