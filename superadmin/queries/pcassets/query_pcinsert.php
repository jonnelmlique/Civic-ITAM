<?php

include '../../../src/config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['pc_id'], $data['cpu_model'], $data['cpu_hertz'], $data['cpu_health'], $data['hdd_model'], 
          $data['hdd_size'], $data['hdd_health'], $data['ram_size'], $data['ram_health'], 
          $data['os_version'])) {
    
    $pc_id = $conn->real_escape_string($data['pc_id']);
    $cpu_model = $conn->real_escape_string($data['cpu_model']);
    $cpu_hertz = $conn->real_escape_string($data['cpu_hertz']);
    $cpu_health = $conn->real_escape_string($data['cpu_health']);
    $hdd_model = $conn->real_escape_string($data['hdd_model']);
    $hdd_size = $conn->real_escape_string($data['hdd_size']);
    $hdd_health = $conn->real_escape_string($data['hdd_health']);
    $ram_size = $conn->real_escape_string($data['ram_size']);
    $ram_health = $conn->real_escape_string($data['ram_health']);
    $os_version = $conn->real_escape_string($data['os_version']);
    
    $sql = "INSERT INTO pcassets (pc_id, cpu_model, cpu_hertz, cpu_health, hdd_model, hdd_size, hdd_health, 
                                  ram_size, ram_health, os_version, timestamp)
            VALUES ('$pc_id', '$cpu_model', '$cpu_hertz', '$cpu_health', '$hdd_model', '$hdd_size', '$hdd_health',
                     '$ram_size', '$ram_health', '$os_version', CURRENT_TIMESTAMP)
            ON DUPLICATE KEY UPDATE 
                cpu_model = VALUES(cpu_model), 
                cpu_hertz = VALUES(cpu_hertz),
                cpu_health = VALUES(cpu_health),
                hdd_model = VALUES(hdd_model),
                hdd_size = VALUES(hdd_size),
                hdd_health = VALUES(hdd_health),
                ram_size = VALUES(ram_size),
                ram_health = VALUES(ram_health),
                os_version = VALUES(os_version),
                timestamp = CURRENT_TIMESTAMP";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data inserted/updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing required data"]);
}

$conn->close();

?>