<?php
// endpoints/skills.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once './config/database.php';
include_once './models/Skill.php';

$database = new Database();
$db = $database->getConnection();

$skill = new Skill($db);
$stmt = $skill->getSkills();

$skills = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $skills[] = $row;
}

echo json_encode($skills);
