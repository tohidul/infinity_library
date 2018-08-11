<!DOCTYPE html>
<html>
<head>
	<title>Rules and Regulations</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">

	<style type="text/css">
		#footer{
	position: absolute;
	top: 118%;
	width: 100%;
	height: 200px;
	background-color: black;
	color: white
}
#footer_home{
	position: absolute;
}
#footer_links{
	position: absolute;
	left: 80%;
}
#footer_social{
	position: absolute;
	left: 40%;
	top: 20%;
}
#footer_copyright{
	position: absolute;
	left: 36%;
	top: 90%;
}
.f_link:link, .f_link:visited {
    background-color: black;
    color: white;
    border: 2px solid black;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

}


.f_link:hover, .f_link:active {
    background-color: white;
    color: black;
}







.fa {
  padding: 18px;
  font-size: 30px;
  width: 16px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 30%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

	</style>
</head>
<body>
	<div id="top_panel">
		<img src="topImg.jpg" alt="top_image" width="100%" height="188px" id="top_image">
		<div><a href="home.php" id='top_left_link'>Infinity Library</a></div>
		<div id="top_main_links">
			<a href="home.php" class="main_links">Home &nbsp</a>
			<a href="search.php" class="main_links">Search &nbsp</a>
			<a href="rules.php" class="main_links">Rules &nbsp</a>
			<a href="announcement.php" class="main_links">Announcement &nbsp</a>
			<a href="about.php" class="main_links">About &nbsp</a>
			
		</div>

		<?php
		session_start();
		if (isset($_SESSION["current_user"])) {
				echo '<div id="top_right_links">';
				echo '<div class="user_dropdown">';
  				echo'<button class="user_dropbtn">';
  				echo "Welcome ";
  				echo $_SESSION['current_user'];
  				echo '</button>';
  				echo '<div class="user_dropdown-content">';
    			echo '<a href="profile.php">Your Profile</a>';
    			echo '<a href="booking.php">Bookings</a>';
    			echo '<a href="logout.php">Log Out</a>';
  				echo '</div>';
  				echo '</div>';
  				echo "</div>";
  			}
  			else{
				echo '<div id="top_right_links">
				<a href="registration.php" class="main_links">Sign Up</a>
				<span style="color: white;">||</span>
				<a href="login.php" class="main_links">Login &nbsp</a>
				</div>';
			}
		?>
	<h1>Rules and Regulations</h1>
	<p>One Book can be Borrowed by a Student for up to 7 Days for Free.</p>
	<p>One Book can be Borrowed by a Teacher for up to 30 Days for Free.</p>
	<p>If a Student Borrowed for More then 7 Days then He/She Must Pay 10 Taka Fine Each Day after the Initial 7 Days</p>
	<p>If a Teacher Borrowed for More then 30 Days then He/She Must Pay 10 Taka Fine Each Day after the Initial 30 Days</p>
	<p>Borrower will be Fined if the Book is Damaged in any way</p>
	<p>Said Fine is going to be Decided by the Authority Based on the Damage</p>
	<p>If a Book is Reserved and Not Taken Within 24 Hours then The Reservation is Revoked</p>
	<div id="footer">
		<div id="footer_home"><a href="home.php" class="f_link">Infinity Library</a></div>
		<div id="footer_links">
			<a href="about.php" class="f_link">About</a><br>
			<a href="privacy.php" class="f_link">Privacy Policy</a><br>
			<a href="rules.php" class="f_link">Rules and Regulations</a><br>
			<a href="terms.php" class="f_link">Terms and Conditions</a><br>
		</div>
		<div id="footer_social">
			Follow Us:
			<br>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-google"></a>
		</div>
		<div id="footer_copyright">
			Copyright &copy 2017 Infinity Library. All Rights Reserved.
		</div>

	</div>
</body>
</html>