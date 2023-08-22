<?php
$eventID = $_POST['eventID'];
$studentID = $_POST['studentID'];

require_once('dbconnect.php');

// Check if the member is already participating in the event
$isParticipatingQuery = "SELECT * FROM participate WHERE member_id = '$studentID' AND event_id = '$eventID'";
$isParticipatingResult = mysqli_query($conn, $isParticipatingQuery);

if (mysqli_num_rows($isParticipatingResult) > 0) {
    // Member is already participating in the event
    echo '
    <head>
        <title>Already Joined</title>
        <link rel="stylesheet" type="text/css" href="css/error.css">
    </head>
    <body background="img/bracubackground.jpg">
        <div class="center-div">
            <h1>Event Already Joined<i></i></h1>
            <p>You are already participating in this event.</p>
            <button class="btn" onclick="history.go(-1);" >Go Back<i></i></button>
        </div>
    </body>
    ';
} else {
    // Member is not participating, so insert the participation record
    $sql = "INSERT INTO participate (member_id, event_id) VALUES ('$studentID', '$eventID')";

    if (mysqli_query($conn, $sql)) {
        echo '
        <head>
            <title>Joined</title>
            <link rel="stylesheet" type="text/css" href="css/error.css">
        </head>
        <body background="img/bracubackground.jpg">
            <div class="center-div">
                <h1>Event Joined<i></i></h1>
                <p>You Have Successfully Joined The Event.</p>
                <button class="btn" onclick="history.go(-1);" >Go Back To Homepage<i></i></button>
            </div>
        </body>
        ';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
