<?php
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


$sql3 = "DELETE FROM incoming_request WHERE student_id = '$stdid' ";
$reslt3 = mysqli_query($conn, $sql3);
echo '
    <head>
        <title>Rejected</title>
        <link rel="stylesheet" type="text/css" href="css/error.css">
    </head>
    <body background="img/bracubackground.jpg">
        <div class="center-div">
            <h1>Member Rejected<i></i></h1>
            <p>The Member Request Has Been Successfully Rejected.</p>
            <button class="btn" onclick="history.go(-1);" >Go Back To Homepage<i></i></button>
        </div>
    </body>
    ';
?>