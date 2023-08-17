<?php
require_once('dbconnect.php');

if (isset($_POST['reg_user'])) {
	$name = $_POST['name'];
    $stdid = $_POST['stdid'];
	$dept = $_POST['department'];
    $club = $_POST['club'];
	$temp = $_POST['designation'];
    $desig = strtolower($temp);
	$gender = $_POST['gender'];
	$dob = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$pin_1 = $_POST['pin_1'];
	$pin_2 = $_POST['pin_2'];

	$id_qry = "SELECT * FROM member WHERE student_id='$stdid'";
	$chck_user = mysqli_query($conn, $id_qry);
	if (mysqli_num_rows($chck_user) != 0) {
		echo '
		<head>
			<title>Error</title>
			<link rel="stylesheet" type="text/css" href="css/error.css">
		</head>
		<body background="img/bracubackground.jpg">
			<div class="center-div">
				<h1>User Exists<i></i></h1>
				<p>User With The Student ID Already Exists.</p>
				<a href="register.php"><button class="btn">Go Back To Sign Up Page<i></i></button></a>
			</div>
		</body>
		';
        exit();
	}

	$email_qry = "SELECT * FROM member WHERE email='$email'";
	$chck_email = mysqli_query($conn, $email_qry);
	if (mysqli_num_rows($chck_email) != 0){
		echo '
		<head>
			<title>Error</title>
			<link rel="stylesheet" type="text/css" href="css/error.css">
		</head>
		<body background="img/bracubackground.jpg">
			<div class="center-div">
				<h1>Email Exists<i></i></h1>
				<p>The Email Has Already Been Used.</p>
				<a href="register.php"><button class="btn">Go Back To Sign Up Page<i></i></button></a>
			</div>
		</body>
		';
        exit();
	}

	$phone_qry = "SELECT * FROM member WHERE contact_no='$contact'";
	$chck_phone = mysqli_query($conn, $phone_qry);
	if (mysqli_num_rows($chck_phone) != 0){
		echo '
		<head>
			<title>Error</title>
			<link rel="stylesheet" type="text/css" href="css/error.css">
		</head>
		<body background="img/bracubackground.jpg">
			<div class="center-div">
				<h1>Contact No. Exists<i></i></h1>
				<p>The Contact No. Has Already Been Used.</p>
				<a href="register.php"><button class="btn">Go Back To Sign Up Page<i></i></button></a>
			</div>
		</body>
		';
        exit();
	}
	$sql1 = "INSERT INTO incoming_request VALUES ('$stdid','$name','$desig','$email','$dob','$dept','$gender','$club','$pin_1','$contact')";
	//$sql1 = "INSERT INTO member VALUES ('$stdid','$name','$desig','$email','$dob','$dept','$gender','$club','$pin_1','$contact')";

	//$sql2 = "INSERT INTO has VALUES ('$stdid', '$club')";

	$result1 = mysqli_query($conn, $sql1);
    //$reslt2 = mysqli_query($conn, $sql2);
    echo'
	<head>
		<title>Success</title>
		<link rel="stylesheet" type="text/css" href="css/error.css">
	</head>
	<body background="img/bracubackground.jpg">
		<div class="center-div">
			<h1>Thank You<i></i></h1>
			<p>Your Registration Request Has Been Sent For Approval.</p>
			<a href="login.php"><button class="btn">Go To Sign In Page<i></i></button></a>
		</div>
	</body>
	';
}
