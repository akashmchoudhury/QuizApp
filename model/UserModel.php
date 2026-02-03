<?php 
require_once __DIR__ . '/../config/db.php';

class UserModel {
    private $conn;

    public function __construct() {
        $db = Database::getInstance();  
        $this->conn = $db->connect();
    }

    // Login User
    public function loginUser($username, $password, $role) {
        $query = "SELECT * FROM users WHERE username = :username AND role = :role LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false; 
    }

    public function registerUser($data) {
        if ($this->isUsernameOrEmailTaken($data['username'], $data['email'])) {
            return 'Username or Email already exists!';
        }

        $query = "INSERT INTO users (role, fname, lname, username, email, password, dob, school)
                  VALUES (:role, :fname, :lname, :username, :email, :password, :dob, :school)";

        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        // Bind parameters for insert
        $stmt->bindValue(':role', $data['role'], PDO::PARAM_STR);
        $stmt->bindValue(':fname', $data['fname'], PDO::PARAM_STR);
        $stmt->bindValue(':lname', $data['lname'], PDO::PARAM_STR);
        $stmt->bindValue(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindValue(':dob', $data['dob'], PDO::PARAM_STR);
        $stmt->bindValue(':school', $data['school'], PDO::PARAM_STR);

        try {
            return $stmt->execute();  
        } catch (PDOException $e) {
            
            error_log("Error while registering user: " . $e->getMessage());
            return false;  
        }
    }
    
    private function isUsernameOrEmailTaken($username, $email) {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchColumn(); 

        return $result > 0; 
    }
}
