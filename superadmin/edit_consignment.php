<?php
include '../src/config/config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestid = $_POST['requestid'];
    $assetname = $_POST['assetname'];
    $category = $_POST['category'];
    $consignee = $_POST['consignee'];
    $status = $_POST['status'];
    $sql = "UPDATE assetrequests SET 
                assetname = ?, 
                category = ?, 
                reason = ?, 
                status = ?
                WHERE requestid = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $assetname, $category, $consignee, $status, $requestid);

    if ($stmt->execute()) {
        header('Location: consignment.php');
        exit;
    } else {
        echo "Error updating the record: " . $conn->error;
    }
    $stmt->close();
}
?>
