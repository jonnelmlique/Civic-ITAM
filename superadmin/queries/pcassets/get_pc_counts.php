<?php
include '../../../src/config/config.php';

$sql = "SELECT 
            COUNT(*) AS total_pcs, 
            SUM(CASE WHEN assignedpc IS NULL THEN 1 ELSE 0 END) AS available_pcs,
            SUM(CASE WHEN assignedpc IS NOT NULL THEN 1 ELSE 0 END) AS assigned_pcs
        FROM pcassets";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = [
        'total_pcs' => $row['total_pcs'],
        'available_pcs' => $row['available_pcs'],
        'assigned_pcs' => $row['assigned_pcs']
    ];
} else {
    $data = [
        'total_pcs' => 0,
        'available_pcs' => 0,
        'assigned_pcs' => 0
    ];
}

$conn->close();

echo json_encode($data);
?>