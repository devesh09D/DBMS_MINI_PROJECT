<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $user_id = $_SESSION['user_id'];

    // Insert into videos table
    $sql = "INSERT INTO videos (user_id, title, url) VALUES ('$user_id', '$title', '$url')";

    if ($conn->query($sql) === TRUE) {
        echo "Video URL saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Add Video URL</h2>
        <form method="POST">
            <label for="title">Video Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="url">Video URL:</label>
            <input type="url" id="url" name="url" required><br>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
