<?php
include 'config.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE patients SET status = '$status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}
?>
