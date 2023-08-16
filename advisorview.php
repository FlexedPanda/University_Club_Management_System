<?php
require_once("dbconnect.php");
// sponsor request accept or reject
if(isset($_POST['accept_request'])) {
    $sponsorID = $_POST['sponsorID'];
    $amount = $_POST['amount'];
    
    $sql = "SELECT * FROM advisor";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
            

    // Update the advisor's balance
    $updateQuery = "UPDATE advisor SET balance = balance + $amount WHERE id = $row[3]"; 
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Successfully updated balance
        echo "Successfully added funding.";
    } else {
        echo "Error updating balance: " . mysqli_error($conn);
    }
}
}
//withdrawing money 
$sql = "SELECT * FROM advisor";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result))
if(isset($_POST['withdraw_balance'])) {
    $updateQuery = "UPDATE advisor SET balance = 0 WHERE id = $row[3]"; 
    $updateResult = mysqli_query($conn, $updateQuery);
    

    if ($updateResult) {
        echo "Successfully withdrawn all funds.";
    } else {
        echo "Error withdrawing funds: " . mysqli_error($conn);
    }
}
}
// provide fund to the event
if(isset($_POST['provide_fund'])) {
    $eventID = $_POST['eventID'];
    $fundAmount = $_POST['fundAmount'];
    $insufficientBalance = false; // Flag to track insufficient balance
    $exceedsCost = false; // Flag to track exceeding cost
    
    // Check if all advisors have sufficient balance
    $sqlAdvisor = "SELECT * FROM advisor";
    $resultAdvisor = mysqli_query($conn, $sqlAdvisor);
    if(mysqli_num_rows($resultAdvisor) > 0){
        while($rowAdvisor = mysqli_fetch_array($resultAdvisor)){
            $advisorBalance = $rowAdvisor[6];
            
            if ($advisorBalance < $fundAmount) {
                $insufficientBalance = true; // Set the flag to true
                break; // Exit the loop since funding is not possible
            }
        }
    }
    
    // Check if the total funding amount exceeds the event's cost
    $sqlEvent = "SELECT * FROM event WHERE event_id = $eventID";
    $resultEvent = mysqli_query($conn, $sqlEvent);
    $eventRow = mysqli_fetch_array($resultEvent);
    $totalFunding = $eventRow[8] + $fundAmount; // Money received + New funding
    
    if ($totalFunding > $eventRow[2]) {
        $exceedsCost = true; // Set the flag to true
    }
    
    if ($insufficientBalance) {
        echo "Funding not possible due to insufficient balance for at least one advisor.";
    } elseif ($exceedsCost) {
        echo "Funding not possible because total funding exceeds the event's cost.";
    } else {
        // Update the money received for the event
        $updateEventQuery = "UPDATE event SET money_received = money_received + $fundAmount WHERE event_id = $eventID"; 
        $updateEventResult = mysqli_query($conn, $updateEventQuery);

        if ($updateEventResult) {
            // Successfully updated event's money received
            
            // Deduct the fund amount from advisors' balances
            $resultAdvisor = mysqli_query($conn, $sqlAdvisor);
            if(mysqli_num_rows($resultAdvisor) > 0){
                while($rowAdvisor = mysqli_fetch_array($resultAdvisor)){
                    $advisorID = $rowAdvisor[3];
                    $updateBalanceQuery = "UPDATE advisor SET balance = balance - $fundAmount WHERE id = $advisorID"; 
                    $updateBalanceResult = mysqli_query($conn, $updateBalanceQuery);

                    if (!$updateBalanceResult) {
                        echo "Error deducting balance from advisor with ID $advisorID: " . mysqli_error($conn);
                    }
                }
            }
            
            echo "Successfully provided funding for the event.";
        } else {
            echo "Error providing funding: " . mysqli_error($conn);
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
        }


    </style>
</head>
<body>
    <div class="navbar">
        <a href="logout.php">Logout</a>
    </div>
    
    <div class="advisor-info">
        <img src="img/bracu_logo.png" alt="Club Logo" class="club-logo">
        <h1 class="advisor"><?php echo 'Advisor View'; ?></h1>
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

            </div>
            <?php 
                    }                    
                }
            ?>
        </div>
    </div>

    <div class="funding-requests">
    <h2 class="section-heading">Incoming Funding </h2>
    <div class="incoming-requests">
    <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM sponsor";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
                <div class="request">
    <p>Sponsor: <?php echo $row[1]; ?></p>
    <p>Amount: <?php echo $row[2]; ?></p>
    <form action="" method="post">
        <input type="hidden" name="sponsorID" value="<?php echo $row[0]; ?>">
        <input type="hidden" name="amount" value="<?php echo $row[2]; ?>">
        <button class="accept-request" name="accept_request">Add</button>
        <button class="reject-request">Reject</button>
    </form>
