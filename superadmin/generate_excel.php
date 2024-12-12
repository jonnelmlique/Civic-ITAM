<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$host = "localhost";
$username = "root";
$password = "";
$dbname = "civicitam";

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $category = $_POST['category'] !== 'Choose category' ? $_POST['category'] : null;
    $status = $_POST['status'] !== 'Choose status' ? $_POST['status'] : null;
    $date = $_POST['date'] ?? null;

    // Prepare the SQL query based on filters
    $query = "SELECT `request_id`, `maintenance_name`, `category`, `status`, `assigned_to`, `remarks`, `created_at`
              FROM `maintenance_requests` WHERE 1=1"; // Default query to fetch all data
    
    $params = [];
    $types = "";

    // Filter by category
    if ($category) {
        $query .= " AND category = ?";
        $params[] = $category;
        $types .= "s";
    }

    // Filter by status
    if ($status === 'maintenance') {
        // If 'Under Maintenance' is selected, include both 'Under Maintenance' and 'Completed' statuses
        $query .= " AND (status = 'Under Maintenance' OR status = 'Completed')";
    } elseif ($status) {
        // Filter by the selected status
        $query .= " AND status = ?";
        $params[] = $status;
        $types .= "s";
    }

    // Filter by date (compare only the date portion of created_at)
    if ($date) {
        $query .= " AND DATE(created_at) = ?";
        $params[] = $date;
        $types .= "s";
    }

    // Prepare the statement
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    // Bind parameters
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is returned
    if ($result->num_rows > 0) {
        // Load the existing template spreadsheet
        $spreadsheet = IOFactory::load('excel-reports/maintenance.xlsx'); // Path to your template file
        $sheet = $spreadsheet->getActiveSheet();

        // Set the date filter on the spreadsheet (example)
        if ($date) {
            $sheet->getCell('G1')->setValue('Date Filter: ' . $date);
        }

        // Starting row for data insertion in the template
        $row = 5;

        // Add data to the spreadsheet
        while ($data = $result->fetch_assoc()) {
            $sheet->getCell('A' . $row)->setValue($data['request_id']);
            $sheet->getCell('B' . $row)->setValue($data['maintenance_name']);
            $sheet->getCell('C' . $row)->setValue($data['category']);
            $sheet->getCell('D' . $row)->setValue($data['status']);
            $sheet->getCell('E' . $row)->setValue($data['assigned_to']);
            $sheet->getCell('F' . $row)->setValue($data['remarks']);
            $sheet->getCell('G' . $row)->setValue($data['created_at']);
            $row++;
        }

        // Output the Excel file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Maintenance_Report_' . date('YmdHis') . '.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean(); // Ensure no previous output interferes

        // Create the writer and output the file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    } else {
        // If no data found, redirect back with a 'no_data' flag
        header("Location: reports.php?no_data=true");
        exit;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
