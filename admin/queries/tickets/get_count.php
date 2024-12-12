<?php
session_start(); // Start the session

include '../../../src/config/config.php';

if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$username = $_SESSION['username'];

$totalTicketsQuery = "SELECT COUNT(*) AS total FROM tickets WHERE assignedto = ? OR createdby = ?";
$totalTicketsStmt = $conn->prepare($totalTicketsQuery);
$totalTicketsStmt->bind_param("ss", $username, $username);
$totalTicketsStmt->execute();
$totalTicketsResult = $totalTicketsStmt->get_result();
$totalTickets = $totalTicketsResult->fetch_assoc()['total'];

$resolvedTicketsQuery = "SELECT COUNT(*) AS resolved FROM tickets WHERE (assignedto = ? OR createdby = ?) AND status = 'Solved'";
$resolvedTicketsStmt = $conn->prepare($resolvedTicketsQuery);
$resolvedTicketsStmt->bind_param("ss", $username, $username);
$resolvedTicketsStmt->execute();
$resolvedTicketsResult = $resolvedTicketsStmt->get_result();
$resolvedTickets = $resolvedTicketsResult->fetch_assoc()['resolved'];

$openTicketsQuery = "SELECT COUNT(*) AS open FROM tickets WHERE (assignedto = ? OR createdby = ?) AND status = 'Open'";
$openTicketsStmt = $conn->prepare($openTicketsQuery);
$openTicketsStmt->bind_param("ss", $username, $username);
$openTicketsStmt->execute();
$openTicketsResult = $openTicketsStmt->get_result();
$openTickets = $openTicketsResult->fetch_assoc()['open'];

$overdueTicketsQuery = "SELECT COUNT(*) AS overdue FROM tickets WHERE (assignedto = ? OR createdby = ?) AND status = 'Overdue'";
$overdueTicketsStmt = $conn->prepare($overdueTicketsQuery);
$overdueTicketsStmt->bind_param("ss", $username, $username);
$overdueTicketsStmt->execute();
$overdueTicketsResult = $overdueTicketsStmt->get_result();
$overdueTickets = $overdueTicketsResult->fetch_assoc()['overdue'];

$conn->close();

echo json_encode([
    'total' => $totalTickets,
    'resolved' => $resolvedTickets,
    'open' => $openTickets,
    'overdue' => $overdueTickets
]);
?>
