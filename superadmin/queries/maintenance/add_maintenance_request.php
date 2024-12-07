<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maintenanceName = $_POST['maintenanceName'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $assignedTo = $_POST['assignedTo'];
    $remarks = $_POST['remarks'];

    $stmt = $conn->prepare("INSERT INTO maintenance_requests (maintenance_name, category, status, assigned_to, remarks) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $maintenanceName, $category, $status, $assignedTo, $remarks);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Maintenance request added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add maintenance request."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>