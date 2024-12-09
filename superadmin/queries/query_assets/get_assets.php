<?php
include '../../../src/config/config.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$start_from = ($page - 1) * $records_per_page;

$sql = "SELECT COUNT(*) as total FROM assetdetails";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_records = $row['total'];

$sql = "SELECT * FROM assetdetails ORDER BY createDate DESC LIMIT $start_from, $records_per_page";
$result = $conn->query($sql);

$assets = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $assets[] = $row;
    }
}

$total_pages = ceil($total_records / $records_per_page);

echo json_encode([
    'assets' => $assets,
    'total_pages' => $total_pages
]);

$conn->close();
?>