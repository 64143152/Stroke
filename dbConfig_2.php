<?php 

// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nstoke";

// Create database connection
$db2 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db2->connect_error) {
    die("Connection failed: " . $db2->connect_error);
}


?>