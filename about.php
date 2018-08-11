<!DOCTYPE html>
<html>
<head>
	<title>About</title>
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
		<div><a href="home.php" id='top_left_link'>EWU Library</a></div>
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
	<h1>About</h1>
	<p>Our Goal is to Create a Website which can Help any Student or Faculty Find his/her Desired Books With Minimum Effort and also Reserve them if they wishes to do so.</p>
	<h1>Developed By</h1>
	<table>
		<tr>
			<td>Mahfuz Tushar</td>
			<td><a href="mailto:abc@gmail.com" target="_top">Email</a><br><a href="#">Facebook</a></td>
		</tr>
		<tr>
			<td>Rumman Jhinik</td>
			<td><a href="mailto:abc@gmail.com" target="_top">Email</a><br><a href="#">Facebook</a></td>
		</tr>
		<tr>
			<td>Group Member</td>
			<td><a href="mailto:abc@gmail.com" target="_top">Email</a><br><a href="#">Facebook</a></td>
		</tr>
	</table>
	Please do get in touch if you have any queries.

	<div id="footer">
		<div id="footer_home"><a href="home.php" class="f_link">EWU Library</a></div>
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
			Copyright &copy 2017 EWU Library. All Rights Reserved.
		</div>

	</div>
</body>
</html>