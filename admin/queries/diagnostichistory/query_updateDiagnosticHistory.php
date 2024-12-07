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

$id = $_POST['id'];
$diagnosticID = $_POST['diagnosticID'];
$assetID = $_POST['assetID'];
$conductedby = $_POST['conductedby'];
$diagnosticDetails = $_POST['diagnosticDetails'];
$status = $_POST['status'];


$query = "UPDATE diagnostichistory
          SET diagnosticID = ?, assetdetailsid = ?, conductedby = ?, remarks = ?, status = ?
          WHERE id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("sisssi", $diagnosticID, $assetID, $conductedby, $diagnosticDetails, $status, $id);

if ($stmt->execute()) {
    $response = ['response_type' => 'success', 'response' => 'Diagnostic history updated successfully.'];
} else {
    $response = ['response_type' => 'error', 'response' => 'Failed to update diagnostic history.'];
}

echo json_encode($response);  // Return JSON response

$stmt->close();
$conn->close();
?>
