<?php
include '../../../src/config/config.php';

session_start();
$username = $_SESSION['username'] ?? '';

if (empty($username)) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$totalAssetsCount = 0;
$availableAssetsCount = 0;
$underMaintenanceStockCount = 0;
$disposeAssetsCount = 0;

try {
    $sql = "SELECT COUNT(*) AS count FROM assetdetails";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalAssetsCount = $row['count'];
    
    $sql = "SELECT SUM(stock) AS totalStock FROM assetdetails WHERE stock > 0";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $availableAssetsCount = $row['totalStock'];
    
        $sql = "SELECT SUM(stock) AS totalStockUnderMaintenance FROM assetdetails WHERE status = 'Under Maintenance'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $underMaintenanceStockCount = $row['totalStockUnderMaintenance'];

    $sql = "SELECT COUNT(*) AS count FROM assetdetails WHERE status = 'Dispose'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $disposeAssetsCount = $row['count'];

    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
}

$conn->close();

$response = [
    'totalAssetsCount' => $totalAssetsCount,
    'availableAssetsCount' => $availableAssetsCount,
    'underMaintenanceStockCount' => $underMaintenanceStockCount,
    'disposeAssetsCount' => $disposeAssetsCount
];

echo json_encode($response);
?>