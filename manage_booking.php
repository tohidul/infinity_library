<!DOCTYPE html>
<html>
<head>
	<title>Manage Bookings</title>
	<style type="text/css">
		#manage_booking{
			position: absolute;
			left: 28%;
			top: 20%;
		}
		#back_to_home:link, #back_to_home:visited{
            background-color: #060e1c;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        #back_to_home:hover {
            background-color: black;
        }
	</style>
</head>
<body>
<div id="top">
        <div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
        
        <div id="title"><h2 align="center">Manage Booking</h2></div>

    </div>
</body>
</html>

<?php
	session_start();

	$server = "localhost";
	$user = "root";
	$db = "infinity_library";
	$password = "";


	$c_user = $_SESSION["current_user"];

	$conn = mysqli_connect($server,$user,$password,$db);
	if(!$conn){
		echo "Error retriving user data";
	}
	echo "<div id='manage_booking'>";
	
	echo "<table id='d_book'>";
	echo "<tr>";
	echo "<th>Booking ID </th>";
	echo "<th>User ID </th>";
	echo "<th>Book Name </th>";
	echo "<th>Book ID </th>";
	echo "<th>User Name </th>";
	echo "<th>Date of Booking </th>";
	echo "<th></th>";

	echo "</tr>";

	$sql = "SELECT * from booking";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){

			$c_booking_id = $row['booking_id'];
			$c_book_id = $row['book_id'];
			$c_user_id = $row['user_id'];
			$c_date_of_booking = $row['date_of_booking'];
			$sql2 = "SELECT * from library_user where id = '$c_user_id' ";
			$result2 = mysqli_query($conn,$sql2);
			if(mysqli_num_rows($result2)>0){
				$row2 = mysqli_fetch_assoc($result2);
				$c_user_name = $row2['username'];
			}
			$sql3 = "SELECT * from book_information where book_id = '$c_book_id' ";
			$result3 = mysqli_query($conn,$sql3);
			if(mysqli_num_rows($result3)>0){
				$row3 = mysqli_fetch_assoc($result3);
				$c_book_name = $row3['book_name'];
			}

			echo "<tr>";
			echo "<td>";
			echo $c_booking_id;
			echo "</td>";
			echo "<td>";
			echo $c_book_id;
			echo "</td>";
			echo "<td>";
			echo $c_book_name;
			echo "</td>";
			echo "<td>";
			echo $c_user_id;
			echo "</td>";
			echo "<td>";
			echo $c_user_name;
			echo "</td>";
			echo "<td>";
			echo $c_date_of_booking;
			echo "</td>";
			echo "<td>";
			echo '<a href="return.php?var='.$c_booking_id.'">Cancel Booking</a>';
			echo "</td>";
		}
		echo "</table>";
		echo "</div>";
	}



?>