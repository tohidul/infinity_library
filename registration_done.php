<!DOCTYPE html>
<html>
<head>
	<title>Done</title>
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
	</style>
</head>
<body>
	<div id="top">
        <div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
        
        
    </div>

</body>
</html>
<?php 

//echo "Welcome"; ?>
<?php
	session_start();
?>



<?php 
	//echo "First Name :". $_SESSION["fname"]."<br>" ;
	//echo "Last Name : ". $_SESSION["lname"]."<br>";
	//echo "Email :". $_SESSION["email"]."<br>";

	//echo "dob :". $_SESSION["dob"]."<br>";
	//echo "User Name : $_SESSION["uname"]<br>";
	//echo "UType : $_SESSION["utype"]<br>";
	//echo "Address : $_SESSION["address"]<br>";
	


?>


<?php
	
	/*------------------------------IF there is no database then enable this code--------------------------------*/



	/*$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// Create database
	$sql = "CREATE DATABASE infinity_library";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully"."<br>";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	$conn->close();*/
?>


<?php  
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "infinity_library";
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if(mysqli_connect_error()){
		die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		echo "<div><h1 align='center'>success</h1></div>"."<br>";
	}


	/*------------------------------------ if  the table is not there then enable the following code----------------------*/


	/*$sqlq = "CREATE TABLE library_user (
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
	    echo "Table MyGuests created successfully" ."<br>";
	} else {
	    echo "Error creating table: " . $conn->error;
	}*/



	$sql = "INSERT INTO library_user (username, password, type, fname, lname, email, phone, dob, address, validation)
			VALUES ('".$_SESSION["uname"]."', '".$_SESSION["password"]."', '".$_SESSION["utype"]."', '".$_SESSION["fname"]."', '".$_SESSION["lname"]."', '".$_SESSION["email"]."', '".$_SESSION["phone"]."', '".$_SESSION["dob"]."', '".$_SESSION["address"]."', '0')";

	if ($conn->query($sql) === TRUE) {
    	echo "<div><h4 align='center'>Wait for admin approval</h4></div>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>