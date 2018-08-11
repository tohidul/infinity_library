<?php 

if (isset($_GET['var'])){
		$e_user_id = $_GET['var'];
		//echo $_GET['var'];
	}
	else{
		echo "no user to edit";
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "infinity_library";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE library_user set validation='0' where id='$e_user_id'";

	if(mysqli_query($conn,$sql)===true){
		header("Location:revoke_membership.php"); 
					exit; 
	}
	else{
		echo "error";
	}


?>