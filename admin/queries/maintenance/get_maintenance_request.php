<?php
include '../../../src/config/config.php';

if (isset($_GET['requestId'])) {
    $requestId = $_GET['requestId'];

    $query = "SELECT * FROM maintenance_requests WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $requestId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'data' => [
                'name' => $row['maintenance_name'],
                'category' => $row['category'],
                'status' => $row['status'],
                'assigned_to' => $row['assigned_to'],
                'remarks' => $row['remarks']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Request not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request ID.']);
}
?>