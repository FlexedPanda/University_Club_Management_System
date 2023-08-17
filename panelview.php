<?php
$userType = $_GET['userType'];
$designation = $_GET['designation'];
$email = $_GET['email'];
$pin = $_GET['pin'];

require_once('dbconnect.php');

$sql = "SELECT club,student_id FROM member WHERE designation = '$designation' AND email = '$email' AND pin = $pin";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $clubname = $row['club'];
    $student_id = $row['student_id'];

} else {
    $clubname = 'Default Club Name';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/panelview.css">
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

    <div class="incoming_request">
        <h2 class="section-heading">Incoming Request</h2>
        <div class="incoming_member-table">
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
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
                <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM incoming_request";
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
                    <td><a href="accept_member.php?student_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&designation=<?php echo $row[2]; ?>&email=<?php echo $row[3]; ?>&dob=<?php echo $row[4]; ?>&department=<?php echo $row[5]; ?>&gender=<?php echo $row[6]; ?>&club=<?php echo $clubname; ?>&pin=<?php echo $row[8]; ?>&contact_no=<?php echo $row[9]; ?>" class="Accept_member">Accept</a></td>
                    <td><a href="reject_member.php?student_id=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>&designation=<?php echo $row[2]; ?>&email=<?php echo $row[3]; ?>&dob=<?php echo $row[4]; ?>&department=<?php echo $row[5]; ?>&gender=<?php echo $row[6]; ?>&club=<?php echo $clubname; ?>&pin=<?php echo $row[8]; ?>&contact_no=<?php echo $row[9]; ?>" class="Reject_member">Reject</a></td>
                </tr>
                <?php
}
                    }
                ?>
            </table>
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
