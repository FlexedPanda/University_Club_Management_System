<?php
require_once('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the department name from the form
    $departmentName= $_GET['dept_name'];

    
    // Retrieve the posted message
    $message = $_POST['message'];

    // Update the departmentmessages table in the database
    require_once('dbconnect.php'); // Include your database connection script
    $insertSql = "INSERT INTO departmentmessages (departmentname, message) VALUES ('$departmentName', '$message')";
    
    if (mysqli_query($conn, $insertSql)) {
        // Database update successful
        mysqli_close($conn);
        
        echo 'Message posted successfully';
        // Redirect back to home.php or wherever you want
        // header("Location: home.php");
        exit();
    } else {
        // Database update failed
        echo "Error posting message: " . mysqli_error($conn);
    }
}
?>

