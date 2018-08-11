<?php
	session_start();
?>
<?php
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "infinity_library";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	elseif ($conn->select_db('infinity_library') === false) {
	    // Create database
		//echo "Creating Database"."<br>";
		$sql = "CREATE DATABASE infinity_library";
		if ($conn->query($sql) === TRUE) {
		    //echo "Database created successfully"."<br>";
		    //echo "Creating Table"."<br>";
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    $sqlq = "CREATE TABLE library_user (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			type INT(8) NOT NULL,
			fname VARCHAR(30) NOT NULL,
			lname VARCHAR(30) NOT NULL,
			email VARCHAR(30) NOT NULL,
			phone VARCHAR(18) NOT NULL,
			dob DATE NOT NULL,
			address VARCHAR(60) NOT NULL,
			validation INT(8) NOT NULL
			)";

			if ($conn->query($sqlq) === TRUE) {
			    //echo "Table created successfully" ."<br>";
			} else {
			    echo "Error creating table: " . $conn->error;
			}
			} else {
		    echo "Error creating database: " . $conn->error;

			}
			$sqlq = "CREATE TABLE book_information (
				book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				book_name VARCHAR(30) NOT NULL,
				number_of_copy INT(6) NOT NULL,
				number_of_booked INT(6) NOT NULL,
				genre VARCHAR(30) NOT NULL,
				author VARCHAR(30) NOT NULL,
				publisher VARCHAR(30) NOT NULL,
				publisher_information VARCHAR(60) NOT NULL,
				picture BLOB NOT NULL
				)";

				if ($conn->query($sqlq) === TRUE) {
				    //echo "Table bookinfo created successfully" ."<br>";
				} else {
				    echo "Error creating table: " . $conn->error;
				}
	}

	$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Infinity Library</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="home2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		#midImg{
			position: absolute;
			left: 27%;

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
				/*echo '<div id="top_right_links">
						<a href="registration.php" class="main_links">Welcome ';
				echo $_SESSION["current_user"]; 
				echo '</a>
					</div>';*/
				
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "infinity_library";
				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
				if(mysqli_connect_error()){
					die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
				}
				$test = 4;
				$sql_query = "SELECT type FROM library_user WHERE username='".$_SESSION["current_user"]."'";
				$result = $conn->query($sql_query);
				$row = $result->fetch_assoc();
				//echo '<div id="test"><p>sdfrfer</p></div>';
				
				if ($row['type'] == 4) {
					//echo "admin";
					echo "<div id = 'add_book'>";
					echo'<a id = "admin_add_book" href="add_book.php" target="_blank" >Add Books</a>';
					echo "</div>";
					//echo '<div id="test"><p>sdfrfer</p></div>';
					/*echo $_SESSION["current_user"];
					while($row = mysqli_fetch_assoc($result)) {
       					 echo "id: " . $row["type"]. " - Name: " . $row["username"].   "<br>";
    				}*/
    				echo "<div id = 'manage_book'>";
    				echo'<a class = "admin_work" href="manage_books.php" target="_blank" >Manage Books</a>';
    				echo "</div>";

    				echo "<div id = 'approve_member'>";
    				echo'<a class = "admin_work" href="approve_member.php" target="_blank" >Approve Members</a>';
    				echo "</div>";

    				echo "<div id = 'manage_booking'>";
    				echo'<a class = "admin_work" href="manage_booking.php" target="_blank" >Manage Bookings</a>';
    				echo "</div>";

    				echo "<div id = 'revoke_membership'>";
    				echo'<a class = "admin_work" href="revoke_membership.php" target="_blank" >Revoke Membership</a>';
    				echo "</div>";

    				echo "<div id = 'add_announcement'>";
    				echo'<a class = "admin_work" href="add_announcement.php" target="_blank" >Add Announcement</a>';
    				echo "</div>";
				}
				else if($row['type']==3){
					echo "<div id = 'add_book'>";
					echo'<a id = "admin_add_book" href="add_book.php" target="_blank" >Add Books</a>';
					echo "</div>";

					echo "<div id = 'manage_book'>";
    				echo'<a class = "admin_work" href="manage_books.php" target="_blank" >Manage Books</a>';
    				echo "</div>";

    				echo "<div id = 'approve_member'>";
    				echo'<a class = "admin_work" href="approve_member.php" target="_blank" >Approve Members</a>';
    				echo "</div>";

    				echo "<div id = 'manage_booking'>";
    				echo'<a class = "admin_work" href="manage_booking.php" target="_blank" >Manage Bookings</a>';
    				echo "</div>";

    				echo "<div id = 'add_announcement'>";
    				echo'<a class = "admin_work" href="add_announcement.php" target="_blank" >Add Announcement</a>';
    				echo "</div>";


				}
				else{
					//echo "not admin";
					echo "<div id='midImg'><img src='logo.png' width=100%></div>";
					//echo "<div id='midImg'><img src='Background.jpg' width=50%></div>";
				}

	   
				
				$conn->close();

			 }
			 else{
				echo '<div id="top_right_links">
				<a href="registration.php" class="main_links">Sign Up</a>
				<span style="color: white;">||</span>
				<a href="login.php" class="main_links">Login &nbsp</a>
				</div>';

				echo "<div id='midImg'><img src='logo.png' width=100%></div>";
				//echo "<div id='midImg'><img src='Background.jpg' width=50%></div>";
			}
		?>
		
		
		
	</div>

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