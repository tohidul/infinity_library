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

    mysqli_close($conn);


?>

<?php
	$number_of_error=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["fname"])){
				
				$number_of_error++;
			}
			else{
				$fname = $_POST["fname"];
			}

			if(empty($_POST["lname"])){
				
				$number_of_error++;
			}
			else{
				$lname = $_POST["lname"];
			}


			if(empty($_POST["email"])){
				
				$number_of_error++;
			}
			else{
				$email = $_POST["email"];
			}

			if(empty($_POST["password"])) {
				
				$number_of_error++;
			}
			elseif (count( array_unique( str_split( $_POST["password"])))<8) {
				
				$number_of_error++;
			}
			else{
				$passwordf = $_POST["password"];
			}

			if(empty($_POST["rpassword"])){
				
				$number_of_error++;
			}
			elseif (strcmp($_POST["rpassword"],$passwordf)!=0) {
				
				$number_of_error++;
			}
			else{
				$rpassword= $_POST["rpassword"];
			}
			if(empty($_POST["dob"])){
				
				$number_of_error++;
			}
			else{
				$dob = date('Y-m-d', strtotime($_POST['dob']));
			}

			if(empty($_POST["phone"])){
				
				$number_of_error++;
			}
			else{
				$phone = $_POST["phone"];
			}

			if(empty($_POST["address"])){
				
				$number_of_error++;
			}
			else{
				$address = $_POST["address"];
			}

			if($number_of_error==0){
				$server = "localhost";
				$user = "root";
				$db = "infinity_library";
				$password = "";


				$c_user = $_SESSION["current_user"];
				$conn = mysqli_connect($server,$user,$password,$db);
				if(!$conn){
					echo "Error retriving user data";
				}
				$sql = "UPDATE library_user set fname = '$fname', lname = '$lname', email = '$email', password = '$passwordf', dob = '$dob', phone = '$phone', address = '$address' where username = '$c_user_name'";
				if(mysqli_query($conn,$sql)===true){
					header("Location:profile.php"); 
					exit; 
				}
				else{

					echo "error".mysqli_error($conn);
				}
			}
			else{
				echo "wrong input";
			}
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style type="text/css">
		#d_form{
			position: absolute;
			top: 20%;
			left: 30%;
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
		<div id="back"><a href="profile.php" id="back_to_home">Back to Profile</a></div>
		
		<div id="title"><h2>Edit Profile</h2></div>

	</div>

	<div id="d_form">
		<form method = "post">
			<table>
				<tr>
					<th>First Name: </th>
					<td><input type="text" name="fname" value=<?php echo $c_first_name ; ?>></td>
				</tr>
				<tr>
					<th>Last Name: </th>
					<td><input type="text" name="lname" value=<?php echo $c_last_name ; ?>></td>
				</tr>
				<tr>
					<th>Email: </th>
					<td><input type="text" name="email" value=<?php echo $c_email ; ?>></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="Password" name="password"></td>
				</tr>
				<tr>
					<th>Retype Password: </th>
					<td><input type="Password" name="rpassword"</td>
				</tr>
				<tr>
					<th>Phone: </th>
					<td><input type="text" name="phone" value=<?php echo $c_phone ; ?>></td>
				</tr>
				<tr>
					<th>Date of Birth: </th>
					<td><input type="Date" name="dob"></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><textarea rows="4" cols="50" name="address"><?php echo $c_address; ?></textarea></td>
				</tr>
			</table>
				<input type="submit" name="submit" value="Update" id="update">
		</form>
	</div>

</body>
</html>