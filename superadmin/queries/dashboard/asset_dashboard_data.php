<?php
include('../../../src/config/config.php');

$sql = "
SELECT 
    (SELECT COUNT(*) FROM assetdetails) AS total_assets,
    (SELECT COUNT(*) FROM tickets WHERE status = 'Solved') AS resolved_tickets,
    (SELECT COUNT(*) FROM tickets WHERE status = 'Open') AS pending_tickets,
    (SELECT COUNT(*) FROM tickets WHERE status = 'Overdue') AS overdue_tickets
";

$result = $conn->query($sql);
$counts = [];

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $counts['total_assets'] = $row['total_assets'];
    $counts['resolved_tickets'] = $row['resolved_tickets'];
    $counts['pending_tickets'] = $row['pending_tickets'];
    $counts['overdue_tickets'] = $row['overdue_tickets'];
}

$growth_sql = "
SELECT 
    MONTHNAME(createDate) AS month,
    COUNT(*) AS total
FROM assetdetails
WHERE createDate BETWEEN DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOW()
GROUP BY MONTH(createDate)
ORDER BY createDate
";

$growth_result = $conn->query($growth_sql);
$asset_growth = ['labels' => [], 'data' => []];
while ($row = $growth_result->fetch_assoc()) {
    $asset_growth['labels'][] = $row['month'];
    $asset_growth['data'][] = (int)$row['total'];
}

$distribution_sql = "
SELECT category, COUNT(*) AS total
FROM assetdetails
GROUP BY category
";

$distribution_result = $conn->query($distribution_sql);
$asset_distribution = ['labels' => [], 'data' => []];
while ($row = $distribution_result->fetch_assoc()) {
    $asset_distribution['labels'][] = $row['category'];
    $asset_distribution['data'][] = (int)$row['total'];
}

$conn->close();

// Combine all the data into one array
$counts['asset_growth'] = $asset_growth;
$counts['asset_distribution'] = $asset_distribution;

// Return the data as JSON
echo json_encode($counts);
?>