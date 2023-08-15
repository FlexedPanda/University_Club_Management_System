<?php
// Include your database connection code here (dbconnect.php or similar)

// Retrieve the member details from the URL parameters
$student_id = $_GET['student_id'];
$name = $_GET['name'];
$designation = $_GET['designation'];
$email = $_GET['email'];
$dob = $_GET['dob'];
$department = $_GET['department'];
$gender = $_GET['gender'];
$pin = $_GET['pin'];
$contact_no = $_GET['contact_no'];

// Check if the form has been submitted for updating member details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated member details from the form
    $updatedName = $_POST['name'];
    $updatedDesignation = $_POST['designation'];
    $updatedEmail = $_POST['email'];
    $updatedDob = $_POST['dob'];
    $updatedDepartment = $_POST['department'];
    $updatedGender = $_POST['gender'];
    $updatedPin = $_POST['pin'];
    $updatedContactNo = $_POST['contact_no'];

    // Update the member details in the database
    require_once('dbconnect.php'); // Include your database connection script
    $updateSql = "UPDATE member SET name='$updatedName', designation='$updatedDesignation', email='$updatedEmail', dob='$updatedDob', department='$updatedDepartment', gender='$updatedGender', pin='$updatedPin', contact_no='$updatedContactNo' WHERE student_id=$student_id";
    
    if (mysqli_query($conn, $updateSql)) {
        // Database update successful
        mysqli_close($conn);
        
        echo 'Go back, successfully updated';
        //header("Location: home.php");
        exit();
    } else {
        // Database update failed
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <style>
        /* Your styles here */
    </style>
</head>
<body>
    <h2>Edit Member Details</h2>
    <form action="edit_member.php?student_id=<?php echo $student_id; ?>&name=<?php echo $name; ?>&designation=<?php echo $designation; ?>&email=<?php echo $email; ?>&dob=<?php echo $dob; ?>&department=<?php echo $department; ?>&gender=<?php echo $gender; ?>&pin=<?php echo $pin; ?>&contact_no=<?php echo $contact_no; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" value="<?php echo $designation; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>"><br>

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
</body>
</html>
