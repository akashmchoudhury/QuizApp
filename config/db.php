<?php
// Database configuration class
class Database {
    private $host = "localhost";
    private $db_name = "quizbuzz_db"; 
    private $username = "root"; 
    private $password = ""; 
    public $conn;

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        
        if ($this->conn === null) {
            try {
                
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                    $this->username,
                    $this->password
                );
                
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET NAMES utf8mb4"); 
            } catch(PDOException $e) {
                echo "Connection error: " . $e->getMessage();
                exit;
            }
        }
        return $this->conn;
    }

    public function close() {
        $this->conn = null;
    }
}
