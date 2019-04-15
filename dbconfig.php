<?php

$servername = "localhost";
$username = "hcyek1";
$password = "playmou12345";
$database = "hcyek1_sakila";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}