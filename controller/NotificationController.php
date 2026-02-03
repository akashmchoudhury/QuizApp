<?php
require_once __DIR__ . '/../model/NotificationModel.php';
session_start();

class NotificationController {
    private $notificationModel;

    public function __construct() {
        $this->notificationModel = new NotificationModel();
    }

    // Fetch notifications for the logged-in user
    public function getUserNotifications($userId) {
        return $this->notificationModel->getNotifications($userId);
    }

    // Mark a notification as read
    public function markAsRead($notificationId) {
        $this->notificationModel->markAsRead($notificationId);
        header('Location: ../view/notifications.php');
        exit;
    }
}

if (isset($_GET['action'])) {
    $controller = new NotificationController();

    if ($_GET['action'] === 'markAsRead' && isset($_GET['id'])) {
        $controller->markAsRead((int)$_GET['id']);
    }
}
