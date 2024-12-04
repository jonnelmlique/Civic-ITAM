<?php
include '../src/config/config.php';

header('Content-Type: application/json'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit;
    }

    try {
        // Prepare the query to check if the email exists in the database
        $stmt = $conn->prepare("SELECT id, email, password, role, status FROM employees WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the email is found
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if the account is activated
            if (strtolower($user['status']) != 'activated') {
                echo json_encode(['success' => false, 'message' => 'The account is deactivated.']);
                exit;
            }

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Start a session and set user details in session variables
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['status'] = $user['status'];

                // Send success response with the role
                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful.',
                    'role' => $user['role']
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid password.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Email not found.']);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>