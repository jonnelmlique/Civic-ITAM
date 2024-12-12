<?php
include '../../../src/config/config.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assetId = $_POST['editAssetId'];
    $assetName = htmlspecialchars($_POST['editAssetName']);
    $category = htmlspecialchars($_POST['editCategory']);
    $stock = $_POST['editStock'];
    $description = htmlspecialchars($_POST['editDescription']);
    $supplier = htmlspecialchars($_POST['editSupplier']);
    $purchaseDate = $_POST['editPurchaseDate'];
    $invoiceNumber = htmlspecialchars($_POST['editInvoiceNumber']);
    $amount = $_POST['editAmount'];
    $warranty = htmlspecialchars($_POST['editWarranty']);
    $status = htmlspecialchars($_POST['editStatus']);
    $location = htmlspecialchars($_POST['editLocation']);
    $createdBy = htmlspecialchars($_POST['editCreatedBy']);
    $lifespan = $_POST['editLifespan'];

    $sql = "UPDATE assetdetails SET 
            assetname = '$assetName', 
            category = '$category', 
            stock = '$stock', 
            description = '$description', 
            supplier = '$supplier', 
            purchasedate = '$purchaseDate', 
            invoicenumber = '$invoiceNumber', 
            amount = '$amount', 
            warranty = '$warranty', 
            status = '$status', 
            location = '$location', 
            createdby = '$createdBy', 
            lifespan = '$lifespan' 
            WHERE id = '$assetId'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'success' => true,
            'message' => 'Asset updated successfully!'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $conn->error
        ]);
    }

    $conn->close();
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}

exit;
?>