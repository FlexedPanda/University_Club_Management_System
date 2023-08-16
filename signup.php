<?php
require_once('dbconnect.php');

if (isset($_POST['reg_user'])) {
	$name = $_POST['name'];
    $stdid = $_POST['stdid'];
	$dept = $_POST['department'];
    $club = $_POST['club'];
    $desig = $_POST['designation'];
	$gender = $_POST['gender'];
	$dob = $_POST['year']."/".$_POST['month']."/".$_POST['day'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$pin_1 = $_POST['pin_1'];
	$pin_2 = $_POST['pin_2'];


	$id_qry = "SELECT * FROM member WHERE student_id='$stdid'";
	$chck_user = mysqli_query($conn, $id_qry);
	if (mysqli_num_rows($chck_user) != 0) {
		echo "User already exists.";
        exit();
	}

	$email_qry = "SELECT * FROM member WHERE email='$email'";
	$chck_email = mysqli_query($conn, $email_qry);
	if (mysqli_num_rows($chck_email) != 0){
		echo "This email has been used.";
        exit();
	}

	$phone_qry = "SELECT * FROM member WHERE contact_no='$contact'";
	$chck_phone = mysqli_query($conn, $phone_qry);
	if (mysqli_num_rows($chck_phone) != 0){
		echo "Phone number is already used.";
        exit();
	}

	$sql1 = "INSERT INTO member VALUES ('$stdid','$name','$desig','$email','$dob','$dept','$gender','$club','$pin_1','$contact')";

	$sql2 = "INSERT INTO has VALUES ('$stdid', '$club')";

	$result1 = mysqli_query($conn, $sql1);
    $reslt2 = mysqli_query($conn, $sql2);
    header('Location: login.php');
}
