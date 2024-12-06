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

$diagnosticID = $_POST['diagnosticID'];
$assetID = $_POST['assetID'];
$conductedby = $_POST['conductedby'];
$diagnosticDetails = $_POST['diagnosticDetails'];
$status = $_POST['status'];

$sql = "INSERT INTO diagnostichistory (diagnosticid, assetdetailsid, conductedby, remarks, status) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $diagnosticID, $assetID, $conductedby, $diagnosticDetails, $status);

if ($stmt->execute()) {
    echo json_encode(['response' => 'Diagnostic added successfully', 'status' => 200, 'response_type' => 'success']);
} else {
    echo json_encode(['response' => 'Failed to add diagnostic', 'status' => 400, 'response_type' => 'error']);
}

$stmt->close();
?>
