<?php
include '../../../src/config/config.php';

session_start();
$username = $_SESSION['username'] ?? '';

if (empty($username)) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$myAssetsCount = 0;
$myTicketsCount = 0;
$pendingAssetsCount = 0;

try {
    $sql = "SELECT COUNT(*) AS count FROM assetrequests WHERE requestedby = ? AND status = 'Received'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $myAssetsCount = $row['count'];

    $sql = "SELECT COUNT(*) AS count FROM tickets WHERE createdby = ? OR assignedto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $myTicketsCount = $row['count'];

    $sql = "SELECT COUNT(*) AS count FROM assetrequests WHERE requestedby = ? AND status = 'Pending'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $pendingAssetsCount = $row['count'];

    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
}

$conn->close();

$response = [
    'myAssetsCount' => $myAssetsCount,
    'myTicketsCount' => $myTicketsCount,
    'pendingAssetsCount' => $pendingAssetsCount
];

echo json_encode($response);
?>