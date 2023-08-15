<?php
require_once('dbconnect.php');

if(isset($_POST['userType']) && isset($_POST['designation'])&& isset($_POST['email'])&& isset($_POST['pin'])){
	$u = $_POST['userType'];
	$p = $_POST['designation'];
	$x = $_POST['email'];
	$y = $_POST['pin'];

	$sql = "SELECT * FROM $u WHERE designation = '$p' AND email = '$x' AND pin = $y";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) != 0 ){
		if ($u == 'member'){
			if ($p=="president" || $p=="vice president" || $p=="secretary"){
				header("Location: panelview.php?userType=$u&designation=$p&email=$x&pin=$y");
				exit();
			}

			else{
				header("Location: studentview.php?userType=$u&designation=$p&email=$x&pin=$y");
			exit();}
		}

		elseif ($u == 'advisor'){
			header("Location: advisorview.php?userType=$u&designation=$p&email=$x&pin=$y");
			exit();
		}

		elseif ($u == 'oca'){
			header("Location: ocaview.php?userType=$u&designation=$p&email=$x&pin=$y");
			exit();
		}
	}

	else{
		echo "Username or Password is wrong";
		header("Location: login.php");
	}

}

?>
