<?php

include '../../src/config/config.php';

header('Content-Type: application/json'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];  
    $contactNumber = htmlspecialchars($_POST['contactNumber']);
    $department = htmlspecialchars($_POST['department']);
    $role = htmlspecialchars($_POST['role']);
    $status = htmlspecialchars($_POST['status']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $checkStmt = $conn->prepare("SELECT username, email FROM employees WHERE username = ? OR email = ?");
        $checkStmt->bind_param('ss', $username, $email);
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
            $stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, username, email, password, contactnumber, department, role, status) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssssss', $firstName, $lastName, $username, $email, $hashedPassword, $contactNumber, $department, $role, $status);

            if ($stmt->execute()) {
                $newUserId = $conn->insert_id;

                $newUserQuery = "SELECT id, first_name, last_name, username, email, contactnumber, department, role, status FROM employees WHERE id = ?";
                $newUserStmt = $conn->prepare($newUserQuery);
                $newUserStmt->bind_param('i', $newUserId);
                $newUserStmt->execute();
                $newUserResult = $newUserStmt->get_result();
                $newUserData = $newUserResult->fetch_assoc();

                echo json_encode([
                    'success' => true,
                    'message' => 'User added successfully',
                    'data' => $newUserData 
                ]);
            } else {
                throw new Exception('Error: Unable to save user data.');
            }
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        if (isset($checkStmt)) $checkStmt->close();
        if (isset($stmt)) $stmt->close();
        if (isset($newUserStmt)) $newUserStmt->close();
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

?>