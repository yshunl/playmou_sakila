<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');

// takes in result from mysqli_query($conn, $sql) and returns a table
// for the SQL query
// added $table parameter for table class/ id
// $table can be left empty, will return default table style
function returnTable($result) {
//    $column = array_keys($result->fetch_assoc());
//
//    echo "<table id=$tableID><tbody><tr>";
//    echo "<tbody><tr>";
//    foreach ($column as $columnName) {
//        echo '<th>' . ucfirst($columnName) . '</th>';
//    }
//    echo '</tr>';
//    foreach ($column as $columnName) {
//        echo "<td><input type = \"text\" name=$columnName></input></td>";
//    }
//    echo '</tr>';

    $result->data_seek(0);
    while ($rows = $result->fetch_object()) {
        echo '<tr>';
        foreach ($rows as $data) {
            echo "<td>$data</td>";
        }
        echo '</tr>';
    }
}

if (!empty(filter_input(INPUT_POST, 'query'))) {
    $query = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'query'));
    $sql = "SELECT * FROM $tableName WHERE rental_id LIKE '%$query%' ORDER BY rental_id ASC LIMIT 50";
} else {
    $sql = "SELECT * FROM $tableName ORDER BY rental_id ASC LIMIT 50"; //$row," . $rowperpage;
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    returnTable($result);
}
?>