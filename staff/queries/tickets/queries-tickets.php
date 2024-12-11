<?php

include '../../../src/config/config.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = htmlspecialchars($_POST['subject']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $status = 'Open'; 
    $createdBy = $_SESSION['username'];

    if ($category == 'Hardware Issues') {
        $department = 'IT Support';
    } elseif ($category == 'Network Infrastructure') {
        $department = 'Infrastructure';
    } else {
        $department = '';
    }

    try {
        $employeeStmt = $conn->prepare("SELECT username FROM employees WHERE department = ? AND status = 'Activated' ORDER BY RAND() LIMIT 1");
        $employeeStmt->bind_param('s', $department);
        $employeeStmt->execute();
        $employeeStmt->bind_result($assignedTo);
        $employeeStmt->fetch();
        $employeeStmt->close();

        if (!$assignedTo) {
            throw new Exception('No active employee found for the selected department.');
        }

        $insertStmt = $conn->prepare("INSERT INTO tickets (subject, description, category, status, createdby, assignedto) 
                                      VALUES (?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param('ssssss', $subject, $description, $category, $status, $createdBy, $assignedTo);

        if ($insertStmt->execute()) {
            $ticketId = $conn->insert_id;
            $lastUpdated = date("Y-m-d H:i:s"); 

            echo json_encode([
                'success' => true,
                'message' => 'Ticket created successfully!',
                'data' => [
                    'TicketID' => $ticketId,
                    'Subject' => $subject,
                    'Category' => $category,
                    'Status' => $status,
                    'AssignedTo' => $assignedTo,
                    'LastUpdated' => $lastUpdated,
                ]
            ]);
        } else {
            throw new Exception('Failed to create ticket.');
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        if (isset($insertStmt)) $insertStmt->close();   
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

?>
