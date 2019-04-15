<?php

include_once 'get_column_names.php';

$checkbox = filter_input(INPUT_POST, 'checkbox', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

for ($i = 0; $i < count($checkbox); $i++) {
    $deleteInfoArrays[$i] = explode(';', $checkbox[$i]);
}

foreach ($deleteInfoArrays as $deleteInfoArray) {
    $sql = "DELETE FROM $tableName WHERE ";
    foreach ($columnNames as $index => $columnName) {
        $sql .= $columnName . '="' . $deleteInfoArray[$index] . '" AND ';
    }
    mysqli_query($conn, substr($sql, 0, -5));
}

echo "<meta http-equiv=\"refresh\" content=\"0; url=$tableName.php\">";