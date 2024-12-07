<?php
include '../../src/config/config.php';

// Fetch ticket data
$sql = "SELECT ticketid, subject, category, status, lastupdated, createdby FROM tickets ORDER BY lastupdated DESC";
$result = $conn->query($sql);

$tickets = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($tickets);
$conn->close();
?>