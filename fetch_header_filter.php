<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');

$sql = "SHOW COLUMNS FROM $tableName";
$headerFilter = mysqli_query($conn, $sql);

echo ' <tr class="table100-head noHover mobile-none"><th></th>';
while ($row = mysqli_fetch_array($headerFilter)) {
    echo '<th>' . ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $row['Field'])) . '</th>';
}
echo '</tr><tr><td><div class="pretty p-icon p-jelly"><input type="checkbox" value="selectAll"> <div class="state">
            <i class="icon fa fa-check"></i>
            <label></label>
            </div></div></td>';
$headerFilter->data_seek(0);
while ($row = mysqli_fetch_array($headerFilter)) {
    echo '<td><input type = "text" name="' . $row['Field'] . '"></input></td>';
}
echo '</tr>';






