<?php

include '../../../src/config/config.php';

header('Content-Type: application/json'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $assetCode = htmlspecialchars($_POST['assetCode']);
    $itemId = $_POST['itemId'];
    $assetname = htmlspecialchars($_POST['assetname']);
    $description = htmlspecialchars($_POST['description']);
    $itemtype = htmlspecialchars($_POST['category']);
    $serialNumber = htmlspecialchars($_POST['serialNumber']);
    $supplier = htmlspecialchars($_POST['supplier']);
    $purchaseDate = $_POST['purchaseDate'];
    $invoiceNumber = htmlspecialchars($_POST['invoiceNumber']);
    $amount = $_POST['amount'];
    $warranty = htmlspecialchars($_POST['warranty']);
    $category = htmlspecialchars($_POST['category']);
    $status = htmlspecialchars($_POST['status']);
    $location = htmlspecialchars($_POST['location']);
    $stock = $_POST['stock'];
    $createdBy = htmlspecialchars($_POST['createdBy']);
    $lifespan = $_POST['lifespan'];

    try {
        // Check if asset code already exists
        $checkStmt = $conn->prepare("SELECT assetcode FROM assetdetails WHERE assetcode = ?");
        $checkStmt->bind_param('s', $assetCode);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        $assetExists = false;
        if ($result->num_rows > 0) {
            $assetExists = true;
        }

        // Return error message if asset code already exists
        if ($assetExists) {
            echo json_encode(['success' => false, 'message' => 'The asset code already exists.']);
        } else {
            // Insert asset data
            $stmt = $conn->prepare("INSERT INTO assetdetails 
                (assetcode, itemid, assetname, description, itemtype, serialnumber, supplier, purchasedate, invoicenumber, amount, 
                warranty, category, status, location, stock, lifespan, createdby) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('sisssssssdsssssis', $assetCode, $itemId, $assetname, $description, $itemtype, $serialNumber, 
                $supplier, $purchaseDate, $invoiceNumber, $amount, $warranty, $category, $status, $location, $stock, $lifespan, $createdBy);

            if ($stmt->execute()) {
                // Fetch inserted asset details
                $newAssetId = $conn->insert_id;
                $newAssetQuery = "SELECT id, assetcode, itemid, assetname, description, itemtype, serialnumber, supplier, purchasedate, invoicenumber, amount, 
                                  warranty, category, status, location, stock, lifespan, createdby FROM assetdetails WHERE id = ?";
                $newAssetStmt = $conn->prepare($newAssetQuery);
                $newAssetStmt->bind_param('i', $newAssetId);
                $newAssetStmt->execute();
                $newAssetResult = $newAssetStmt->get_result();
                $newAssetData = $newAssetResult->fetch_assoc();

                echo json_encode([
                    'success' => true,
                    'message' => 'Asset added successfully',
                    'data' => $newAssetData 
                ]);
            } else {
                throw new Exception('Error: Unable to save asset data.');
            }
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        // Close connections
        if (isset($checkStmt)) $checkStmt->close();
        if (isset($stmt)) $stmt->close();
        if (isset($newAssetStmt)) $newAssetStmt->close();
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

?>