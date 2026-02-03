<?php
require_once __DIR__ . '/../config/db.php';

class QuizModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getQuizById($quizId) {
        $query = "SELECT * FROM quizzes WHERE id = :quiz_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':quiz_id', $quizId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomizedQuestions($quizId) {
        $query = "SELECT q.* FROM questions q
                  INNER JOIN quiz_questions qq ON q.id = qq.question_id
                  WHERE qq.quiz_id = :quiz_id
                  ORDER BY RAND()";  
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':quiz_id', $quizId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveQuizResult($userId, $quizId, $score) {
        $query = "INSERT INTO results (user_id, quiz_id, score, taken_at) 
                  VALUES (:user_id, :quiz_id, :score, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':quiz_id', $quizId);
        $stmt->bindParam(':score', $score);
        return $stmt->execute();
    }

    public function getResultsByUser($userId) {
        $query = "SELECT r.*, q.title AS quiz_title 
                  FROM results r
                  JOIN quizzes q ON r.quiz_id = q.id
                  WHERE r.user_id = :user_id
                  ORDER BY r.taken_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClassPerformance($quizId) {
        $query = "SELECT u.username, AVG(r.score) AS avg_score 
                  FROM results r
                  JOIN users u ON r.user_id = u.id
                  WHERE r.quiz_id = :quiz_id
                  GROUP BY u.id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':quiz_id', $quizId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createQuiz($title, $description) {
        $query = "INSERT INTO quizzes (title, description, created_at) 
                  VALUES (:title, :description, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    // Add questions to the quiz (linking quiz and questions)
    public function addQuestionsToQuiz($quizId, $questionIds) {
        $query = "INSERT INTO quiz_questions (quiz_id, question_id) VALUES (:quiz_id, :question_id)";
        $stmt = $this->conn->prepare($query);

        foreach ($questionIds as $questionId) {
            $stmt->bindParam(':quiz_id', $quizId);
            $stmt->bindParam(':question_id', $questionId);
            $stmt->execute();
        }

        return true;
    }

    // Import questions from CSV file (bulk import)
    public function importQuestionsFromCSV($filePath) {
        $handle = fopen($filePath, 'r');
        if ($handle === false) return false;

        $this->conn->beginTransaction();
        $header = fgetcsv($handle); 

        $query = "INSERT INTO questions (question_text, type, difficulty, options_json, correct_answer, created_by, created_at) 
                  VALUES (:question_text, :type, :difficulty, :options_json, :correct_answer, :created_by, NOW())";
        $stmt = $this->conn->prepare($query);

        try {
            while (($row = fgetcsv($handle)) !== false) {
                list($question_text, $type, $difficulty, $options_json, $correct_answer, $created_by) = $row;

                $stmt->bindParam(':question_text', $question_text);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':difficulty', $difficulty);
                $stmt->bindParam(':options_json', $options_json);
                $stmt->bindParam(':correct_answer', $correct_answer);
                $stmt->bindParam(':created_by', $created_by);

                $stmt->execute();
            }
            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollBack();
            fclose($handle);
            return false;
        }

        fclose($handle);
        return true;
    }
}
