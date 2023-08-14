<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['userType']) && isset($_POST['designation'])&& isset($_POST['email'])&& isset($_POST['pin'])){
	// write the query to check if this username and password exists in our database
	$u = $_POST['userType'];
	//echo $u;
	$p = $_POST['designation'];
	$x = $_POST['email'];
	$y = $_POST['pin'];
	$sql = "SELECT * FROM $u WHERE designation = '$p' AND email = '$x' AND pin = $y";
	
	//Execute the query 
	$result = mysqli_query($conn, $sql);
	
	//check if it returns an empty set
if(mysqli_num_rows($result) != 0 ){
    // Redirect to studentview.php and pass the variables using URL parameters
    header("Location: studentview.php?userType=$u&designation=$p&email=$x&pin=$y");
    exit();
}
	else{
		echo "Username or Password is wrong";
		//header("Location: index.php");
	}
	
}


?>
