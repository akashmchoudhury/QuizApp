<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Privacy Policy | QUIZ APP</title>
    <link rel="stylesheet" href="../css/homepage.css" />

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f9f2fb;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1, h2 {
            color: #630375;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
            margin-top: auto;
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
    <div class="logo">
        <a href="landingpage.html">QUIZ BUZZ</a>
    </div>
    <div class="nav-buttons">
        <button><a href="landingpage.html">HOME</a></button>
        <button><a href="signin.html">REGISTER</a></button>
        <button><a href="../view/login.php">LOG IN</a></button>
    </div>
</nav>

<div class="container">
    <h1>Privacy Policy</h1>

    <p>
        At Quiz Buzz, your privacy is our priority. This Privacy Policy explains what data we collect,
        how we use it, and your rights.
    </p><br>

    <h2>Information We Collect</h2>
    <ul>
        <li>Personal information you provide during registration and contact forms.</li>
        <li>Usage data related to quizzes and interactions on the platform.</li>
        <li>Cookies and tracking technologies to improve user experience.</li>
    </ul><br>

    <h2>How We Use Your Information</h2>
    <ul>
        <li>To provide and maintain our services.</li>
        <li>To personalize your experience.</li>
        <li>To communicate important updates.</li>
        <li>To comply with legal obligations.</li>
    </ul><br>

    <h2>Your Rights</h2>
    <p>
        You may request access, correction, or deletion of your personal data.
        For any requests, contact us through our contact page.
    </p><br>

    <h2>Cookies</h2>
    <p>
        We use cookies to improve site functionality and analytics.
        You can control cookie preferences through your browser settings.
    </p><br>

    <h2>Changes to This Policy</h2>
    <p>
        We may update this Privacy Policy occasionally.
        Changes will be posted on this page with a revised date.
    </p><br>
</div>

<footer>
    &copy; 2025 Quiz Buzz. All rights reserved.
    <br>
    <a href="landingpage.html">Home</a> |
    <a href="contact.php">Get in Touch</a> |
    <a href="terms_of_services.php">Terms of Service</a>
</footer>

</body>
</html>
