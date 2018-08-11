<?php
if (isset($_GET['var'])){
		$d_user_id = $_GET['var'];
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

		// sql to delete a record
		$sql = "UPDATE library_user set validation = '1' where id = '$d_user_id' ";
		//$sql = "DELETE FROM book_information WHERE book_id='$d_book_id'";

		if ($conn->query($sql) === TRUE) {
		    //echo "Record deleted successfully";
		    header("Location: approve_member.php");
		    exit();
		} else {
		    echo "Error approving: " . $conn->error;
		}

		$conn->close();
	}
else{
		echo "no user remaining";
}




mysqli_close($conn);

?>