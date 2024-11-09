<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Sharing Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Skill Sharing Platform</h1>
        <p>Share your skills, learn new ones, and connect with others!</p>

        <div class="buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- User is logged in, show relevant buttons -->
                <a href="upload.html" class="btn">Upload Video</a>
                <a href="watch.html" class="btn">My Videos</a>
                <a href="logout.html" class="btn">Logout</a>
            <?php else: ?>
                <!-- User is not logged in, show login/register buttons -->
                <a href="login.html" class="btn">Login</a>
                <a href="register.html" class="btn">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Skill Sharing Platform. All Rights Reserved.</p>
    </footer>
</body>
</html>
