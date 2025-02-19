<?php
$host = "localhost";
$user = "root"; // Default MySQL user in XAMPP
$password = "2311"; // Leave blank if no password
$dbname = "healthbridge_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
