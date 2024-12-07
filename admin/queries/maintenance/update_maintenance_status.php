<?php

include '../../../src/config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['status'])) {
    $id = $conn->real_escape_string($data['id']);
    $status = $conn->real_escape_string($data['status']);

    $sql = "UPDATE maintenance_requests SET status = '$status' WHERE request_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}

$conn->close();
?>