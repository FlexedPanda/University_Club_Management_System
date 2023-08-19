<?php
require_once('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve event details from the URL parameters
    $eventID = $_GET['event_id'];
    $eventName = $_GET['event_name'];
    $eventCost = $_GET['event_cost'];
    $eventDate = $_GET['event_date'];
    $capacity = $_GET['capicity'];
    $vanue = $_GET['vanue'];
    $clubName = $_GET['club_name'];

    // Insert the event details into the incoming_event table
    require_once('dbconnect.php'); // Include your database connection script
    $insertSql = "INSERT INTO incoming_event (event_id, name, cost, date, capacity, vanue, club_name) 
                  VALUES ('$eventID', '$eventName', '$eventCost', '$eventDate', '$capacity', '$vanue', '$clubName')";
    if (mysqli_query($conn, $insertSql)) {
        // Database insertion successful
        mysqli_close($conn);
        echo 'Event requested successfully';
        // You can also redirect the user back to the home page or another page if desired
    } else {
        // Database insertion failed
        echo "Error inserting event: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Request</title>
    <style>
        /* Your styles here */
    </style>
</head>
<body>
    <!-- You can customize the thank you message or other content here -->
</body>
</html>
