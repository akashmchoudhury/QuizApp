<?php
session_start();

$questions = $_SESSION['questions'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions as $index => $q) {
        // Check if the answer was submitted and correct
        if (isset($_POST["q$index"]) && $_POST["q$index"] === $q['correct']) {
            $score++;
        }
    }
    $total = count($questions);

    // Optionally, save the result to DB here via a model/controller

    echo "<h2>Your Score: $score / $total</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Quiz</title>
    <link rel="stylesheet" href="../css/homepage.css"> <!-- Add your CSS -->
</head>
<body>
<h2>Student Quiz</h2>
<form method="POST" action="">
    <?php foreach ($questions as $index => $q): ?>
        <div>
            <p><strong>Q<?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($q['question']); ?></p>
            <?php foreach (['A', 'B', 'C', 'D'] as $opt): ?>
                <label>
                    <input type="radio" name="q<?php echo $index; ?>" value="<?php echo $opt; ?>" required>
                    <?php echo htmlspecialchars($q['options'][array_search($opt, ['A', 'B', 'C', 'D'])]); ?>
                </label><br>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <br>
    <button type="submit">Submit Quiz</button>
</form>
</body>
</html>
