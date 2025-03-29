<?php
session_start(); 
$data = json_decode(file_get_contents("php:$data//input"), true);

if ($data && isset($data['latitude']) && isset($data['longitude'])) {
    $logFile = 'log.txt'; // Log file name
    $logEntry = date('Y-m-d H:i:s') . " - Latitude: " . $data['latitude'] . ", Longitude: " . $data['longitude'] . "\n";


    file_put_contents($logFile, $logEntry, FILE_APPEND);

    echo "Location logged successfully!";
} else {
    echo "Invalid data received.";
}
?>
