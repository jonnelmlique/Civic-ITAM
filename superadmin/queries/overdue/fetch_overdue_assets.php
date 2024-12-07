<?php
include '../../../src/config/config.php';

// Fetch assets from the database
$query = "SELECT * FROM overdue_assets";
$result = $conn->query($query);

$assets = [];

// Loop through the results and store them in an array
while ($row = $result->fetch_assoc()) {
    $assets[] = $row;
}

// Return the results as JSON
echo json_encode($assets);

$conn->close();
?>