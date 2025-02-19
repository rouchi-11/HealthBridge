<?php
include 'config.php';

$sql = "DELETE FROM patients";

if ($conn->query($sql) === TRUE) {
    echo "All records have been reset.";
} else {
    echo "Error resetting records: " . $conn->error;
}
?>
