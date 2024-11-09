<?php
// Include the database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    // Prepare the SQL query to insert the video URL
    $query = "INSERT INTO videos (url) VALUES ('$url')";

    // Execute the query
    $result = pg_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Video URL uploaded successfully!";
    } else {
        echo "Error: " . pg_last_error($connection);
    }
}
?>

<!-- HTML form for video URL upload -->
<form method="POST" action="upload.php">
    Video URL: <input type="text" name="url" required><br>
    <button type="submit">Upload Video</button>
</form>
