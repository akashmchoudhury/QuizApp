<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent form submission for demo
        // Here you can send an AJAX request to your server or handle form submission
        
        // Show success alert after submission
        alert('Your message has been sent successfully!');
        
        // Reset form after submission
        document.querySelector('form').reset();
    });
</script>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Contact Us | Quiz APP</title>
    <link rel="stylesheet" href="../css/homepage.css" />
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f9f2fb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #630375;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #630375;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #b97cda;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #b97cda;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-size: 16px;
        }
        button:hover {
            background-color: #630375;
            transition: 0.3s;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        nav.navbar, footer {
            background-color: #b97cda;
            color: white;
            padding: 15px 20px;
        }
        nav.navbar .logo a {
            color: #630375;
            font-weight: 700;
            font-size: 24px;
            text-decoration: none;
        }
        nav.navbar .nav-buttons button {
            background-color: #fbf7fc;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
            font-style: italic;
            color: #b97cda;
        }
        nav.navbar .nav-buttons button:hover {
            background-color: #630375;
            color: white;
            transform: scale(1.05);
            transition: 0.3s;
        }
        nav.navbar .nav-buttons button a {
            color: inherit;
            text-decoration: none;
        }
        footer {
            text-align: center;
            font-size: 14px;
        }
        footer a {
            color: #630375;
            text-decoration: none;
            margin: 0 8px;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo"><a href="landingpage.html">QUIZ APP</a></div>
    <div class="nav-buttons">
        <button><a href="landingpage.html">HOME</a></button>
        <button><a href="signin.html">REGISTER</a></button>
        <button><a href="login.php">LOG IN</a></button>
    </div>
</nav>

<div class="container">
    <h2>Contact Us</h2>

    <?php
    if (isset($_SESSION['contact_error'])) {
        echo '<p class="message error">' . $_SESSION['contact_error'] . '</p>';
        unset($_SESSION['contact_error']);
    }

    if (isset($_SESSION['contact_success'])) {
        echo '<p class="message success">' . $_SESSION['contact_success'] . '</p>';
        unset($_SESSION['contact_success']);
    }
    ?>

    <form method="POST" action="../controller/ContactController.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br>

        <button type="submit">Send Message</button>
    </form>
</div>

<footer>
    &copy; 2025 Quiz Buzz. All rights reserved.
    <br>
</footer>

</body>
</html>
