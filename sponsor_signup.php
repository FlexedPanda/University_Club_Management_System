<?php
    require_once("dbconnect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orgName = $_POST["org_name"];
        $contactEmail = $_POST["contact_email"];
        $pin = $_POST["pin"];

        $sql = "INSERT INTO sponsor (email, pin, name, designation, funding) VALUES ('$contactEmail', '$pin', '$orgName', 'sponsor', 0)";

        if ($conn->query($sql) === TRUE) {
            $message = "We are done making your account. Now please login with your credentials.";
            header("Location: login.php?message=" . urlencode($message));
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsor Submission</title>
    <style>
        body  {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img/bracubackground.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .submission-section {
            text-align: center;
            padding: 40px;
            /* Change to blue */
            color: white;
        }

        .form-logo {
            width: 120px; /* Adjust the width as needed */
        }

        .form-container {
            background-color: rgb(50,92,112); /* Dark gray color */
            padding: 40px;
            color: white;
            margin: 20px auto; /* Center align horizontally */
            max-width: 475px; /* Set a maximum width */
            box-sizing: border-box;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .submit-button {
            background-color: #F8F9FA; /* Off-white */
            color: #007BFF; /* Perfect Blue text color */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="submission-section">
        <img src="img/bracu_logo.png" alt="Form Logo" class="form-logo">
        
    </div>

    <div class="form-container">
        <form action="sponsor_signup.php" method="post">
            <h2 class="sponsor">Submit Your Sponsor Information</h2>
            <label for="org_name">Organization Name:</label>
            <input type="text" id="org_name" name="org_name" required>
            
            <label for="contact_email">Contact Email:</label>
            <input type="email" id="contact_email" name="contact_email" required>
            
            <label for="pin">Pin:</label>
            <input type="password" id="pin" name="pin" required>
            
            <label for="Confirm pin">Confirm Pin:</label>
            <input type="password" id="Confirm pin" name="Confirm pin" required>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2023 University Management Platform. All rights reserved.</p>
    </div>
</body>
</html>
