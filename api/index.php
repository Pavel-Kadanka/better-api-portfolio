<?php
// index.php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'config/database.php'; // Ensure this path is correct

// Test the database connection (optional)
$database = new Database();
$conn = $database->getConnection();

if ($conn) {
    // echo "Connected successfully."; // Uncomment if needed for debugging
}

// Get the requested URI
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routing logic
switch ($request) {
    case '/api/projects': // Adjusted to match your URL structure
        require __DIR__ . '/endpoints/projects.php';
        break;
    case '/api/skills': // Adjusted to match your URL structure
        require __DIR__ . '/endpoints/skills.php';
        break;
    case '/api/images': // Adjusted to match your URL structure
        require __DIR__ . '/endpoints/images.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Endpoint not found"]);
        break;
}
