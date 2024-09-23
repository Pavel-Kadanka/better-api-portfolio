<?php
// endpoints/projects.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once './config/database.php';
include_once './models/Project.php';

$database = new Database();
$db = $database->getConnection();

$project = new Project($db);
$stmt = $project->getProjects();

$projects = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $projects[] = $row;
}

if (empty($projects)) {
    echo json_encode(["message" => "No projects found"]);
} else {
    echo json_encode($projects);
}