</div>
            <?php 
                    }                    
                }
            ?>
  
    </div>
</div>
    <div class="advisor-details">
        <h2 class = 'section-heading'>Advisor Details</h2>
        <div class="advisor-details-dev">
            <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM advisor";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
            <div class="advisor">
                <h3> Name: <?php echo $row[1]; ?></h3>
                <p> ID: <?php echo $row[3]; ?></p>
                <p> Bank Account Mumber: <?php echo $row[4]; ?></p>
                <p> Balance: <?php echo $row[6]; ?></p>
                <form action="" method="post">
        <button class="withdraw-balance" name="withdraw_balance">Withdraw All Funds</button>
    </form> 

            </div>
            <?php 
                    }                    
                }
            ?>
        </div>
    </div>

<style>
    .section-heading {
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 5px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        margin-bottom: 10px;
    }

    .incoming-requests {
        background-color: rgba(0, 0, 0, 0.7); /* Transparent black background */
        padding: 20px;
        color: white;
    }

    .request {
        border: 1px solid rgba(0, 0, 0, 0.5); /* Transparent black border */
        padding: 10px;
        margin-bottom: 10px;
        background-color: #007BFF; /* Blue background */
    }

    .accept-request,
    .reject-request {
        background-color: #F8F9FA; /* Off-white */
        color: #007BFF; /* Perfect Blue text color */
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
        margin-right: 5px;
    }



        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            /* Add styles for table cells */
            border: 1px solid rgba(0, 0, 0, 0.5); /* Transparent black border */
            padding: 10px;
            background-color: #007BFF; /* Blue background */
            color: white;
        }

        th {
            /* Add styles for table header cells */
            background-color: rgba(0, 0, 0, 0.5); /* Transparent black background */
            color: white;
        }





</style>



<div class="search-event">
        <h2 class="section-heading">Event Details:</h2>
        <div class="event-table">
        <table>
    <tr>
        <th>Event ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Capacity</th>
        <th>Venue</th>
        <th>OCA ID</th>
        <th>Club name</th>
        <th>Cost</th>
        <th>Money Received</th>
        <th>Provide fund</th> <!-- New column header -->
    </tr>
    <?php 
    require_once("dbconnect.php");
    $sql = "SELECT * FROM event";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?></td>
        <td><?php echo $row[6]; ?></td>
        <td><?php echo $row[7]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[8]; ?></td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="eventID" value="<?php echo $row[0]; ?>">
                <input type="number" name="fundAmount" placeholder="Enter Amount" required>
                <button class="provide-fund" name="provide_fund">Provide Fund</button>
            </form>
        </td>
    </tr>
    <?php
        }
    }
    ?>
</table>
        </div>
    </div>
<div class="pb-4 pt-3 text-center text-L text-white-600 dark: text-white-300 md: px-[60px] md:pb-6 md:pt-3"> <span>
University Club Management System
</span>
</div>
</div>
</body>
</html>




