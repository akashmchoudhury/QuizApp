<?php
// Start session to ensure the teacher is logged in
session_start();

// You may want to verify the user's role here, i.e., if they are a teacher
if ($_SESSION['role'] !== 'teacher') {
    header('Location: signin.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">QUIZ APP</a>
        </div>
        <div class="nav-buttons">
            <button><a href="profile.html">PROFILE</a></button>
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
            <h2>Welcome, Teacher</h2>
            <br>
            <p style="text-align: justify;">
                In this section, you can manage your quizzes, view student scores, and track class progress. 
                Feel free to create new questions and manage existing ones.
            </p>
        </div>
    </div>
</body>
</html>
