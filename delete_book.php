<?php
if (isset($_GET['var'])){
		$d_book_id = $_GET['var'];
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
		$sql = "DELETE FROM book_information WHERE book_id='$d_book_id'";

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		    header("Location: search.php");
		    exit();
		} else {
		    echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
	}
else{
		echo "no book to edit";
}

?>