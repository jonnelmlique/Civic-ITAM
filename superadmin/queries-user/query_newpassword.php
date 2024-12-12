<?php
include('../../src/config/config.php');

if (!$conn) {
    echo json_encode([
        'response' => 'Database connection failed.',
        'error' => mysqli_connect_error(),
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['newPassword'], $_POST['confirmPassword'])) {

    $userID = $_POST['id'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // echo $newPassword. ', ' .$userID .', '. $confirmPassword;exit;


    if ($newPassword !== $confirmPassword) {
        echo json_encode([
            'response' => 'Passwords do not match.',
            'status' => 400,
            'response_type' => 'error'
        ]);
        exit;
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE employees SET password = '$hashedPassword' WHERE id = '$userID'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'response' => 'Password updated successfully.',
            'status' => 200,
            'response_type' => 'success'
        ]);
    } else {
        echo json_encode([
            'response' => 'Failed to update password.',
            'error' => $conn->error,
            'status' => 500,
            'response_type' => 'error'
        ]);
    }

} else {
    echo json_encode([
        'response' => 'Invalid request or missing parameters.',
        'status' => 400,
        'response_type' => 'error'
    ]);
}

$conn->close();
?>
