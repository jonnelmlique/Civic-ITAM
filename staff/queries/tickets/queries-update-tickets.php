<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $ticketId = isset($_POST['ticketId']) ? intval($_POST['ticketId']) : 0;
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
    $category = isset($_POST['category']) ? htmlspecialchars(trim($_POST['category'])) : '';
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';

    // Check for missing or invalid data
    if ($ticketId === 0 || empty($subject) || empty($category) || empty($description)) {
        echo json_encode(['success' => false, 'message' => 'Invalid or missing input data.']);
        exit;
    }

    // Prepare the SQL query
    $sql = "UPDATE tickets SET subject = ?, category = ?, description = ?, lastupdated = NOW() WHERE ticketid = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL statement.']);
        exit;
    }

    $stmt->bind_param('sssi', $subject, $category, $description, $ticketId);

    // Execute the statement and return the result
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Ticket updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update ticket.']);
    }

    // Close resources
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>