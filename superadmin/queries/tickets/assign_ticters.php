<?php
include '../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticketId = $_POST['ticketId']; 
    $assignedTo = $_POST['assignedTo']; 

    $ticketId = htmlspecialchars($ticketId);
    $assignedTo = htmlspecialchars($assignedTo);

    $sql = "UPDATE tickets SET assignedto = ? WHERE ticketid = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $assignedTo, $ticketId);

        if ($stmt->execute()) {
            echo "Ticket updated successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>