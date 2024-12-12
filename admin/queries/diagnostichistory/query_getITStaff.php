<?php
include('../../../src/config/config.php');

if (!$conn) {
    echo json_encode([
        'response' => 'Database connection failed.',
        'error' => mysqli_connect_error(),
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}

$sql = "SELECT * FROM employees WHERE role = 'itstaff'";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode([
        'response' => 'Query failed.',
        'error' => $conn->error,
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}

$staff = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $staff[] = $row;
    }
}

echo json_encode($staff);

$conn->close();
?>
