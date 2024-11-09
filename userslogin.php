<?php
// Include the database connection
include 'db.php';

// Start the session to store user data
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query to retrieve the user based on the username
    $query = "SELECT * FROM userslogin WHERE username = '$username'";
    $result = pg_query($connection, $query);

    // Check if the user exists
    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $user['password_hash'])) {
            // Password is correct, set session data
            $_SESSION['username'] = $user['username'];
            echo "Login successful!";
            // Redirect to a protected page (e.g., dashboard)
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!-- HTML form for user login -->
<form method="POST" action="login.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
