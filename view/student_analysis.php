<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Analytics</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
<h2>Student Analytics</h2>

<?php if (isset($analytics) && count($analytics) > 0): ?>
    <table>
        <tr>
            <th>Topic</th>
            <th>Average Score</th>
        </tr>
        <?php foreach ($analytics as $data): ?>
            <tr>
                <td><?php echo htmlspecialchars($data['title']); ?></td>
                <td><?php echo number_format($data['avg_score'], 2); ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No analytics data available.</p>
<?php endif; ?>

</body>
</html>
