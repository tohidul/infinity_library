<!DOCTYPE html>
<html>
<head>
	<title>Privacy Policy</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">

	<style type="text/css">
		#footer{
	position: absolute;
	top: 128%;
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
	<h1>Privacy Policy</h1>
	<p>We are dedicated with securing your protection Furthermore keeping you educated for how your majority of the data will be utilized.</p>
	<p>Our website employments treats to recognize you from different clients of the website. An treat is An little document about letterpress and numbers that is saved ahead your gadget. Those treats set might acquire data regarding you, your computer, your utilization of our website What's more your all web use.</p>
	<p>We might gather information data the place accessible over your ip address, working framework Furthermore program sort. This will be information regarding users' scanning activities Also designs. It is used to illuminate upgrades of the website, to framework administration, and should report card aggravator data with third gatherings.</p>
	<p>We utilize efforts to establish safety will protect your majority of the data from get Toward unauthentic persons Also against unlawful processing, unintentional loss, decimation or harm. Unfortunately, the transmission of majority of the data by means of the web is never totally secure. In spite of the fact that we will would our best with secure your personage data, we can't ensure those security for your particular alternately other information transmitted to our website. At whatever transmission is at your own hazard. When we bring gained your information, we will utilize strict methods Furthermore security Characteristics on forestall unauthentic get.</p>
	<p>The website may, from the long run with time, hold numerous joins to Furthermore from those sites for third gatherings. In you take after An join on whatever of these websites, Kindly note that these sites need their security approaches and that we don't acknowledge any obligation or obligation for these strategies. Kindly weigh these approaches in front of you submit whatever particular information to these outsider sites.</p>
	<p>We might revise this arrangement starting with the long haul should the long haul. On we make At whatever generous progressions we will inform you by presenting An noticeable perceive on the website.</p>
	<p>Transmission from claiming data by means of the web is not totally secure. In spite of the fact that we will would our best on protect your personal data, we can't ensure those security about information transmitted of the website. Any transmission may be during your own hazard. Once we need accepted your information, we will utilization strict methods Also security Characteristics to keep unauthentic entry.</p>

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