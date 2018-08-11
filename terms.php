<!DOCTYPE html>
<html>
<head>
	<title>Terms and Conditions</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">

	<style type="text/css">
		#footer{
	position: absolute;
	top: 168%;
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

	<h1>Terms and Conditions</h1>
	<p><b>Please examine them now. through using the web page you suggest that you receive the terms and situations and that you agree to abide by using them. in case you aren't willing to accept these phrases and situations you may not use the site.</b></p>
	<h2>Access</h2>
	<p>get admission to to the website online is authorized on a brief foundation, and we reserve the right to withdraw or amend the provider we offer at the web site without word.<br>
	once in a while, we may additionally restrict get admission to to a few parts of the website online, or the entire web site, to users who've registered with us.<br>
	in case you select out, or you are provided with, a consumer identity code, password or some other piece of records as a part of our protection tactics, you need to treat such data as non-public, and additionally you have to not reveal it to any third party. we have the right to disable any individual identification code or password, whether selected by means of the usage of you or allotted by using us, at any time, if in our opinion you have got did now not look at any of the provisions of these terms of use.</p>
	<h2>Disclaimer</h2>
	<p>The web site and its contents are for fashionable records simplest and are provided “as is”. We make no warranties, representations or undertakings approximately:
	<ul>
		<li>any of the content material of the site (along with, with out drawback, any as to the best, accuracy, completeness or fitness for any precise purpose of such content material); or</li>
		<li>any content of another third birthday celebration website stated or accessed via hypertext hyperlink through the web site.</li>
	</ul>
	We make no guarantees that the website online is loose from so referred to as computer viruses. it's far strongly advocated that you check for such viruses before downloading it or its contents.</p>
	<h2>Liability</h2>
	<p>The college accepts no liability for any claims, penalties, loss or charges springing up from: any reliance located at the content of the website online; the use or inability to use the website; the downloading of any materials from the website online; or any unauthorised get entry to to or alteration to the web page. This clause shall now not exclude liability for loss of life or private damage as a result of the negligence of the college.</p>
	<h2>Copyright</h2>
	<p>The content of the web page (such as, however now not limited to all text and art work) is protected through copyright. The copyright is owned by way of the college or is otherwise licensed from a third celebration to be used with the aid of the university.<br>
	you could view or download any part of the web page for personal purposes, however you aren't accredited, without our permission, to:
	<ul>
		<li>store the web site, or any a part of the website online, for some other cause;</li>
		<li>print copies of the site, or any part of the web site, for some other cause;</li>
		<li>reproduce, copy or transmit the site, or any a part of the web site, in any way, for every other purpose or in another medium.</li>
	</ul>
	All other rights which aren't mainly granted are reserved.
	</p>

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