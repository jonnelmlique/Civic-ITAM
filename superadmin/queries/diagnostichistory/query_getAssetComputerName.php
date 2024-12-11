<?php
include('../../../src/config/config.php');

if (!$conn) {
    echo json_encode([
        'response' => 'Database connection failed.',
        'error' => mysqli_connect_error(),
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}

$sql = "SELECT id, assetname FROM assetdetails";
$result = $conn->query($sql);

$assets = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $assets[] = $row;
    }
}

echo json_encode($assets);
$conn->close();
?>