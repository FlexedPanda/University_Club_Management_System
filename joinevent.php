<?php
// Retrieve the eventID and studentID from the POST request
$eventID = $_POST['eventID'];
$studentID = $_POST['studentID'];

// Connect to the database
require_once('dbconnect.php');

// Insert the data into the "participate" table
$sql = "INSERT INTO participate (member_id, event_id) VALUES ('$studentID', '$eventID')";
if (mysqli_query($conn, $sql)) {
    echo "Successfully joined the event!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
