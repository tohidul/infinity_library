<!DOCTYPE html>
<html>
<head>
	<title>Bookings</title>
	<style type="text/css">
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
		#top{
			position: absolute;
			width: 100%;
		}
		#edit{
			position: absolute;
			left: 80%;
			top: 20%;
		}
		#back{
			position: absolute;
			top: 20%;
		}


		#edit_profile:link, #edit_profile:visited{
		    background-color: #060e1c;
		    color: white;
		    padding: 14px 25px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		}
		#edit_profile:hover {
		    background-color: black;
		}
		#title{
			position: absolute;
			top: 30%;
			left: 42%;
		}
		#d_book{
			position: absolute;
			top: 30%;
			left: 36%;
		}
		#t_due{
			position: absolute;
			top: 62%;
			left: 44%;
		}
	</style>
</head>
<body>
	<div id="top">
		<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
		
		<div id="title"><h2>Your Bookings</h2></div>

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
	$usql = "SELECT * from library_user where username = '$c_user'";
	$uresult = mysqli_query($conn,$usql);
	if(mysqli_num_rows($uresult)>0){
		$urow = mysqli_fetch_assoc($uresult);
		$c_user_id = $urow['id'];
		$c_type = $urow['type'];
	}
	$t_due = 0;

	echo "<div>";
	echo "<table id='d_book'>";
	echo "<tr>";
	echo "<th>Book Name </th>";
	echo "<th>Author </th>";
	echo "<th>Publisher </th>";
	echo "<th>Booking Date </th>";
	echo "</tr>";

	$sql = "SELECT * from booking where user_id = '$c_user_id'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$c_book_id = $row['book_id'];
			$sql2 = "SELECT * from book_information where book_id = '$c_book_id'";
			$result2 = mysqli_query($conn,$sql2);
			if(mysqli_num_rows($result2)>0){
				$row2 = mysqli_fetch_assoc($result2);
				echo "<tr>";
				echo "<td>";
				echo $row2['book_name'];
				echo "</td>";
				echo "<td>";
				echo $row2['author'];
				echo "</td>";
				echo "<td>";
				echo $row2['publisher'];
				echo "</td>";
				echo "<td>";
				echo $row['date_of_booking'];
				echo "</td>";
				echo "</tr>";
			}
			$start_time = strtotime($row['date_of_booking']);
			$end_time = strtotime(date("Y-m-d"));
			$timeDiff = abs($end_time-$start_time);
			$numberDays = $timeDiff/86400;
			$numberDays = intval($numberDays);
			if($c_type==1){
				if($numberDays>7){
					$additional_day = $numberDays-7;
					$t_due = $t_due + $additional_day*10;

				}
			}
			else{
				if($numberDays>30){
					$additional_day = $numberDays-30;
					$t_due = $t_due + $additional_day*10;

				}

			}
			//echo $numberDays.'<br>';
			//$t_day = $t_day+$

		}
		
	}
	echo "</table>";
	echo "</div>";
	//echo $t_due;
	echo "<div id='t_due'> Total Due: $t_due </div>";

	//$startTimeStamp = strtotime("2011/07/01");
	//$endTimeStamp = strtotime("2011/07/17");

	//$timeDiff = abs($endTimeStamp - $startTimeStamp);

	//$numberDays = $timeDiff/86400;  // 86400 seconds in one day

	// and you might want to convert to integer
	//$numberDays = intval($numberDays);

?>