<?php
if (isset($_GET['var'])){
		$d_booking_id = $_GET['var'];
		//echo $_GET['var'];
	}
	else{
		echo "no book to edit";
	}

	session_start();
	$server = "localhost";
	$user = "root";
	$db = "infinity_library";
	$password = "";
	$conn = mysqli_connect($server,$user,$password,$db);
	if(!$conn){
		echo "Error retriving user data";
	}
	$sql = "UPDATE book_information set number_of_copy = number_of_copy+'1',number_of_booked = number_of_booked-'1' where book_id = (SELECT book_id FROM booking where booking_id = '$d_booking_id')";
	if(mysqli_query($conn,$sql)===true){
		$sql = "DELETE FROM booking where booking_id = '$d_booking_id'";
		if(mysqli_query($conn,$sql)===true){
			header("Location:manage_booking.php"); 
			exit; 
		}
		else{
		echo "error";
		}
	}
	else{
		echo "error";
	}

?>