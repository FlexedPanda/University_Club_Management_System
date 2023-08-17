<?php
$eventID = $_POST['eventID'];
$studentID = $_POST['studentID'];

require_once('dbconnect.php');

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
} 

else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
