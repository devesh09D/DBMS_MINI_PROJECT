<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM videos WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Videos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="video-container">
        <h2>Your Uploaded Videos</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='video'>";
                echo "<h3>Title: " . htmlspecialchars($row['title']) . "</h3>";
                echo "<a href='" . htmlspecialchars($row['url']) . "' target='_blank'>" . htmlspecialchars($row['url']) . "</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No videos added yet.</p>";
        }
        ?>
    </div>
</body>
</html>
