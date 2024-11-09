<?php
// Include the database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL query to insert the user into the usersregistration table
    $query = "INSERT INTO usersregistration (username, email, password_hash) VALUES ('$username', '$email', '$password_hash')";

    // Execute the query
    $result = pg_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . pg_last_error($connection);
    }
}
?>

<!-- HTML form for registration -->
<form method="POST" action="register.php">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>
    <button type="submit">Register</button>
</form>
