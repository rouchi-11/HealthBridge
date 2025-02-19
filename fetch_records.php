<!-- <?php
include 'config.php';

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

$patients = array();

while ($row = $result->fetch_assoc()) {
    $patients[] = $row;
}

echo json_encode($patients);
?> -->

<?php
include 'config.php';

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}
echo json_encode($records);
?>
