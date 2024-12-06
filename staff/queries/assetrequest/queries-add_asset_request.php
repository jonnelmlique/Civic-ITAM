<?php
include '../../../src/config/config.php';

session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assetName = $_POST['assetName'];
    $category = $_POST['category'];
    $reason = $_POST['reason'];
    $requestedBy = $_POST['requestedBy'];

    $sql = "INSERT INTO assetrequests (assetname, category, reason, requestedby) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ssss', $assetName, $category, $reason, $requestedBy);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Asset request submitted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to submit the request.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error.']);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

?>