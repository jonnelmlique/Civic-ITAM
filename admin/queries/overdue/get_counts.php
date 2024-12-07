<?php
include('../../../src/config/config.php');

$sql = "
SELECT 
    COUNT(CASE WHEN status = 'overdue' THEN 1 END) AS total_overdue_assets,
    COUNT(CASE WHEN status = 'maintenance' THEN 1 END) AS under_maintenance,
    COUNT(CASE WHEN status = 'returned' THEN 1 END) AS awaiting_return,
    COUNT(CASE WHEN status NOT IN ('overdue', 'maintenance', 'returned') THEN 1 END) AS other_issues
FROM overdue_assets";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $counts = [
        'total_overdue_assets' => $row['total_overdue_assets'],
        'under_maintenance' => $row['under_maintenance'],
        'awaiting_return' => $row['awaiting_return'],
        'other_issues' => $row['other_issues']
    ];
} else {
    $counts = [
        'total_overdue_assets' => 0,
        'under_maintenance' => 0,
        'awaiting_return' => 0,
        'other_issues' => 0
    ];
}

$conn->close();

// Debugging: Output the JSON response to ensure the data is correct
header('Content-Type: application/json');
echo json_encode($counts);
?>