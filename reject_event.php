<?php
// Include your database connection code here (dbconnect.php or similar)

// Get the event ID from the URL parameter
$event_id = $_GET['event_id'];

// Delete the event from the 'incoming_event' table
require_once('dbconnect.php'); // Include your database connection script

$deleteSql = "DELETE FROM incoming_event WHERE event_id = '$event_id'";

if (mysqli_query($conn, $deleteSql)) {
    // Event deletion successful
    mysqli_close($conn);
    echo "Event has been rejected and removed from the incoming_event table.";
} else {
    // Event deletion failed
    echo "Error deleting event: " . mysqli_error($conn);
}
?>
