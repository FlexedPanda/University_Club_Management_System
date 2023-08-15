<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/register.css">

</head>
<body background='img/bracubackground.jpg'>
	<div class="body-content">
		<div class="module">
			<h1><center>Create Account</center></h1>
			<form id="fm" action="signup.php" enctype="multipart/form-data" method="POST" name="fm">

				<input type="text" placeholder="Full Name" name="name" id="name" required/>

				<input type="text" placeholder="Student ID" id="stdid" name="stdid" required/>

				<select name="department" id="department">
					<option value="">Select Department</option selected>
					<option value="cse">CSE</option>
					<option value="eee">EEE</option>
					<option value="bba">BBA</option>
					<option value="llb">LLB</option>
				</select required>

				<select id="club" name="club">
					<option value="">Select Club</option selected>
					<option value="BURC">BURC</option>
					<option value="BUCC">BUCC</option>
					<option value="BUEDF">BUEDF</option>
					<option value="BUAC">BUAC</option>
				</select required>

				<input type="text" name="designation" id ="designation" placeholder="Designation" required/>

				<label><b>Gender:</b><br><br></label>
				<div class='gender'>
					<input type="radio" name="gender" value="male"/> <b>Male</b>
					<input type="radio" name="gender" value="female"/> <b>Female</b>
					<br><br>
				</div>

				<label><b>Date of Birth: </b></label>
				<br><br>

					<select name="day" class="combine" id="dob_d">
					  <option>Day</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					  <option value="11">11</option>
					  <option value="12">12</option>
					  <option value="13">13</option>
					  <option value="14">14</option>
					  <option value="15">15</option>
					  <option value="16">16</option>
					  <option value="17">17</option>
					  <option value="18">18</option>
					  <option value="19">19</option>
					  <option value="20">20</option>
					  <option value="21">21</option>
					  <option value="22">22</option>
					  <option value="23">23</option>
					  <option value="24">24</option>
					  <option value="25">25</option>
					  <option value="26">26</option>
					  <option value="27">27</option>
					  <option value="28">28</option>
					  <option value="29">29</option>
					  <option value="30">30</option>
					  <option value="31">31</option>
					</select>

					 <select name="month" class="combine" id="dob_m">
					  <option value="">Month</option>
					  <option value="1">Jan</option>
					  <option value="2">Feb</option>
					  <option value="3">Mar</option>
					  <option value="4">Apr</option>
					  <option value="5">May</option>
					  <option value="6">Jun</option>
					  <option value="7">July</option>
					  <option value="8">Aug</option>
					  <option value="9">Sep</option>
					  <option value="10">Oct</option>
					  <option value="11">Nov</option>
					  <option value="12">Dec</option>
					</select>

					 <select name="year" class="combine" id="dob_y">
					  <option value="">Year</option>
					  <option value="2005">2005</option>
					  <option value="2004">2004</option>
					  <option value="2003">2003</option>
					  <option value="2002">2002</option>
					  <option value="2001">2001</option>
					  <option value="2000">2000</option>
					  <option value="1999">1999</option>
					  <option value="1998">1998</option>
					  <option value="1997">1997</option>
					  <option value="1996">1996</option>
					  <option value="1995">1995</option>
					  <option value="1994">1994</option>
					  <option value="1993">1993</option>
					  <option value="1992">1992</option>
					  <option value="1991">1991</option>
					  <option value="1990">1990</option>
					</select>

				<input type="text" placeholder="Contact no."  id="contact" name="contact"/>

				<input type="text" placeholder="Email"  id="email" name="email"/>

				<input type="password" placeholder="Password"  id="pin" name="pin_1"/>

				<input type="password" placeholder="Confirm Password" name="pin_2" autocomplete="new-password" id="pin2"/>

				<input type="submit" onclick="<a href='login.php'></a>" value="Register" name="reg_user"
				class="btn btn-block btn-primary"/>

				<div class="sign-in">Already have an account? <a href="login.php">Sign in</a></div>
			</form>
		</div>
	</div>

</body>
</html>