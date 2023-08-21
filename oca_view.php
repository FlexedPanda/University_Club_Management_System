<?php
$userType = $_GET['userType'];
$designation = $_GET['designation'];
$email = $_GET['email'];
$pin = $_GET['pin'];

require_once('dbconnect.php');

$clubname = 'OCA';

?>

<?php

if (isset($_POST["provide_fund"])) {
    $eventID = $_POST["eventID"];
    $fundAmount = $_POST["fundAmount"];
    $sql = "SELECT * FROM oca";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))

    // Update the funding attribute of OCA club
    $updateSQL = "UPDATE oca SET funding = funding + $fundAmount WHERE id = $row[1]";
    $updateResult = mysqli_query($conn, $updateSQL);
    
    if ($updateResult) {
        echo "Fund provided to advisor for events";
    } else {

        echo "Error updating funding: " . mysqli_error($conn);
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/oca_view.css">

</head>
<body background='img/bracubackground.jpg'>
    <div class="navbar">
        <a href='department_list.php'>Department</a>
        <a href='club_list.php'>Club</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="club-info">
        <img src="img/bracu_logo.png" alt="Club Logo" class="club-logo">
        <h1 class="club-name"><?php echo $clubname; ?></h1>
    </div>

    <div class="Dept-messages">
    <h2 class="section-heading">Announcements</h2>
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

    <div class="events-section">
    <h2 class="section-heading">On Going Club Events</h2>
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
            </div>
            
            <?php 
                    }
                }
            ?>
            <h2>"Funding for events"</h2>
           <form action="" method="post">
                <input type="hidden" name="eventID" value="<?php echo $row[0]; ?>">
                <input type="number" name="fundAmount" placeholder="Enter Amount" required>
                <button class="provide-fund" name="provide_fund">Provide Fund</button>
            </form>
        </div>
    </div>


<div class="search-member">
        <h2 class="section-heading">Search Member</h2>
        <div class="member-table">
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>PIN</th>
                    <th>Contact No</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM member";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><a href="edit_member.php?student_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&designation=<?php echo $row[2]; ?>&email=<?php echo $row[3]; ?>&dob=<?php echo $row[4]; ?>&department=<?php echo $row[5]; ?>&gender=<?php echo $row[6]; ?>&pin=<?php echo $row[8]; ?>&contact_no=<?php echo $row[9]; ?>" class="edit-member">Edit Member Details</a></td>
                    <td><a href="delete_member.php?student_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&designation=<?php echo $row[2]; ?>&email=<?php echo $row[3]; ?>&dob=<?php echo $row[4]; ?>&department=<?php echo $row[5]; ?>&gender=<?php echo $row[6]; ?>&pin=<?php echo $row[8]; ?>&contact_no=<?php echo $row[9]; ?>" class="edit-member">Delete Member Details</a></td>

                </tr>
                <?php
}
                    }
                ?>
            </table>
        </div>
    </div>





    <div class="incoming_request">
        <h2 class="section-heading">Incoming Request</h2>
        <div class="incoming_member-table">
            <table>
                <tr>
                    <th>Event ID</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Date</th>
                    <th>capicity</th>
                    <th>vanue</th>
                    <th>Club Name</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
                <?php 
                require_once("dbconnect.php");
                $sql_club = "SELECT id FROM oca  WHERE email = '$email' AND pin = $pin ";
                $oca_id = mysqli_query($conn, $sql_club);
                $oca_id1 = mysqli_fetch_array($oca_id);
                //echo $oca_id1[0];

                $sql = "SELECT * FROM incoming_event";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><a href="accept_event.php?event_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&cost=<?php echo $row[2]; ?>&date=<?php echo $row[3]; ?>&capacity=<?php echo $row[4]; ?>&vanue=<?php echo $row[5]; ?>&club_name=<?php echo $row[6]; ?>&oca_id=<?php echo $oca_id1[0]; ?>" class="Accept_event">Accept</a></td>
                    <td><a href="reject_event.php?event_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&cost=<?php echo $row[2]; ?>&date=<?php echo $row[3]; ?>&capacity=<?php echo $row[4]; ?>&vanue=<?php echo $row[5]; ?>&club_name=<?php echo $row[6]; ?>&oca_id=<?php echo $oca_id1[0]; ?>" class="Reject_event">Reject</a></td>
                </tr>
                <?php
}
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>
