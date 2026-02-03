<?php
require_once __DIR__ . '/../model/ContactModel.php';
session_start();

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }

    public function submitForm($data) {
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            $_SESSION['contact_error'] = "All fields are required.";
            header('Location: ../view/contact.php');
            exit;
        }

        // Sanitize and validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['contact_error'] = "Invalid email address.";
            header('Location: ../view/contact.php');
            exit;
        }

        $success = $this->contactModel->submitForm($data);
        $_SESSION['contact_success'] = $success ? "Message sent successfully." : "Failed to send message.";
        header('Location: ../view/contact.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ContactController();
    $controller->submitForm($_POST);
} else {
    echo "Invalid request.";
}
