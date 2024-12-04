<?php
include '../../src/config/config.php';

header('Content-Type: application/json');

try {
    $stmt = $conn->prepare("SELECT COUNT(*) AS totalUsers FROM employees");
    $stmt->execute();
    $result = $stmt->get_result();
    $totalUsers = $result->fetch_assoc()['totalUsers'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS activatedUsers FROM employees WHERE status = 'activated'");
    $stmt->execute();
    $result = $stmt->get_result();
    $activatedUsers = $result->fetch_assoc()['activatedUsers'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS deactivatedUsers FROM employees WHERE status = 'deactivated'");
    $stmt->execute();
    $result = $stmt->get_result();
    $deactivatedUsers = $result->fetch_assoc()['deactivatedUsers'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS adminUsers FROM employees WHERE role = 'admin'");
    $stmt->execute();
    $result = $stmt->get_result();
    $adminUsers = $result->fetch_assoc()['adminUsers'];

    echo json_encode([
        'totalUsers' => $totalUsers,
        'activatedUsers' => $activatedUsers,
        'deactivatedUsers' => $deactivatedUsers,
        'adminUsers' => $adminUsers
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}