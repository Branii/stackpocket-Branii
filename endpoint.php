<?php
session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

// Generate event data

// Get the login time from your data source (e.g., database)
$loginTime = new DateTime($_SESSION['timed']);
// Get the current time
$currentDateTime = new DateTime();

// Calculate the difference between login time and current time
$interval = $loginTime->diff($currentDateTime);

$minutes = $interval->i;
$seconds = $interval->s;

$eventData = [
  'message' => $minutes . " minute(s) ago"
];

// Format the event data as an SSE message
$sseMessage = "data: " . json_encode($eventData) . "\n\n";

// Send the SSE message to the client
echo $sseMessage;

// Flush the output buffer to ensure immediate sending
ob_flush();
flush();

