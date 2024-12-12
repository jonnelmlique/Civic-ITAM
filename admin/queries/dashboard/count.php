<?php
session_start(); // Start the session

include('../../../src/config/config.php');

// Check if the session variable 'username' is set
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$username = $_SESSION['username']; 

// Separate count queries for assets and tickets based on the logged-in user

// Count total assets assigned to the logged-in user
$total_assets_sql = "SELECT COUNT(*) AS total_assets FROM assetdetails WHERE assignedto = ?";
$total_assets_stmt = $conn->prepare($total_assets_sql);
$total_assets_stmt->bind_param("s", $username);
$total_assets_stmt->execute();
$total_assets_result = $total_assets_stmt->get_result();
$total_assets = 0;
if ($total_assets_result && $total_assets_result->num_rows > 0) {
    $total_assets_row = $total_assets_result->fetch_assoc();
    $total_assets = $total_assets_row['total_assets'];
}

// Count resolved tickets assigned to the logged-in user
$resolved_tickets_sql = "SELECT COUNT(*) AS resolved_tickets FROM tickets WHERE assignedto = ? AND status = 'Solved'";
$resolved_tickets_stmt = $conn->prepare($resolved_tickets_sql);
$resolved_tickets_stmt->bind_param("s", $username);
$resolved_tickets_stmt->execute();
$resolved_tickets_result = $resolved_tickets_stmt->get_result();
$resolved_tickets = 0;
if ($resolved_tickets_result && $resolved_tickets_result->num_rows > 0) {
    $resolved_tickets_row = $resolved_tickets_result->fetch_assoc();
    $resolved_tickets = $resolved_tickets_row['resolved_tickets'];
}

// Count pending tickets assigned to the logged-in user
$pending_tickets_sql = "SELECT COUNT(*) AS pending_tickets FROM tickets WHERE assignedto = ? AND status = 'Open'";
$pending_tickets_stmt = $conn->prepare($pending_tickets_sql);
$pending_tickets_stmt->bind_param("s", $username);
$pending_tickets_stmt->execute();
$pending_tickets_result = $pending_tickets_stmt->get_result();
$pending_tickets = 0;
if ($pending_tickets_result && $pending_tickets_result->num_rows > 0) {
    $pending_tickets_row = $pending_tickets_result->fetch_assoc();
    $pending_tickets = $pending_tickets_row['pending_tickets'];
}

// Count overdue tickets assigned to the logged-in user
$overdue_tickets_sql = "SELECT COUNT(*) AS overdue_tickets FROM tickets WHERE assignedto = ? AND status = 'Overdue'";
$overdue_tickets_stmt = $conn->prepare($overdue_tickets_sql);
$overdue_tickets_stmt->bind_param("s", $username);
$overdue_tickets_stmt->execute();
$overdue_tickets_result = $overdue_tickets_stmt->get_result();
$overdue_tickets = 0;
if ($overdue_tickets_result && $overdue_tickets_result->num_rows > 0) {
    $overdue_tickets_row = $overdue_tickets_result->fetch_assoc();
    $overdue_tickets = $overdue_tickets_row['overdue_tickets'];
}

$conn->close();

// Prepare counts array
$counts = [
    'total_assets' => $total_assets,
    'resolved_tickets' => $resolved_tickets,
    'pending_tickets' => $pending_tickets,
    'overdue_tickets' => $overdue_tickets
];

// Send the results as a JSON response
echo json_encode($counts);
?>
