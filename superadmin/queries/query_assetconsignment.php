<?php
include('../../src/config/config.php');

if (!$conn) {
    die(json_encode(['response' => 'Connection failed: ' . mysqli_connect_error(), 'status' => 500, 'response_type' => 'error']));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'add':
            $reference = $_POST['reference'];
            $consignment_id = $_POST['consignmentId'];
            $query = "INSERT INTO assetconsignment (reference, consignmentId) VALUES ('$reference', '$consignment_id')";
            
            if (mysqli_query($conn, $query)) {
                echo json_encode(['response' => 'Asset Consignment added successfully', 'status' => 200, 'response_type' => 'success']);
            } else {
                echo json_encode(['response' => 'Error: ' . mysqli_error($conn), 'status' => 500, 'response_type' => 'error']);
            }
            break;

        case 'delete':
            $id = $_POST['id'];
            $query = "DELETE FROM assetconsignment WHERE id='$id'";
            
            if (mysqli_query($conn, $query)) {
                echo json_encode(['response' => 'Asset Consignment deleted successfully', 'status' => 200, 'response_type' => 'success']);
            } else {
                echo json_encode(['response' => 'Error: ' . mysqli_error($conn), 'status' => 500, 'response_type' => 'error']);
            }
            break;

        case 'update':
            $id = $_POST['id'];
            $reference = $_POST['reference'];
            $consignment_id = $_POST['consignmentId'];
            $query = "UPDATE assetconsignment SET reference='$reference', consignmentId='$consignment_id' WHERE id='$id'";
            
            if (mysqli_query($conn, $query)) {
                echo json_encode(['response' => 'Asset Consignment updated successfully', 'status' => 200, 'response_type' => 'success']);
            } else {
                echo json_encode(['response' => 'Error: ' . mysqli_error($conn), 'status' => 500, 'response_type' => 'error']);
            }
            break;

        default:
            echo json_encode(['response' => 'Invalid action', 'status' => 400, 'response_type' => 'error']);
            break;
    }
    
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT id, reference, consignmentId, assetdetailsid FROM assetconsignment";
    $result = $conn->query($sql);

    if (!$result) {
        die(json_encode(['response' => 'Error executing query: ' . $conn->error, 'status' => 500, 'response_type' => 'error']));
    }

    $assets = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $assets[] = $row;
        }
    }

    echo json_encode($assets);
} else {
    echo json_encode(['response' => 'Invalid request method', 'status' => 405, 'response_type' => 'error']);
}

mysqli_close($conn);
?>
