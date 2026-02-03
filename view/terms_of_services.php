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
            margin-bottom: 5px;
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
    
<h1>Terms of Service</h1>
<br>
<p>By accessing or using our services, you agree to be bound by these Terms of Service.</p>
<br>
<h2>Use of Service</h2>
<ul>
    <li>You agree to use the platform in compliance with all applicable laws and policies.</li>
    <li>You will not use the platform for any harmful or unlawful purposes.</li>
</ul>
<br>
<h2>Account Responsibilities</h2>
<ul>
    <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
    <li>Notify us immediately of any unauthorized use of your account.</li>
</ul>
<br>
<h2>Content</h2>
<p>Users are responsible for content they submit through quizzes, messages, or profiles. We reserve the right to remove inappropriate content.</p>
<br>
<h2>Termination</h2>
<p>We may suspend or terminate accounts that violate these terms without prior notice.</p>
<br>
<h2>Limitation of Liability</h2>
<p>Quiz Buzz is provided "as is" without warranties. We are not liable for any damages arising from the use of our platform.</p>
<br>
<h2>Changes to Terms</h2>
<p>We may update these terms periodically. Continued use after changes means acceptance of the new terms.</p>
</div>

<footer>
    &copy; 2025 Quiz Buzz. All rights reserved.
    <br>
    <a href="landingpage.html">Home</a> |
    <a href="contact.php">Get in Touch</a> |
    <a href="privacy_policy.php">Privacy Policy</a>

</footer>

</body>
</html>
