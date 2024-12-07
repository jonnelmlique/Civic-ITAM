<?php
include '../../../src/config/config.php';

// Query to get the total number of maintenance requests
$totalRequestsQuery = "SELECT COUNT(*) AS total FROM maintenance_requests";
$totalRequestsResult = $conn->query($totalRequestsQuery);
$totalRequests = $totalRequestsResult->fetch_assoc()['total'];

// Query to get the number of completed maintenance requests
$completedRequestsQuery = "SELECT COUNT(*) AS completed FROM maintenance_requests WHERE status = 'Completed'";
$completedRequestsResult = $conn->query($completedRequestsQuery);
$completedRequests = $completedRequestsResult->fetch_assoc()['completed'];

// Query to get the number of pending maintenance requests
$pendingRequestsQuery = "SELECT COUNT(*) AS pending FROM maintenance_requests WHERE status = 'Pending'";
$pendingRequestsResult = $conn->query($pendingRequestsQuery);
$pendingRequests = $pendingRequestsResult->fetch_assoc()['pending'];

// Query to get the number of maintenance requests in progress
$inProgressRequestsQuery = "SELECT COUNT(*) AS in_progress FROM maintenance_requests WHERE status = 'In Progress'";
$inProgressRequestsResult = $conn->query($inProgressRequestsQuery);
$inProgressRequests = $inProgressRequestsResult->fetch_assoc()['in_progress'];

// Query to get the number of overdue maintenance requests
$overdueRequestsQuery = "SELECT COUNT(*) AS overdue FROM maintenance_requests WHERE status = 'Overdue'";
$overdueRequestsResult = $conn->query($overdueRequestsQuery);
$overdueRequests = $overdueRequestsResult->fetch_assoc()['overdue'];

$conn->close();

// Return the counts as a JSON response
echo json_encode([
    'total' => $totalRequests,
    'completed' => $completedRequests,
    'pending' => $pendingRequests,
    'in_progress' => $inProgressRequests,
    'overdue' => $overdueRequests
]);
?>