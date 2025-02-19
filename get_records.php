<?php
header("Content-Type: application/json"); // Tell browser we are sending JSON
include "db.php"; // Include database connection

// Fetch records from the database
$query = "SELECT * FROM patients"; // Change `patients` to your table name
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => "Database query failed"]);
    exit;
}

$patients = [];
while ($row = mysqli_fetch_assoc($result)) {
    $patients[] = $row;
}

// Return JSON response
echo json_encode($patients);
?>
