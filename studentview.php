<?php
// Retrieve the variables from URL parameters
$userType = $_GET['userType'];
$designation = $_GET['designation'];
$email = $_GET['email'];
$pin = $_GET['pin'];

// Connect to the database
require_once('dbconnect.php');

// Retrieve the club name based on user's designation, email, and pin
$sql = "SELECT club,student_id FROM member WHERE designation = '$designation' AND email = '$email' AND pin = $pin";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $clubname = $row['club'];
    $student_id = $row['student_id'];
} else {
    // Handle error or default club name if necessary
    $clubname = 'Default Club Name';
}

// Close the database connection
//mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img/bracubackground.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            text-align: right;
            border-bottom: 2px solid #B6D0E2; /* Perfect Blue border */
            background-color: #B6D0E2; /* Perfect Blue background */
            padding: 10px;
            width: 30%; /* Adjust the width as needed */
            box-sizing: border-box;
            z-index: 100;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .club-info {
            text-align: center;
            padding: 50px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .club-logo {
            width: 100px; /* Adjust the width as needed */
        }

        .club-name {
            color: white;
            font-size: 24px;
            margin-top: 10px;
        }

        .events-section {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .ongoing-events-dev {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            color: white;
        }

        .event {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #B6D0E2; /* Blue background */
        }

        .join-event {
            background-color: #F8F9FA; /* Off-white */
            color: #B6D0E2; /* Perfect Blue text color */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .panel-messages {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .Dept-messages {
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        font-family: Arial, sans-serif;
        margin-top: 20px;
    }

    .departmentmessages {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: rgba(0, 0, 0, 0.5); /* Background color similar to ongoing events */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
    }

    .departmentmessages h3 {
        color: #B6D0E2; /* Perfect Blue text color */
        font-size: 18px;
    }

    .departmentmessages p {
        color: white;
        font-size: 14px;
    }



    </style>
</head>
<body>
    <div class="navbar">
        <a href="logout.php">Logout</a>
    </div>
    
    <div class="club-info">
        <img src="img/bracu_logo.png" alt="Club Logo" class="club-logo">
        <h1 class="club-name"><?php echo $clubname; ?></h1>
    </div>

    <div class="events-section">
        <h2>On Going Club Events</h2>
        <div class="ongoing-events-dev">
            <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM event";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
            <div class="event">
                <h3><?php echo $row[1]; ?></h3>
                <p> Venue: <?php echo $row[5]; ?></p>
                <p> Date: <?php echo $row[3]; ?></p>
                <form action="joinevent.php" method="post">
                    <input type="hidden" name="eventID" value="<?php echo $row[0]; ?>">
                    <input type="hidden" name="studentID" value="<?php echo $student_id; ?>">
                    <button type="submit" class="join-event-button">Join Event</button>
                </form>
            </div>
            <?php 
                    }                    
                }
            ?>
        </div>
    </div>

    <div class="Dept-messages">
    <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM departmentmessages";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
            <div class="departmentmessages">
                <h3><?php echo $row[0]; ?></h3>
                <p> Message: <?php echo $row[1]; ?></p>
                
            </div>
            <?php 
                    }                    
                }
            ?>
    </div>
</body>
</html>
