<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.html');
    exit();
}

// Include the necessary controller to handle fetching notifications
require_once __DIR__ . '/../controller/NotificationController.php';

$notificationController = new NotificationController();
$notifications = $notificationController->getUserNotifications($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">QUIZ APP</a>
        </div>
        <div class="nav-buttons">
            <button><a href="profile.php">PROFILE</a></button>
            <button><a href="logout.php">LOG OUT</a></button>
        </div>
    </nav>

    <div class="main-content">
        <div class="sidebar">
            <ul>
                <li><a href="teacher.php">Create Question</a></li>
                <li><a href="check_scores.php">Check Scores</a></li>
                <li><a href="generate_certificate.php">Generate Certificate</a></li>
            </ul>
        </div>
        <div class="container">
            <h2>Your Notifications</h2>

            <?php if (isset($notifications) && count($notifications) > 0): ?>
                <ul>
                    <?php foreach ($notifications as $notification): ?>
                        <li style="<?php echo $notification['is_read'] ? 'color: gray;' : 'font-weight: bold;'; ?>">
                            <?php echo htmlspecialchars($notification['message']); ?>
                            <small>(<?php echo $notification['created_at']; ?>)</small>
                            <?php if (!$notification['is_read']): ?>
                                - <a href="../controller/NotificationController.php?action=markAsRead&id=<?php echo $notification['id']; ?>">Mark as Read</a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No notifications available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
