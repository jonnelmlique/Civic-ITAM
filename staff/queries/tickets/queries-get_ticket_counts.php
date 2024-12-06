<?php
include '../../../src/config/config.php';

session_start();

$username = $_SESSION['username'] ?? '';  
if (empty($username)) {
    echo json_encode(['success' => false, 'message' => 'User is not logged in.']);
    exit;
}

$sql = "SELECT 
            COUNT(*) AS total_tickets,
            SUM(CASE WHEN status = 'Solved' THEN 1 ELSE 0 END) AS solved_tickets,
            SUM(CASE WHEN status = 'Open' THEN 1 ELSE 0 END) AS open_tickets,
            SUM(CASE WHEN status = 'Closed' THEN 1 ELSE 0 END) AS closed_tickets
        FROM tickets
        WHERE createdby = ?";  

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);  
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode([
    'totalTickets' => $data['total_tickets'],
    'solvedTickets' => $data['solved_tickets'],
    'openTickets' => $data['open_tickets'],
    'closedTickets' => $data['closed_tickets']
]);

$stmt->close();
$conn->close();
?>