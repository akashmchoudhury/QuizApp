<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Demo Quiz | Quiz APP</title>
  <link rel="stylesheet" href="../css/landingpage.css">
  <style>
    .demo-container {
      max-width: 700px;
      margin: 60px auto;
      padding: 30px;
      border: 2px solid #b97cda;
      border-radius: 10px;
      font-family: 'Segoe UI', sans-serif;
      background: #f9f2fb;
    }
    h2 {
      text-align: center;
      color: #630375;
    }
    .question {
      margin-bottom: 20px;
    }
    .question p {
      font-weight: bold;
    }
    input[type="radio"] {
      margin-right: 10px;
    }
    button {
      background-color: #b97cda;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 30px auto 0 auto;
    }
    .result {
      text-align: center;
      font-weight: bold;
      color: green;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo">
      <a href="landingpage.html">QUIZ APP</a>
    </div>
    <div class="nav-buttons">
      <button><a href="Landingpage.html">HOME</a></button>
      <button><a href="signin.html">REGISTER</a></button>
      <button><a href="../view/login.php">LOG IN</a></button>
    </div>
  </nav>

  <div class="demo-container">
    <h2>📝 Try Our Demo Quiz</h2>
    <form id="quizForm">
      <div class="question">
        <p>1. What is the capital of France?</p>
        <label><input type="radio" name="q1" value="Paris">Paris</label><br>
        <label><input type="radio" name="q1" value="London">London</label><br>
        <label><input type="radio" name="q1" value="Berlin">Berlin</label>
      </div>

      <div class="question">
        <p>2. Which one is a programming language?</p>
        <label><input type="radio" name="q2" value="Python">Python</label><br>
        <label><input type="radio" name="q2" value="Snake">Snake</label><br>
        <label><input type="radio" name="q2" value="Tiger">Tiger</label>
      </div>

      <div class="question">
        <p>3. What is 5 × 3?</p>
        <label><input type="radio" name="q3" value="15">15</label><br>
        <label><input type="radio" name="q3" value="8">8</label><br>
        <label><input type="radio" name="q3" value="10">10</label>
      </div>

      <div class="question">
        <p>4. What planet is known as the Red Planet?</p>
        <label><input type="radio" name="q4" value="Mars">Mars</label><br>
        <label><input type="radio" name="q4" value="Jupiter">Jupiter</label><br>
        <label><input type="radio" name="q4" value="Venus">Venus</label>
      </div>

      <div class="question">
        <p>5. What does HTML stand for?</p>
        <label><input type="radio" name="q5" value="HyperText Markup Language">HyperText Markup Language</label><br>
        <label><input type="radio" name="q5" value="HighText Machine Language">HighText Machine Language</label><br>
        <label><input type="radio" name="q5" value="Hyper Transfer Model Language">Hyper Transfer Model Language</label>
      </div>

      <div class="question">
        <p>6. Which number completes the sequence: 2, 4, 8, 16, ?</p>
        <label><input type="radio" name="q6" value="32">32</label><br>
        <label><input type="radio" name="q6" value="24">24</label><br>
        <label><input type="radio" name="q6" value="36">36</label>
      </div>

      <button type="submit">Submit Quiz</button>
    </form>
    <div class="result" id="result"></div>
  </div>

  <script>
    document.getElementById('quizForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let score = 0;
      const answers = {
        q1: "Paris",
        q2: "Python",
        q3: "15",
        q4: "Mars",
        q5: "HyperText Markup Language",
        q6: "32"
      };
      for (let key in answers) {
        const selected = document.querySelector(`input[name="${key}"]:checked`);
        if (selected && selected.value === answers[key]) {
          score++;
        }
      }
      document.getElementById('result').textContent = `You scored ${score}/6!`;
    });
  </script>
   <footer style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #ccc; text-align: center;">
                <p>&copy; 2025 Quiz App. All rights reserved.</p>
                <p>
                    <a href="#">Privacy Policy</a> |
                    <a href="#">Terms of Service</a> |
                    <a href="https://wa.me/8801933023166"target="_blank" style="color: green;">Contact Us</a>
                    <br>

                </p>
        </footer>
</body>
</html>
