<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ticketId'])) {
    $ticketId = intval($_POST['ticketId']);

    $sql = "SELECT status FROM tickets WHERE ticketid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $ticketId);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();

    if ($ticket['status'] == 'Closed') {
        echo json_encode(['success' => false, 'message' => 'This ticket is already closed.']);
    } else {
        $sql = "UPDATE tickets SET status = 'Closed', lastupdated = NOW() WHERE ticketid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $ticketId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Ticket closed successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to close the ticket.']);
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>