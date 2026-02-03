<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result History</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
<h2>Past Test Results</h2>

<?php if (isset($results) && count($results) > 0): ?>
    <table>
        <tr>
            <th>Quiz Title</th>
            <th>Score</th>
            <th>Date/Time</th>
        </tr>
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['quiz_title']); ?></td>
                <td><?php echo $result['score']; ?> / <?php echo $result['total']; ?></td>
                <td><?php echo $result['taken_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No results available.</p>
<?php endif; ?>

</body>
</html>
