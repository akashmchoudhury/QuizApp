<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
<h2>Class Progress</h2>

<?php if (isset($classProgress) && count($classProgress) > 0): ?>
    <table>
        <tr>
            <th>Student</th>
            <th>Average Score</th>
        </tr>
        <?php foreach ($classProgress as $progress): ?>
            <tr>
                <td><?php echo htmlspecialchars($progress['username']); ?></td>
                <td><?php echo number_format($progress['avg_score'], 2); ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No class progress data available.</p>
<?php endif; ?>

</body>
</html>
