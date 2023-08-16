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


$sql3 = "DELETE FROM incoming_request WHERE student_id = '$stdid' ";
$reslt3 = mysqli_query($conn, $sql3);

echo 'Go back, successfully rejected';
?>