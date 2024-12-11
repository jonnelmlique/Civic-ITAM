<?php
include '../src/config/config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['requestid'], $_POST['action'])) {
    $requestId = intval($_POST['requestid']);
    $action = $_POST['action'];

    $status = '';
    if ($action === 'Approved') {
        $status = 'Approved';
    } elseif ($action === 'Declined') {
        $status = 'Declined';
    }

    if (!empty($status)) {
        $sqlRequest = "SELECT assetid FROM assetrequests WHERE requestid = ?";
        $stmtRequest = $conn->prepare($sqlRequest);
        if ($stmtRequest) {
            $stmtRequest->bind_param("i", $requestId);
            $stmtRequest->execute();
            $resultRequest = $stmtRequest->get_result();
            if ($resultRequest && $resultRequest->num_rows > 0) {
                $requestData = $resultRequest->fetch_assoc();
                $assetId = $requestData['assetid'];
            } else {
                echo "<script>alert('Request not found.');</script>";
                exit();
            }
            $stmtRequest->close();

            $sqlAssetDetails = "SELECT stock FROM assetdetails WHERE id = ?";
            $stmtAsset = $conn->prepare($sqlAssetDetails);
            if ($stmtAsset) {
                $stmtAsset->bind_param("i", $assetId);
                $stmtAsset->execute();
                $resultAsset = $stmtAsset->get_result();
                if ($resultAsset && $resultAsset->num_rows > 0) {
                    $assetData = $resultAsset->fetch_assoc();
                    $currentStock = $assetData['stock'];

                    // Check if there is enough stock before approving
                    if ($status === 'Approved' && $currentStock > 0) {
                        // Update the stock in assetdetails by decreasing the stock by 1
                        $newStock = $currentStock - 1;
                        $sqlUpdateStock = "UPDATE assetdetails SET stock = ? WHERE id = ?";
                        $stmtUpdateStock = $conn->prepare($sqlUpdateStock);
                        if ($stmtUpdateStock) {
                            $stmtUpdateStock->bind_param("ii", $newStock, $assetId);
                            $stmtUpdateStock->execute();
                            $stmtUpdateStock->close();
                        } else {
                            echo "<script>alert('Error updating asset stock: " . $conn->error . "');</script>";
                        }
                    } elseif ($status === 'Approved' && $currentStock <= 0) {
                        // Display a JavaScript error if stock is 0 or less
                        echo "<script>alert('The stock for this asset is already 0. Cannot approve the request.');</script>";
                        exit();
                    }

                    // Update the status of the asset request
                    $sqlUpdateRequest = "UPDATE assetrequests SET status = ? WHERE requestid = ?";
                    $stmtUpdateRequest = $conn->prepare($sqlUpdateRequest);
                    if ($stmtUpdateRequest) {
                        $stmtUpdateRequest->bind_param("si", $status, $requestId);
                        if ($stmtUpdateRequest->execute()) {
                            echo "<script>window.location.href = './assetsrequest.php?msg=Status updated successfully';</script>";
                            exit();
                        } else {
                            echo "<script>alert('Error updating status: " . $stmtUpdateRequest->error . "');</script>";
                        }
                        $stmtUpdateRequest->close();
                    } else {
                        echo "<script>alert('Error preparing SQL for asset request update: " . $conn->error . "');</script>";
                    }
                } else {
                    echo "<script>alert('Asset not found in asset details.');</script>";
                }
                $stmtAsset->close();
            } else {
                echo "<script>alert('Error preparing SQL for asset details: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error preparing SQL for asset request retrieval: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Invalid action.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
}
?>
