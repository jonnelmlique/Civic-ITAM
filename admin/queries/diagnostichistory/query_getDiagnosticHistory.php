<?php
include('../../../src/config/config.php');

if (!$conn) {
    echo json_encode([
        'response' => 'Database connection failed.',
        'error' => mysqli_connect_error(),
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}

$sql = "SELECT 
            dh.id, 
            dh.diagnosticid, 
            dh.assetdetailsid,
            ad.assetname, 
            dh.conductedby, 
            dh.remarks, 
            dh.createdate,
            dh.status,
            dh.job,
            dh.jobtype
        FROM diagnostichistory AS dh
        INNER JOIN assetdetails AS ad ON ad.id = dh.assetdetailsid";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode([
        'response' => 'Error executing query.',
        'error' => $conn->error,
        'status' => 500,
        'response_type' => 'error'
    ]);
    exit;
}


$diagnosticData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
        $diagnosticData[] = $row;
    }
}

echo json_encode([
    'response' => 'Data fetched successfully.',
    'data' => $diagnosticData,
    'status' => 200,
    'response_type' => 'success'
]);

$conn->close();
