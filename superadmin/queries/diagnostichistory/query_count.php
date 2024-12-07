<?php
include('../../../src/config/config.php');
 
// Query to get the total diagnoses
$totalDiagnosesQuery = "SELECT COUNT(*) AS total FROM diagnostichistory";
$totalResult = $conn->query($totalDiagnosesQuery);
$totalDiagnoses = $totalResult->fetch_assoc()['total'];

// Query to get the completed diagnoses
$completedDiagnosesQuery = "SELECT COUNT(*) AS completed FROM diagnostichistory WHERE status = 'Completed'";
$completedResult = $conn->query($completedDiagnosesQuery);
$completedDiagnoses = $completedResult->fetch_assoc()['completed'];

// Query to get the diagnoses in progress
$inProgressDiagnosesQuery = "SELECT COUNT(*) AS inProgress FROM diagnostichistory WHERE status = 'In Progress'";
$inProgressResult = $conn->query($inProgressDiagnosesQuery);
$inProgressDiagnoses = $inProgressResult->fetch_assoc()['inProgress'];

// Query to get the failed diagnoses
$failedDiagnosesQuery = "SELECT COUNT(*) AS failed FROM diagnostichistory WHERE status = 'Failed'";
$failedResult = $conn->query($failedDiagnosesQuery);
$failedDiagnoses = $failedResult->fetch_assoc()['failed'];

// Close connection
$conn->close();

// Return counts as JSON
echo json_encode([
    'totalDiagnoses' => $totalDiagnoses,
    'completedDiagnoses' => $completedDiagnoses,
    'inProgressDiagnoses' => $inProgressDiagnoses,
    'failedDiagnoses' => $failedDiagnoses
]);
?>