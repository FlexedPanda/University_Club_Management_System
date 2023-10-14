<?php

$hostname = 'db';      
$username = 'php_docker';
$password = 'password';  


// Create a connection to the MySQL database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
