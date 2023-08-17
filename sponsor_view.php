<?php
    require_once('dbconnect.php');
    $userType = $_GET['userType'];
    $designation = $_GET['designation'];
    $email = $_GET['email'];
    $pin = $_GET['pin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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

        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            text-align: right;
            border-bottom: 2px solid #007BFF; 
            background-color: #007BFF; /* Perfect Blue background */
            padding: 10px;
            width: 5%; /* Adjust the width as needed */
            box-sizing: border-box;
            z-index: 100;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .advisor-info {
            text-align: center;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .club-logo {
            width: 100px; /* Adjust the width as needed */
        }

  
        .upcoming-events-dev {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            color: white;
        }

        .advisor-details-dev {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            color: white;
        }

        .event {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #007BFF; /* Blue background */
            position: relative;
        }
        .donate-button {
            background-color: #F8F9FA; /* Off-white */
            color: #007BFF; /* Perfect Blue text color */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
            margin-right: 5px;
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
    <div class="navbar">
        <a href="logout.php">Logout</a>
    </div>
    
    <div class="advisor-info">
        <img src="img/bracu_logo.png" alt="Club Logo" class="club-logo">
        <h1 class="sponsor"><?php echo 'Welcome!'; ?></h1>
    </div>

    <div class="events-section">
        <h2 class = 'section-heading'>Upcoming Events</h2>
        <div class="upcoming-events-dev">
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
                
                <a href="donate.php?event_id=<?php echo $row[0]; ?>&email=<?php echo $email; ?>" class="donate-button">Donate</a>

            </div>
            <?php 
                    }                    
                }
            ?>
        </div>
    </div>


    





    <div class="footer">
    <p>&copy; 2023 University Management Platform. All rights reserved.</p>
  </div>
</body>
</html>
