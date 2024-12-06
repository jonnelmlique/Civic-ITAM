<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ticketId = isset($_POST['ticketId']) ? intval($_POST['ticketId']) : 0;
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
    $category = isset($_POST['category']) ? htmlspecialchars(trim($_POST['category'])) : '';
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';

    if ($ticketId === 0 || empty($subject) || empty($category) || empty($description)) {
        echo json_encode(['success' => false, 'message' => 'Invalid or missing input data.']);
        exit;
    }

    $sql = "UPDATE tickets SET subject = ?, category = ?, description = ?, lastupdated = NOW() WHERE ticketid = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL statement.']);
        exit;
    }

    $stmt->bind_param('sssi', $subject, $category, $description, $ticketId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Ticket updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update ticket.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>