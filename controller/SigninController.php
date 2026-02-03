<?php
require_once __DIR__ . '/../model/UserModel.php';

class SigninController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function handleSignin($postData) {
        // Validate all required fields
        if (!$this->validateInput($postData)) {
            echo "<p style='color:red; text-align:center;'>Please fill all required fields correctly.</p>";
            return;
        }

        // Register user via userModel
        if ($this->userModel->registerUser($postData)) {
            header("Location: ../view/signin.html?registered=1");
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Registration failed. Username or email may already exist.</p>";
        }
    }

    private function validateInput($data) {
        if (
            empty($data['username']) || empty($data['email']) || empty($data['password']) ||
            empty($data['role']) || empty($data['fname']) || empty($data['lname'])
        ) {
            return false;
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $data['username'])) {
            return false;
        }

        if (strlen($data['password']) < 6) {
            return false;
        }

        $allowedRoles = ['admin', 'teacher', 'student'];
        if (!in_array($data['role'], $allowedRoles, true)) {
            return false;
        }

        return true;
    }
}
