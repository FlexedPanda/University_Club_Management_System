<?php

$student_id = $_GET['student_id'];
$name = $_GET['name'];
$designation = $_GET['designation'];
$email = $_GET['email'];
$dob = $_GET['dob'];
$department = $_GET['department'];
$gender = $_GET['gender'];
$pin = $_GET['pin'];
$contact_no = $_GET['contact_no'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedName = $_POST['name'];
    $updatedDesignation = $_POST['designation'];
    $updatedEmail = $_POST['email'];
    $updatedDob = $_POST['dob'];
    $updatedDepartment = $_POST['department'];
    $updatedGender = $_POST['gender'];
    $updatedPin = $_POST['pin'];
    $updatedContactNo = $_POST['contact_no'];


    require_once('dbconnect.php');
    $updateSql = "UPDATE member SET name='$updatedName', designation='$updatedDesignation', email='$updatedEmail', dob='$updatedDob', department='$updatedDepartment', gender='$updatedGender', pin='$updatedPin', contact_no='$updatedContactNo' WHERE student_id=$student_id";

    if (mysqli_query($conn, $updateSql)) {
        mysqli_close($conn);

        echo '
		<head>
			<title>Updated</title>
			<link rel="stylesheet" type="text/css" href="css/error.css">
		</head>
		<body background="img/bracubackground.jpg">
			<div class="center-div">
				<h1>Member Updated<i></i></h1>
				<p>The Existing Record For The Member Is Successfully Updated.</p>
				<button class="btn" onclick="history.go(-2);" >Go Back To Homepage<i></i></button>
			</div>
		</body>
        ';
        //header("Location: home.php");
        exit();
    } else {
        echo 'Error updating record: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" type="text/css" href="css/edit_member.css">
</head>
<body background="img/bracubackground.jpg">
    <div class="module">
        <h1>Edit Member Details</h1> <br>
        <form action="edit_member.php?student_id=<?php echo $student_id; ?>&name=<?php echo $name; ?>&designation=<?php echo $designation; ?>&email=<?php echo $email; ?>&dob=<?php echo $dob; ?>&department=<?php echo $department; ?>&gender=<?php echo $gender; ?>&pin=<?php echo $pin; ?>&contact_no=<?php echo $contact_no; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>

            <label for="designation">Designation:</label>
            <input type="text" name="designation" value="<?php echo $designation; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="<?php echo $dob; ?>"><br><br>

            <label for="department">Department:</label>
            <input type="text" name="department" value="<?php echo $department; ?>"><br>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" value="<?php echo $gender; ?>"><br>

            <label for="pin">PIN:</label>
            <input type="text" name="pin" value="<?php echo $pin; ?>"><br>

            <label for="contact_no">Contact No:</label>
            <input type="text" name="contact_no" value="<?php echo $contact_no; ?>"><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
