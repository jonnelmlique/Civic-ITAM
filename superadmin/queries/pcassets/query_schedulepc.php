<?php 
//to be inserted in task scheduler
function getWmicData($command) {
    return shell_exec($command);
}

$cpu_info = getWmicData('wmic cpu get name');
$cpu_status = getWmicData('wmic cpu get status');
$os_info = getWmicData('wmic os get caption');
$disk_info = getWmicData('wmic diskdrive get caption, size, status');
$network_info = getWmicData('wmic nic get caption, macaddress, speed, status');
$ram_info = getWmicData('wmic memorychip get capacity, devicelocator, status');

$cpu_info_lines = explode("\n", $cpu_info);
$cpu_model_full = isset($cpu_info_lines[1]) ? trim($cpu_info_lines[1]) : 'Unknown';

$cpu_model_parts = explode(' @ ', $cpu_model_full);

$cpu_model = isset($cpu_model_parts[0]) ? trim($cpu_model_parts[0]) : 'Unknown';

$cpu_hertz = isset($cpu_model_parts[1]) ? trim($cpu_model_parts[1]) : 'Unknown';

$cpu_health = strpos($cpu_status, "OK") !== false ? 'OK' : 'Issue'; 

preg_match('/(.*)\s+(\d+)/', $disk_info, $disk_matches);
$hdd_model = isset($disk_matches[1]) ? $disk_matches[1] : 'Unknown';
$hdd_size = isset($disk_matches[2]) ? number_format($disk_matches[2] / (1024 * 1024 * 1024), 2) . ' GB' : 'Unknown';
$hdd_health = strpos($disk_info, "Status") !== false ? 'OK' : 'Issue';

preg_match_all('/(\d+)/', $ram_info, $ram_matches);

if (!empty($ram_matches[1])) {
    $total_ram = array_sum($ram_matches[1]) / (1024 * 1024 * 1024); 
    $ram_size = number_format($total_ram, 2) . ' GB';  
} else {
    $ram_size = 'Unknown';
}
$ram_health = strpos($ram_info, "Status") !== false ? 'OK' : 'Issue';


$os_info_lines = explode("\n", $os_info); 
$os_caption = isset($os_info_lines[1]) ? trim($os_info_lines[1]) : 'Unknown'; 

$os_version = $os_caption;
$pc_id = gethostname();

$data = [
    'pc_id' => $pc_id,
    'cpu_model' => $cpu_model, 
    'cpu_hertz' => $cpu_hertz, 
    'cpu_health' => $cpu_health,
    'hdd_model' => $hdd_model,
    'hdd_size' => $hdd_size,
    'hdd_health' => $hdd_health,
    'ram_size' => $ram_size,
    'ram_health' => $ram_health,
    'os_version' => $os_version,
    'assignedpc' => NULL 
];

//to be change with online api
$url = 'http://localhost/civic-itam/superadmin/queries/pcassets/query_pcinsert.php'; 

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/json\r\n",
        'content' => json_encode($data),
    ]
];
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo "Error: Could not send data to the server.";
} else {
    echo "Data sent successfully: $response";
}
?>