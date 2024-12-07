<?php
include '../../../src/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asset_id = $_POST['asset_id'];
    $asset_name = $_POST['asset_name'];
    $category = $_POST['category'];
    $assigned_to = $_POST['assigned_to'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    $sql = "UPDATE overdue_assets SET asset_name = ?, category = ?, assigned_to = ?, due_date = ?, status = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $asset_name, $category, $assigned_to, $due_date, $status, $asset_id);

        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'The asset details have been successfully updated.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'There was an error updating the asset.'
            ]);
        }

        $stmt->close();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to prepare the update query.'
        ]);
    }

    $conn->close();
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
?>