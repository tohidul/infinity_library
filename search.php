<?php 

	session_start();
?>





<!DOCTYPE html>
<html>
<head>

	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="home2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  			}
  			else{
				echo '<div id="top_right_links">
				<a href="registration.php" class="main_links">Sign Up</a>
				<span style="color: white;">||</span>
				<a href="login.php" class="main_links">Login &nbsp</a>
				</div>';
			}
		?>

	<?php  
		$search_err="";
		$flag = 0;
		if($_POST){
			if(empty($_POST["search_name"])){
				$search_err = "* enter a name to search";
			}
			else{
				$flag = 1;
			}
		}
		else{











 
				if (isset($_SESSION["current_user"])){
					$c_user = $_SESSION["current_user"];
							
				
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "infinity_library";
					$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
					if(mysqli_connect_error()){
						die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
					}
					$sql_query = "SELECT * FROM book_information";
					$result = $conn->query($sql_query);
					//$row = $result->fetch_assoc();
					//echo $row['book_name'];

					if ($result->num_rows > 0) {
						echo '<div style="position:absolute;top:48%; left:20%;">';
						echo "<table border='1' width='800'>";
								echo'<col width="130">
	  								<col width="80">
	  								<col width="80">
	  								<col width="80">
	  								<col width="180">
	  								<col width="280">';
					    		echo "<tr>";
					    		//echo'<col><col width="100%">';
						    		echo "<th>";
						    		echo "Book Name";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Author";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Genre";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Publisher";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Numer of Copy";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Picture";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "</th>";
					    		echo "</tr>";
				    // output data of each row
				    	while($row = $result->fetch_assoc()) {

				    		$image = $row['picture'];
				    		$image_src = "upload/".$image;
				    		$r_book_id = $row['book_id'];
					    		echo "<tr>";
						    		echo "<td>";
						    		echo $row["book_name"];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['author'];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['genre'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['publisher'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['number_of_copy'];
						    		echo "</td>";
						    		echo "<td style=>";
						    		//file_put_contents('img.png', base64_decode($row['picture']));
						    		echo '<img src="'.$image_src.'"  width="100%"/>';
						    		echo "</td>";
						    		echo "<td>";
						    		echo '<a href="book.php?var='.$c_user.'&var2='.$r_book_id.'">Book</a>';
						    		echo "</td>";

					    		echo "</tr>";
				    		
				        	
				    	}
				    	echo "</table>";
				    	echo "</div>";
					} else {
				    	echo "0 results";
					}

			
		}
		else{
						
				
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "infinity_library";
					$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
					if(mysqli_connect_error()){
						die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
					}
					$sql_query = "SELECT * FROM book_information";
					$result = $conn->query($sql_query);
					
					//$row = $result->fetch_assoc();
					//echo $row['book_name'];

					if ($result->num_rows > 0) {

						echo '<div style="position:absolute;top:48%; left:20%;">';
						echo "<table border='1' width='800'>";
								echo'<col width="130">
	  								<col width="80">
	  								<col width="80">
	  								<col width="80">
	  								<col width="180">
	  								<col width="280">';
					    		echo "<tr>";
					    		//echo'<col><col width="100%">';
						    		echo "<th>";
						    		echo "Book Name";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Author";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Genre";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Publisher";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Numer of Copy";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Picture";
						    		echo "</th>";
						    		
				    // output data of each row
				    	while($row = $result->fetch_assoc()) {

				    		$image = $row['picture'];
				    		$image_src = "upload/".$image;
				    		$r_book_id = $row['book_id'];
					    		echo "<tr>";
						    		echo "<td>";
						    		echo $row["book_name"];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['author'];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['genre'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['publisher'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['number_of_copy'];
						    		echo "</td>";
						    		echo "<td>";
						    		//file_put_contents('img.png', base64_decode($row['picture']));
						    		echo '<img src="'.$image_src.'"  width="100%"/>';
						    		echo "</td>";
						    		

					    		echo "</tr>";
				    		
				        	
				    	}
				    	echo "</table>";
				    	echo "</div>";
					} else {
				    	echo "0 results1";
					}

			

		}











		}
	?>
	<form method="post">
		<div style="position: absolute; left:30%; top:34%;">
			<input type="text" name="search_name" size="44">
			<input type="submit" name="search" value="Search"><br>
			<?php echo $search_err; ?>

		</div>
		
	</form>

	<?php 
		if (isset($_SESSION["current_user"])){
			$c_user = $_SESSION["current_user"];
			if ($flag==1) {
				$search_var = $_POST["search_name"];
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "infinity_library";
					$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
					if(mysqli_connect_error()){
						die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
					}
					$sql_query = "SELECT * FROM book_information WHERE book_name like '%$search_var%'";
					$result = $conn->query($sql_query);
					//$row = $result->fetch_assoc();
					//echo $row['book_name'];

					if ($result->num_rows > 0) {
						echo '<div style="position:absolute;top:48%; left:20%;">';
						echo "<table border='1' width='800'>";
								echo'<col width="130">
	  								<col width="80">
	  								<col width="80">
	  								<col width="80">
	  								<col width="180">
	  								<col width="280">';
					    		echo "<tr>";
					    		//echo'<col><col width="100%">';
						    		echo "<th>";
						    		echo "Book Name";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Author";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Genre";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Publisher";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Numer of Copy";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Picture";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "</th>";
					    		echo "</tr>";
				    // output data of each row
				    	while($row = $result->fetch_assoc()) {

				    		$image = $row['picture'];
				    		$image_src = "upload/".$image;
				    		$r_book_id = $row['book_id'];
					    		echo "<tr>";
						    		echo "<td>";
						    		echo $row["book_name"];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['author'];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['genre'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['publisher'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['number_of_copy'];
						    		echo "</td>";
						    		echo "<td>";
						    		//file_put_contents('img.png', base64_decode($row['picture']));
						    		echo '<img src="'.$image_src.'"  width="100%"/>';
						    		echo "</td>";
						    		echo "<td>";
						    		echo '<a href="book.php?var='.$c_user.'&var2='.$r_book_id.'">Book</a>';
						    		echo "</td>";

					    		echo "</tr>";
				    		
				        	
				    	}
				    	echo "</table>";
				    	echo "</div>";
					} else {
				    	echo "0 results";
					}

			}
		}
		else{
						if ($flag==1) {
				$search_var = $_POST["search_name"];
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "infinity_library";
					$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
					if(mysqli_connect_error()){
						die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
					}
					$sql_query = "SELECT * FROM book_information WHERE book_name like '%$search_var%'";
					$result = $conn->query($sql_query);
					//$row = $result->fetch_assoc();
					//echo $row['book_name'];

					if ($result->num_rows > 0) {
						echo '<div style="position:absolute;top:48%; left:20%;">';
						echo "<table border='1' width='800'>";
								echo'<col width="130">
	  								<col width="80">
	  								<col width="80">
	  								<col width="80">
	  								<col width="180">
	  								<col width="280">';
					    		echo "<tr>";
					    		//echo'<col><col width="100%">';
						    		echo "<th>";
						    		echo "Book Name";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Author";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Genre";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Publisher";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Numer of Copy";
						    		echo "</th>";
						    		echo "<th>";
						    		echo "Picture";
						    		echo "</th>";
						    		
				    // output data of each row
				    	while($row = $result->fetch_assoc()) {

				    		$image = $row['picture'];
				    		$image_src = "upload/".$image;
				    		$r_book_id = $row['book_id'];
					    		echo "<tr>";
						    		echo "<td>";
						    		echo $row["book_name"];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['author'];
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['genre'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['publisher'];;
						    		echo "</td>";
						    		echo "<td>";
						    		echo $row['number_of_copy'];
						    		echo "</td>";
						    		echo "<td>";
						    		//file_put_contents('img.png', base64_decode($row['picture']));
						    		echo '<img src="'.$image_src.'"  width="100%"/>';
						    		echo "</td>";
						    		

					    		echo "</tr>";
				    		
				        	
				    	}
				    	echo "</table>";
				    	echo "</div>";
					} else {
				    	echo "0 results";
					}

			}

		}

	?>

	<!--<div id="footer">
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

	</div>-->

</body>
</html>