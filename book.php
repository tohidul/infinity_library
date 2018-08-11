<?php 

	session_start();
?>

<?php
if (isset($_GET['var'])){
		$d_user_name = $_GET['var'];
		$d_book_id = $_GET['var2'];
		//echo $_GET['var'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "infinity_library";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$usql = "SELECT id from library_user where username = '$d_user_name'";
		$uresult = $conn->query($usql);
		if ($uresult->num_rows > 0) {
			 //echo "Record deleted successfully";
			$row = $uresult->fetch_assoc();
			$d_user_id = $row['id'];
			} else {
			echo "Error booking: " . $conn->error;
			}


		$sql1 = "SELECT number_of_copy from book_information where book_id = '$d_book_id' and number_of_copy>'3'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
		    //echo "Record deleted successfully";
		    $sql = "INSERT into booking (user_id, book_id, date_of_booking) values ('$d_user_id', '$d_book_id', now())";
		    if ($conn->query($sql) === TRUE) {
		    	$sql2 = "UPDATE book_information set number_of_copy = number_of_copy-'1',number_of_booked = number_of_booked+'1' where book_id = '$d_book_id' ";
		    	if ($conn->query($sql2) === TRUE) {
				    //echo "Record deleted successfully";
				    header("Location: search.php");
				    exit();
				} else {
				    echo "Error booking: " . $conn->error;
				}
			    
			    
			} else {
			    echo "error booking ";
			}
		    
		} else {
		    echo "not enough book available";
		}


		// sql to delete a record
		

		
	}
else{
		echo "no books";
}




mysqli_close($conn);

?>