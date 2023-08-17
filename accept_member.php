<?php
// Include your database connection code here (dbconnect.php or similar)

// Retrieve the member details from the URL parameters
$stdid = $_GET['student_id'];
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
$sql1 = "INSERT INTO member VALUES ('$stdid','$name','$desig','$email','$dob','$dept','$gender','$club','$pin_1','$contact')";
$sql2 = "INSERT INTO has VALUES ('$stdid', '$club')";
$result1 = mysqli_query($conn, $sql1);
$reslt2 = mysqli_query($conn, $sql2);

$sql3 = "DELETE FROM incoming_request WHERE student_id = '$stdid' ";
$reslt3 = mysqli_query($conn, $sql3);

echo '
    <head>
        <title>Accepted</title>
        <link rel="stylesheet" type="text/css" href="css/error.css">
    </head>
    <body background="img/bracubackground.jpg">
        <div class="center-div">
            <h1>Member Accepted<i></i></h1>
            <p>The Member Request Has Been Successfully Accepted.</p>
            <button class="btn" onclick="history.go(-1);" >Go Back To Homepage<i></i></button>
        </div>
    </body>
    ';
?>