<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');

$sql = "SHOW COLUMNS FROM $tableName";
$headerFilter = mysqli_query($conn, $sql);

echo '<tr>';
while ($row = mysqli_fetch_array($headerFilter)) {
    echo '<th>' . ucwords(str_replace('_', ' ', $row['Field'])) . '</th>';
}
echo '</tr><tr>';
$headerFilter->data_seek(0);
while ($row = mysqli_fetch_array($headerFilter)) {
    echo '<td><input type = "text" name=' . $row['Field'] . '></input></td>';
}
echo '</tr>';
?>