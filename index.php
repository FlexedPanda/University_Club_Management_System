<?php
require_once("dbconnect.php");

$clubSql = "SELECT name from club";
$clubResult = mysqli_query($conn, $clubSql);
$club = array();
while($row  =mysqli_fetch_row($clubResult)){
  array_push($club,$row[0]);
}




?>







<style>
 *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
}


nav {
  display: flex;
  justify-content: space-between;
  background-color: #325c70;
  align-items: center;
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
  height: 25rem;
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

.hero-select {
  font-family: inherit;
  font-size: 1rem;
  padding: 0.4rem;
  border-radius: 11px;
  border: none;
  font-weight: 500;
  outline: none;
  color: #555;
}

.container {
  width: 96rem;
  margin: 0 auto;
}

.upcoming-events {
  display: grid;
  grid-template-columns: repeat(auto-fit, 16rem);
  gap: 2.4rem;
}

.upcoming-card {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  padding: 1.2rem;
  border-radius: 9px;
  font-size: 1rem;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
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
  margin-top: 3.2rem;
  margin-bottom: 3.2rem;
}

.upcoming-title {
  margin-bottom: 1.6rem;
  padding-left: 1.2rem;
  font-size: 1.6rem;
  color: #333;
}

.sponsorship-div {
  background-color: #f5f5f5;
  padding: 20px;
  text-align: center;
  margin-top: 20px;
}

</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="logo">
        
        

      </div>

      <ul class="nav-items">
        
        <li>
          <a href="register.php">Sign up</a>
        </li>
        <li>
          <a href="login.php">Log in</a>
        </li>
      </ul>
    </nav>

    <section class="hero">
      <h1 class="hero-title">Welcome to Brac University Club Connect</h1>
      <p class="hero-semi-title">Explore your passion with patience</p>
      <select class="hero-select">
        <option>All Clubs</option>

        <?php 
        foreach ($club as $value) {
          ?>
          <option><?php echo $value;?></option>
          <?php
        }
        ?>
        
      </select>
    </section>

    <section class="section-upcoming container">
      <h4 class="upcoming-title">Upcoming Events</h4>
      <div class="upcoming-events">
      <?php 
          $eventSql = "SELECT name, date, vanue, club_name from event";
          $eventResult = mysqli_query($conn, $eventSql);
          
          
          while($row  = mysqli_fetch_row($eventResult)){
            ?>
        <div class="upcoming-card">
          
          <div>
            <p>Event Name:</p>
            <p><?php echo $row[0];?></p>
          </div>

          <div>
            <p>Hosted by:</p>
            <p><?php echo $row[3];?></p>
          </div>

          <div>
            <p>Venue:</p>
            <p><?php echo $row[2];?></p>
          </div>

          <div>
            <p>Date:</p>
            <p><?php echo $row[1];?></p>
          </div>
          
        </div>
        <?php
          }
          ?>
      </div>
      
      <div class="sponsorship-div">
        <p>Interested in Sponsorship? <a href='sponsor_signup.php'>Signup as Sponsor</a></p>
        
      </div>

    </section>
  </body>
</html>
