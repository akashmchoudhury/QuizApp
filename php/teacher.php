<?php
session_start();

if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic sanitization
    $question = trim($_POST['question']);
    $options = [
        trim($_POST['optA']),
        trim($_POST['optB']),
        trim($_POST['optC']),
        trim($_POST['optD']),
    ];
    $correct = $_POST['correct'];

    // Validate inputs
    if ($question !== '' && in_array($correct, ['A', 'B', 'C', 'D'], true) &&
        !in_array('', $options, true)) {
        $_SESSION['questions'][] = [
            'question' => $question,
            'options' => $options,
            'correct' => $correct
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher - Create Quiz</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <style>
      /* Keep your existing styles or move to CSS */
    </style>
</head>
<body>
<div class="container">
    <h2>Create Quiz</h2>
    <form method="POST" action="">
        <input type="text" name="question" placeholder="Enter question" required><br>
        <input type="text" name="optA" placeholder="Option A" required><br>
        <input type="text" name="optB" placeholder="Option B" required><br>
        <input type="text" name="optC" placeholder="Option C" required><br>
        <input type="text" name="optD" placeholder="Option D" required><br>
        <select name="correct" required>
            <option value="">Select correct</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select><br><br>
        <button type="submit">Add Question</button>
    </form>

    <h3>Preview Questions</h3>
    <ul>
        <?php foreach ($_SESSION['questions'] as $index => $q): ?>
            <li><?php echo htmlspecialchars($q['question']); ?> (Correct: <?php echo htmlspecialchars($q['correct']); ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
