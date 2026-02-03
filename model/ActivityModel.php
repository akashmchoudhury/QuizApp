<?php
require_once __DIR__ . '/../config/db.php';

class ActivityLogModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getClassProgress($teacherId) {
        $query = "SELECT s.username, AVG(r.score) as avg_score
                  FROM results r
                  JOIN users s ON r.user_id = s.id
                  WHERE s.teacher_id = :teacher_id
                  GROUP BY s.username";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':teacher_id', $teacherId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
