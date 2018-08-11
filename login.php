<?php
	session_start();
?>
<?php 

	$invalid_info="";

	$user_name_err = $password_err = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["user_name"])) {
			$user_name_err = "*Enter User Name";
		}
		if (empty($_POST["password"])) {
			$password_err = "*Enter password";
		}
		
			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "infinity_library";
			$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
			if(mysqli_connect_error()){
				die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
			}
			else{
				//echo "success"."<br>";
			}
			$sql_query = "SELECT * FROM library_user WHERE validation = '1' AND username='".$_POST["user_name"]."' AND password='".$_POST["password"]."'";
			$result = mysqli_query($conn,$sql_query);
			$count = mysqli_num_rows($result);
			mysqli_free_result($result);
			if ($count==1) {
				$_SESSION["current_user"] = $_POST["user_name"];
				
				header("Location:home.php"); 
				exit();
			}

			else {
		    	/*echo "Error: " . $sql . "<br>" . $conn->error;*/
		    	$invalid_info = "*Invalid User name or Password";
		    	//echo "*invalid user_name or password";
			}
			$conn->close();
		
	}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	
</head>
<body>
	<a href="home.php" id="back_to_home">Back to Home</a>
	<h2 align="center">Login Form</h2>
	<div id="loginForm">
		<form method="post">
			
			<table>
				<tr>
					
					<td><input type="text" name="user_name" class="text_input" placeholder="User Name"></td>
						
				</tr>
				<tr>
					<td><span class="login_err"><?php echo "$user_name_err"; ?></span></td>
				</tr>
				
				<tr>
					
					<td><input type="password" name="password" class="text_input" placeholder="Password"> </td>								
				</tr>
				<tr>
					<td><span class="login_err"><?php echo "$password_err";  ?></span></td>
				</tr>
					
				<tr>
					
					<td><input type="submit" name="submit" id="submit_button"></td>
				</tr>
				<tr>
					<td><span class="login_err"><?php echo $invalid_info; ?></span></td>
				</tr>
			</table>
			
		</form>
	</div>


</body>
</html>