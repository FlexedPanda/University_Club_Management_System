<?php
// Include your database connection code here (dbconnect.php or similar)

// Retrieve the member details from the URL parameters
$std_id = $_GET['student_id'];
$name = $_GET['name'];
$desig = $_GET['designation'];
$email = $_GET['email'];
$dob = $_GET['dob'];
$dept = $_GET['department'];
$gender = $_GET['gender'];
$club = $_GET['club'];
$pin_1 = $_GET['pin'];
$contact = $_GET['contact_no'];

require_once('dbconnect.php');


$sql3 = "DELETE FROM member WHERE student_id = '$std_id' ";
$reslt3 = mysqli_query($conn, $sql3);

echo '
    <head>
        <title>Deleted</title>
        <link rel="stylesheet" type="text/css" href="css/error.css">
    </head>
    <body background="img/bracubackground.jpg">
        <div class="center-div">
            <h1>Member Deleted<i></i></h1>
            <p>The Member Record Has Been Successfully Deleted.</p>
            <button class="btn" onclick="history.go(-1);" >Go Back To Homepage<i></i></button>
        </div>
    </body>
';
?>