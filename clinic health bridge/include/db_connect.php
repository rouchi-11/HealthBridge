<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "medical_report";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
