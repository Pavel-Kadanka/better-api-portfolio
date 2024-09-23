<?php
// config/database.php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
class Database {
    private $uri;
    private $conn;

    public function getConnection() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        // Get DB_URI from environment variables
        $this->uri = $_ENV['DB_URI'] ?? null;
        $fields = parse_url($this->uri);

        // Build DSN including SSL settings
        $dsn = "mysql:host=" . $fields["host"] . 
               ";port=" . $fields["port"] . 
               ";dbname=" . ltrim($fields["path"], "/") . 
               ";sslmode=verify-ca;sslrootcert=ca.pem"; // Adjust this as necessary

        try {
            // Ensure password is being passed
            $this->conn = new PDO($dsn, $fields["user"], $fields["pass"]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
