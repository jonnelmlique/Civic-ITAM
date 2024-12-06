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

$query = "DELETE FROM diagnostichistory WHERE id = ?";

$stmt = $conn->prepare($query);

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $response = ['response_type' => 'success', 'response' => 'Diagnostic history deleted successfully.'];
} else {
    $response = ['response_type' => 'error', 'response' => 'Failed to delete diagnostic history.'];
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
