<!-- <?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO patients (name, age, address, phone) VALUES ('$name', '$age', '$address', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: while adding record" . $sql . "<br>" . $conn->error;
    }
}
?> -->

<!-- <?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO patients (name, age, address, phone, status) VALUES ('$name', '$age', '$address', '$phone', 'Pending')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?> -->

<?php
include 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if (empty($name) || empty($age) || empty($address) || empty($phone)) {
        echo "Error: All fields are required!";
        exit;
    }

    $sql = "INSERT INTO patients (name, age, address, phone, status) VALUES (?, ?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("siss", $name, $age, $address, $phone);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error executing query: " . $stmt->error;
    }
}
?>
