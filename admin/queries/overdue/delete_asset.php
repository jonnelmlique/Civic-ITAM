<?php
include '../../../src/config/config.php';

$assetId = $_GET['id'];

$query = "DELETE FROM overdue_assets WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $assetId);

if ($stmt->execute()) {
    header('Location: ./superadmin/overdue.php'); 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>