
<?php
	session_start();

	$server = "localhost";
	$user = "root";
	$db = "infinity_library";
	$password = "";


	$c_user = $_SESSION["current_user"];

	$conn = mysqli_connect($server,$user,$password,$db);
	if(!$conn){
		echo "Error retrivijg user data";
	}

	$sql = "SELECT * From library_user where username = '$c_user'";

	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    	$row = mysqli_fetch_assoc($result);
    	$c_user_name = $row['username'];
    	$c_first_name = $row['fname'];
    	$c_last_name = $row['lname'];
    	$c_email = $row['email'];
    	$c_dob = $row['dob'];
    	$c_phone = $row['phone'];
    	$c_address = $row['address'];
    }


?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		#user_info{
			position: absolute;
			left: 40%;
			top: 26%;
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
		
	</style>
</head>
<body>
	<div id="top">
		<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
		<div id="edit"><a href="profile_edit.php" id="edit_profile">Edit Profile</a></div>
		<div id="title"><h2>Your Profile</h2></div>

	</div>
	
	
	<div id="user_info">
		<table>
			<tr>
				<th>User Name: </th>
				<td><?php echo $c_user_name ; ?></td>
			</tr>
			<tr>
				<th>First Name: </th>
				<td><?php echo $c_first_name ; ?></td>
			</tr>
			<tr>
				<th>Last Name: </th>
				<td><?php echo $c_last_name ; ?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?php echo $c_email ; ?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?php echo $c_phone ; ?></td>
			</tr>
			<tr>
				<th>Date of Birth: </th>
				<td><?php echo $c_dob ; ?></td>
			</tr>
			<tr>
				<th>Address: </th>
				<td><?php echo $c_address ; ?></td>
			</tr>
			
		</table>
	</div>

</body>
</html>