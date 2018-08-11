<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="registration.css">
	
</head>
<body>
	<?php
		$fname_err = $lname_err = $uname_err = $email_err = $password_err = $rpassword_err = $utype_err = $dob_err = $phone_err = $address_err = "";
		$fname = $lname = $uname = $email = $password = $rpassword = $utype = $dob = $phone = $address = ""; 
		$number_of_error=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["fname"])){
				$fname_err = "Please insert your first name";
				$number_of_error++;
			}
			else{
				$fname = $_POST["fname"];
			}

			if(empty($_POST["lname"])){
				$lname_err = "Please insert your last name";
				$number_of_error++;
			}
			else{
				$lname = $_POST["lname"];
			}

			if(empty($_POST["uname"])){
				$uname_err = "Please insert your user name";
				$number_of_error++;
			}
			else{
				$uname = $_POST["uname"];
			}

			if(empty($_POST["email"])){
				$email_err = "Please insert your email";
				$number_of_error++;
			}
			else{
				$email = $_POST["email"];
			}

			if(empty($_POST["password"])) {
				$password_err = "Please insert your password";
				$number_of_error++;
			}
			elseif (count( array_unique( str_split( $_POST["password"])))<8) {
				$password_err = "Password need to be atleast consist 8 characters";
				$number_of_error++;
			}
			else{
				$password = $_POST["password"];
			}

			if(empty($_POST["rpassword"])){
				$rpassword_err = "Please retype your password";
				$number_of_error++;
			}
			elseif (strcmp($_POST["rpassword"],$password)!=0) {
				$rpassword_err = "Password do not match";
				$number_of_error++;
			}
			else{
				$rpassword= $_POST["rpassword"];
			}

			if(empty($_POST["utype"])){
				$utype_err = "Please select user type";
				$number_of_error++;
			}
			elseif($_POST["utype"]=="Librarian"){
				$utype = 3;
			}
			elseif ($_POST["utype"]=="Teacher") {
				$utype = 2;
			}
			else{
				$utype = 1;
			}

			if(empty($_POST["dob"])){
				$dob_err = "Please enter your date of birth";
				$number_of_error++;
			}
			else{
				$dob = date('Y-m-d', strtotime($_POST['dob']));
			}

			if(empty($_POST["phone"])){
				$phone_err = "Please enter your phone number";
				$number_of_error++;
			}
			else{
				$phone = $_POST["phone"];
			}

			if(empty($_POST["address"])){
				$address_err = "Please enter your address";
				$number_of_error++;
			}
			else{
				$address = $_POST["address"];
			}

			if($number_of_error==0){
				$_SESSION["fname"]=$fname;
				$_SESSION["lname"]=$lname;
				$_SESSION["uname"]=$uname;
				$_SESSION["utype"]=$utype;
				$_SESSION["email"]=$email;
				$_SESSION["dob"]=$dob;
				$_SESSION["address"]=$address;
				$_SESSION["password"] = $password;
				$_SESSION["phone"] = $phone;
				header("Location:registration_done.php"); 
				exit; 
			}


		}
		


	?>
	<a href="home.php" id="back_to_home">Back to Home</a>
	<h2 align="center">Registration Form</h2>



<div id="r_form">

	<form method="post">

		<table>
			<tr>
				
				<td><input type="text" name="fname" value= "<?php echo $fname;?>" placeholder="First Name" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$fname_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="text" name="lname" value= "<?php echo $lname;?>" placeholder="Last Name" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$lname_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="text" name="uname" value= "<?php echo $uname;?>" placeholder="User Name" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$uname_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="Email" name="email" placeholder="Email" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$email_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="Password" name="password" placeholder="Password" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$password_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="Password" name="rpassword" placeholder="Retype Password" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$rpassword_err"; ?></span></td>
			</tr>
			<tr>
				
				<td>User Type: <input type="radio" name="utype" value="Librarian"> Librarian
					<input type="radio" name="utype" value="Teacher"> Teacher
			 		<input type="radio" name="utype" value="Member"> Member 
			 	</td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$utype_err"; ?></span></td>
			</tr>
			<tr>
				
				<td>Date Of Birth: <input type="Date" name="dob"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$dob_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="Phone" name="phone" value= "<?php echo $phone;?>" placeholder="Phone" class = "text_input"></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$phone_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><textarea rows="4" cols="50" name="address" value= "<?php echo $address;?>" placeholder="Address"></textarea></td>
			</tr>
			<tr>
				<td><span class="error"><?php echo "$address_err"; ?></span></td>
			</tr>
			<tr>
				
				<td><input type="submit" value="Register" id="register_button"></td>
			</tr>

		</table>
		
	</form>
	</div>

</body>
</html>