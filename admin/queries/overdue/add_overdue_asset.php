<?php
include '../../../src/config/config.php';

header('Content-Type: application/json'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['success' => false, 'message' => 'Invalid JSON data.']);
        exit;
    }

    $asset_name = $data['asset_name'] ?? null;
    $category = $data['category'] ?? null;
    $assigned_to = $data['assigned_to'] ?? null;
    $due_date = $data['due_date'] ?? null;
    $status = $data['status'] ?? 'overdue';

    if (!$asset_name || !$category || !$assigned_to || !$due_date) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO overdue_assets (asset_name, category, assigned_to, due_date, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $asset_name, $category, $assigned_to, $due_date, $status);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Overdue asset added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add overdue asset.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>