<?php
include '../../../src/config/config.php';

$totalTicketsQuery = "SELECT COUNT(*) AS total FROM tickets";
$totalTicketsResult = $conn->query($totalTicketsQuery);
$totalTickets = $totalTicketsResult->fetch_assoc()['total'];

$resolvedTicketsQuery = "SELECT COUNT(*) AS resolved FROM tickets WHERE status = 'Resolved'";
$resolvedTicketsResult = $conn->query($resolvedTicketsQuery);
$resolvedTickets = $resolvedTicketsResult->fetch_assoc()['resolved'];

$openTicketsQuery = "SELECT COUNT(*) AS open FROM tickets WHERE status = 'Open'";
$openTicketsResult = $conn->query($openTicketsQuery);
$openTickets = $openTicketsResult->fetch_assoc()['open'];

$overdueTicketsQuery = "SELECT COUNT(*) AS overdue FROM tickets WHERE status = 'Overdue'";
$overdueTicketsResult = $conn->query($overdueTicketsQuery);
$overdueTickets = $overdueTicketsResult->fetch_assoc()['overdue'];

$conn->close();

echo json_encode([
    'total' => $totalTickets,
    'resolved' => $resolvedTickets,
    'open' => $openTickets,
    'overdue' => $overdueTickets
]);

?>