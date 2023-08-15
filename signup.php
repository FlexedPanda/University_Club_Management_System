<?php

require_once('dbconnect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentid= $_POST['student_id'];
    $studentid = mysqli_real_escape_string($conn, $studentid);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['date_of_birth'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $club = $_POST['club'];
    $pin= $_POST['pin'];
    $pin = mysqli_real_escape_string($conn, $pin);
    $contact_no = $_POST['contact_no'];
    $contact_no = mysqli_real_escape_string($conn, $contact_no);
    
    $sql = "INSERT INTO incoming_requests (student_id, name, email, date_of_birth, department, gender, club, pin, contact_no) 
            VALUES ('$studentid','$name','$email', '$dob', '$department', '$gender', '$club', '$pin', '$contact_no')";
     

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>




<!DOCTYPE html>
<html>
<head>
    <title>Student Signup</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Student Signup</h2>
        <form action="signup.php" method="post">
            <input type="number" name="student_id" placeholder="student_id" required>
            <input type="text" name="pin" placeholder="pin" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
           
            <input type="date" name="date_of_birth" pattern="\d{4}-\d{2}-\d{2}" placeholder="date_of_birth" required>
            <select name="department" required>
                <option value="IT">Information Technology</option>
                <option value="CS">Computer Science</option>
                <option value="EE">Electrical Engineering</option>
                <!-- Add more departments as needed -->
            </select>
            <label>Gender: </label>
            <input type="radio" name="gender" value="Male" required>Male
            <input type="radio" name="gender" value="Female" required>Female
            <input type="radio" name="gender" value="Other" required>Other
            <input type="text" name="club" placeholder="Club" required>
            <input type="number" name="contact_no" placeholder="Contact_no" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
