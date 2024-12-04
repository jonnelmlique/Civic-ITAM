<?php
include '../../../src/config/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contact_number'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $checkStmt = $conn->prepare("SELECT id, username, email FROM employees WHERE (username = ? OR email = ?) AND id != ?");
    $checkStmt->bind_param('ssi', $username, $email, $userId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    $usernameExists = false;
    $emailExists = false;

    while ($row = $result->fetch_assoc()) {
        if ($row['username'] === $username) {
            $usernameExists = true;
        }
        if ($row['email'] === $email) {
            $emailExists = true;
        }
    }

    if ($usernameExists && $emailExists) {
        echo json_encode(['success' => false, 'message' => 'Both the username and email already exist.']);
    } elseif ($usernameExists) {
        echo json_encode(['success' => false, 'message' => 'The username already exists.']);
    } elseif ($emailExists) {
        echo json_encode(['success' => false, 'message' => 'The email already exists.']);
    } else {
        $sql = "UPDATE employees 
                SET first_name = ?, last_name = ?, username = ?, email = ?, 
                    contactnumber = ?, department = ?, role = ?, status = ? 
                WHERE id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('ssssssssi', $firstName, $lastName, $username, $email, 
                              $contactNumber, $department, $role, $status, $userId);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'User updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error updating user.']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error preparing the query.']);
        }
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>