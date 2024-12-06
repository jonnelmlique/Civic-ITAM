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

    try {
        $insertStmt = $conn->prepare("INSERT INTO tickets (subject, description, category, status, createdby) 
                                      VALUES (?, ?, ?, ?, ?)");
        $insertStmt->bind_param('sssss', $subject, $description, $category, $status, $createdBy);

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