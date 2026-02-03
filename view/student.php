<?php
session_start();

if ($_SESSION['role'] !== 'student') {
    header('Location: signin.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
                <li><a href="take_quiz.php">Take Quiz</a></li>
                <li><a href="view_results.php">View Results</a></li>
                <li><a href="view_analytics.php">View Analytics</a></li>
            </ul>
        </div>
        <div class="container">
            <h2>Welcome, Student</h2>
            <br>
            <p style="text-align: justify;">
                This is your student dashboard. Here, you can take quizzes, view your previous results, 
                and analyze your performance. Keep track of your learning progress over time.
            </p>
        </div>
    </div>
</body>
</html>
