<?php
// Include your database connection code here (dbconnect.php or similar)

// Get the event details from the URL parameters
$event_id = $_GET['event_id'];
$event_name = $_GET['name'];
$event_cost = $_GET['cost'];
$event_date = $_GET['date'];
$capacity = $_GET['capacity'];
$venue = $_GET['vanue'];
$club_name = $_GET['club_name'];
$oca_id = $_GET['oca_id'];

// Insert the event details into the 'event' table
require_once('dbconnect.php'); // Include your database connection script

$insertSql = "INSERT INTO event (event_id, name, cost, date, capacity, vanue, oca_id,club_name, money_received) VALUES ('$event_id', '$event_name', '$event_cost', '$event_date', '$capacity', '$venue',  '$oca_id','$club_name',0)";

if (mysqli_query($conn, $insertSql)) {
    // Event insertion successful

    $deleteSql = "DELETE FROM incoming_event WHERE event_id = '$event_id'";

    if (mysqli_query($conn, $deleteSql)) {



    mysqli_close($conn);




    echo "Event has been accepted and added to the event table.";}
} else {
    // Event insertion failed
    echo "Error inserting event: " . mysqli_error($conn);
}
?>
