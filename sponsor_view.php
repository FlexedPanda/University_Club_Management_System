<?php
    require_once('dbconnect.php');
    $userType = $_GET['userType'];
    $designation = $_GET['designation'];
    $email = $_GET['email'];
    $pin = $_GET['pin'];

    $sponsorSql = "SELECT * from sponsor where email = '$email'";
    $sponsorResult = mysqli_query($conn,$sponsorSql);
    $sponsor = mysqli_fetch_assoc($sponsorResult);
    $funding = $sponsor['funding'];
    $name = $sponsor['name'];

?>

<style>
     *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}


nav {
  display: flex;
  justify-content: space-between;
  background-color: #325c70;
  align-items: left;
  padding: 1.2rem 3.2rem;
}

.nav-items {
  display: flex;
  gap: 1.6rem;
  list-style: none;
}

.nav-items li a {
  text-decoration: none;
  color: #c2ced4;
  font-weight: 500;
  padding: 0.6rem 0.8rem;
  border-radius: 2.8rem;
}

.nav-items li a:hover {
  background-color: #23404e;
}

.hero {
  background-color: #325c70;
  display: flex;
  flex-direction: column;
  height: 15rem;
  align-items: center;
  justify-content: center;
  color: #ebeff1;
}

.hero-title {
  font-size: 2.4rem;
  font-weight: 700;
  margin-bottom: 1.2rem;
  letter-spacing: -0.25px;
}

.hero-semi-title {
  font-size: 1.2rem;
  font-weight: 400;
  margin-bottom: 0.6rem;
}


.upcoming-events {
  
  display: grid;
  grid-template-columns: repeat(auto-fit, 16rem);
  gap: 2.4rem;
}
.container {
  width: 96rem;
  margin: 0 auto;
}

.upcoming-card {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  padding: 1.2rem;
  border-radius: 9px;
  font-size: 1rem;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  background: rgb(255,255,255);
}

.upcoming-card div {
  display: flex;
  gap: 0.4rem;
}

.upcoming-card div p:nth-child(1) {
  font-weight: 500;
  color: #333;
}

.upcoming-card div p:nth-child(2) {
  font-weight: 400;
  color: #555;
}

.section-upcoming {
    
  margin-top: 8rem;
  margin-bottom: 8rem;
}

.upcoming-title {
  background-color: rgb(50, 92, 112);
  margin-bottom: 0.8rem;
  padding-left: 1.2rem;
  margin-right:80rem;
  font-size: 1.6rem;
  color: #FFFFFF;
  border-radius: 9px;
  
  
}
.donate-button {
  background-color: rgb(50, 92, 112);
  color: #F8F9FA;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
</head>
<body background="img/bracubackground.jpg">
<nav>
      <div class="logo">
        
        

      </div>

      <ul class="nav-items">
        
        <li>
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    
    <section class="hero">
    
        <h1 class="hero-title">Welcome!</h1>
        <br>
        <p class="hero-semi-title">Organization name: <?php echo $name?></p>
        <p class="hero-semi-title">Organization funding as of now: <?php echo $funding?> BDT</p>
    </section>

    <section class="section-upcoming container">
        <h2 class = 'upcoming-title'>Upcoming Events</h2>
        <div class="upcoming-events">
            <?php 
                require_once("dbconnect.php");
                $sql = "SELECT * FROM event";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
            ?>
            <div class="upcoming-card">
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
            </section>


    





    <div class="footer">
    <p>&copy; 2023 University Management Platform. All rights reserved.</p>
  </div>
</body>
</html>
