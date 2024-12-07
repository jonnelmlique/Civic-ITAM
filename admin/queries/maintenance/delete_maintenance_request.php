<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = $_POST['requestId'];

    $stmt = $conn->prepare("DELETE FROM maintenance_requests WHERE request_id = ?");
    $stmt->bind_param("i", $requestId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Request deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete request."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>