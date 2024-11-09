<?php
// Database connection
$host = "localhost";
$dbname = "Skill_sharing";
$user = "postgres";
$pass = "Afrah#27";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Database connection failed.");
}
?>
