<?php
include '../src/config/config.php';

header('Content-Type: application/json'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit;
    }

    try {
        $stmt = $conn->prepare("SELECT id, email, username, password, role, status, failed_attempts, lock_time FROM employees WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $currentTime = time();
            $lockDuration = 50; 
            $isLocked = $user['lock_time'] && ($currentTime - $user['lock_time']) < $lockDuration;

           
            if ($isLocked) {
                $remainingTime = $lockDuration - ($currentTime - $user['lock_time']);
                echo json_encode(['success' => false, 'message' => 'Account locked due to many failed attempts. Please try again after ' . $remainingTime . ' second(s).']);
                exit;
            }

            if (strtolower($user['status']) !== 'activated') {
                echo json_encode(['success' => false, 'message' => 'The account is deactivated.']);
                exit;
            }

            if (password_verify($password, $user['password'])) {
                $resetStmt = $conn->prepare("UPDATE employees SET failed_attempts = 0, lock_time = NULL WHERE email = ?");
                $resetStmt->bind_param('s', $email);
                $resetStmt->execute();
                $resetStmt->close();

                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['status'] = $user['status'];

                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful.',
                    'role' => $user['role']
                ]);
            } else {
                $newFailedAttempts = $user['failed_attempts'] + 1;
                $lockTime = $newFailedAttempts >= 5 ? time() : null;  

                $updateStmt = $conn->prepare("UPDATE employees SET failed_attempts = ?, lock_time = ? WHERE email = ?");
                $updateStmt->bind_param('iss', $newFailedAttempts, $lockTime, $email);
                $updateStmt->execute();
                $updateStmt->close();

                if ($newFailedAttempts >= 5) {
                    echo json_encode(['success' => false, 'message' => 'Too many failed attempts. Your account is now locked.']);
                } else {
                    $remainingAttempts = 5 - $newFailedAttempts;
                    echo json_encode(['success' => false, 'message' => "Invalid password. You have $remainingAttempts attempt(s) left."]);
                }
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Email not found.']);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
    } finally {
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>