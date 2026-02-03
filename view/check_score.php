<?php
session_start();

// Check if the teacher is logged in
if ($_SESSION['role'] !== 'teacher') {
    header('Location: signin.html');
    exit();
}

require_once __DIR__ . '/../controller/TeacherController.php';

$teacherController = new TeacherController();

if (isset($_GET['quiz_id'])) {
    $quizId = $_GET['quiz_id'];
    // Fetch scores for the quiz
    $scores = $teacherController->checkScores($quizId);
} else {
    echo "<p>No quiz selected.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Scores</title>
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
            <h2>Quiz Scores for Quiz ID: <?php echo htmlspecialchars($quizId); ?></h2>

            <?php if (isset($scores) && count($scores) > 0): ?>
                <table>
                    <tr>
                        <th>Student</th>
                        <th>Average Score</th>
                    </tr>
                    <?php foreach ($scores as $score): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($score['username']); ?></td>
                            <td><?php echo number_format($score['avg_score'], 2); ?>%</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No scores available for this quiz.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
