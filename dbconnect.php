<?php
// Database connection parameters
$hostname = 'db';        // Hostname (use the container name or IP)
$username = 'php_docker'; // MySQL username
$password = 'password';  // MySQL password
$database = 'php_docker'; // Database name

// Create a connection to the MySQL database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
