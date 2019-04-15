<?php

$tableName = basename(filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING), '.php');
$resultsPerPage = 50;
$firstRowIndex = 0;

if (!empty(filter_input(INPUT_POST, 'previous'))) {
    $firstRowIndex = filter_input(INPUT_POST, 'firstRowIndex');
    $firstRowIndex -= $resultsPerPage;
    if ($firstRowIndex < 0) {
        $firstRowIndex = 0;
    }
}

$numberOfRecords = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS numberOfRecords FROM $tableName"))[0];

if (!empty(filter_input(INPUT_POST, 'next'))) {
    $firstRowIndex = filter_input(INPUT_POST, 'firstRowIndex');
    $numberOfRecords = filter_input(INPUT_POST, 'numberOfRecords');
    if ($firstRowIndex + $resultsPerPage < $numberOfRecords) {
        $firstRowIndex += $resultsPerPage;
    }
}