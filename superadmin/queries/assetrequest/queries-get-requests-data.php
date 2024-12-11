<?php
include '../../../src/config/config.php';

session_start();
$username = $_SESSION['username'] ?? '';

if (empty($username)) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$response = [
    'totalRequests' => 0,
    'approvedRequests' => 0,
    'pendingRequests' => 0,
    'declinedRequests' => 0
];

try {
    // Remove the 'WHERE requestedby = ?' clause to count all requests
    $sql = "SELECT 
                COUNT(*) AS totalRequests,
                SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approvedRequests,
                SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pendingRequests,
                SUM(CASE WHEN status = 'Declined' THEN 1 ELSE 0 END) AS declinedRequests
            FROM assetrequests";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare SQL statement.");
    }

    $stmt->execute();
    $stmt->bind_result($totalRequests, $approvedRequests, $pendingRequests, $declinedRequests);
    $stmt->fetch();

    $response['totalRequests'] = $totalRequests;
    $response['approvedRequests'] = $approvedRequests;
    $response['pendingRequests'] = $pendingRequests;
    $response['declinedRequests'] = $declinedRequests;

    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
}

$conn->close();

echo json_encode($response);
?>
