<?php
include '../../../src/config/config.php';

$category = '';

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $category = $_POST['category'];

    $sql = "SELECT id, assetname 
            FROM assetdetails 
            WHERE category = ? AND stock > 0 AND status = 'Available'";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $assets = [];
    while ($row = $result->fetch_assoc()) {
        $assets[] = [
            'id' => $row['id'],
            'name' => $row['assetname']
        ];
    }

    if (!empty($assets)) {
        echo json_encode($assets); 
    } else {
        echo json_encode(['error' => 'No available assets found for this category']);
    }
} else {
    echo json_encode(['error' => 'Category not selected']);
}
?>
