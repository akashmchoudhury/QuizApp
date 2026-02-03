<?php
require_once __DIR__ . '/../model/UserModel.php';
session_start();

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Validate inputs and handle login
    public function handleLogin($username, $password, $role) {
        // Basic validation
        if (!$this->validateUsername($username) || !$this->validatePassword($password) || !$this->validateRole($role)) {
            echo "<p style='color:red; text-align:center;'>Invalid input.</p>";
            return;
        }

        $user = $this->userModel->loginUser($username, $password, $role);

        if ($user) {
            // Set session variables securely
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            switch ($role) {
                case 'admin':
                    header('Location: ../view/homepage_admin.php');
                    exit;
                case 'teacher':
                    header('Location: ../view/homepage_teacher.php');
                    exit;
                case 'student':
                    header('Location: ../view/homepage_student.php');
                    exit;
                default:
                    echo "<p style='color:red; text-align:center;'>Unknown role.</p>";
                    return;
            }
        } else {
            echo "<p style='color:red; text-align:center;'>Invalid username, password, or role.</p>";
        }
    }

    private function validateUsername($username) {
        return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
    }

    private function validatePassword($password) {
        return strlen($password) >= 6;
    }

    private function validateRole($role) {
        $allowedRoles = ['admin', 'teacher', 'student'];
        return in_array($role, $allowedRoles, true);
    }
}