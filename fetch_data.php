<?php

require_once 'dbconfig.php';

$tableName = filter_input(INPUT_POST, 'tableName');
$columnQuery = json_decode(filter_input(INPUT_POST, 'columnQuery'), true);
$sortBy = mysqli_fetch_field(mysqli_query($conn, "SELECT * FROM $tableName"))->name;
$firstRowIndex = filter_input(INPUT_POST, 'firstRowIndex');
$resultsPerPage = filter_input(INPUT_POST, 'resultsPerPage');

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
        $checkboxValue = '<td><div class="pretty p-icon p-jelly"><input type="checkbox" name="checkbox[]" form="updateDeleteForm" value="';
        foreach ($rows as $columnName => $data) {
            if ($columnName === 'picture' && !empty($data)) {
                $checkboxValue .= base64_encode($data) . ';';
//                echo base64_encode($data) . "\"></td>";
//                debug_to_console(base64_encode($data));
            } else {
                $checkboxValue .= $data . ';';
            }
        }
        echo $checkboxValue . '"> <div class="state">
            <i class="icon fa fa-check"></i>
            <label></label>
            </div></div></td>';
        foreach ($rows as $columnName => $data) {
            if ($columnName === 'picture' && !empty($data)) {
                echo "<td><img src=\"data:image/jpeg;base64," . base64_encode($data) . "\"></td>";
//                debug_to_console(base64_encode($data));
            } else {
                echo "<td>$data</td>";
            }
        }
        echo '</tr>';
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

if (!is_null($columnQuery) && array_filter($columnQuery)) {
    $sql = "SELECT * FROM $tableName WHERE ";
    for ($i = 0; $i < count($columnQuery); $i++) {
        $sql .= array_keys($columnQuery)[$i] . ' LIKE "%' . array_values($columnQuery)[$i] . '%" ';
        if ($i !== count($columnQuery) - 1) {
            $sql .= 'AND ';
        }
    }
    $sql .= "ORDER BY $sortBy ASC LIMIT $firstRowIndex, $resultsPerPage";
//    echo $sql;
//    foreach($columnQuery as $column => $query) {
//        echo '<br><br>Not this: ' . $column . ' ' . $query . '<br>';
//        if(empty($query)) {
//            $sql = "SELECT * FROM $tableName ORDER BY rental_id ASC LIMIT 50";
//        }
//    }
    //echo '<tr><td>' . $columnQuery1 . '</td></tr>';
    //$columnQuery = mysqli_real_escape_string($conn, $columnQuery);
//    foreach($columnQuery as $x => $x_value) {
//        echo '<script>console.log(' . $x . $x_value . ');</script>';
//        echo "<br>";
//    }
} else {
    $sql = "SELECT * FROM $tableName ORDER BY $sortBy ASC LIMIT $firstRowIndex, $resultsPerPage";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    returnTable($result);
} else {
    echo '<tr><td></td><td colspan = "' . mysqli_num_fields($result) . '">No matching records found</td></tr>';
}