<?php
// endpoints/images.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once './config/database.php';
include_once './models/Image.php';

$database = new Database();
$db = $database->getConnection();

$image = new Image($db);
$stmt = $image->getImages();

$images = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $images[] = $row;
}

echo json_encode($images);
