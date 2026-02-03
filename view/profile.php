<?php
session_start();

// Check if the user is logged in and has a role
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                <li><a href="profile.php">Edit Profile</a></li>
                <li><a href="change_password.php">Change Password</a></li>
            </ul>
        </div>
        <div class="container">
            <h2>Your Profile</h2>
            <br>
            <p>Username: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <p>Role: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
        </div>
    </div>
</body>
</html>
