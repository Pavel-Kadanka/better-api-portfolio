<?php
// models/Image.php
class Image {
    private $conn;
    private $table_name = "images";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getImages() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
