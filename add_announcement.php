<?php 
session_start();

	$server = "localhost";
	$user = "root";
	$db = "infinity_library";
	$password = "";


	

	$conn = mysqli_connect($server,$user,$password,$db);
	if(!$conn){
		echo "Error retriving user data";
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$error = 0;
		if(empty($_POST['a_date'])){
			$error++;
		}
		else{
			$a_date = $_POST['a_date'];
		}
		if(empty($_POST['title'])){
			$error++;
		}
		else{
			$title = $_POST['title'];
		}
		if(empty($_POST['description'])){
			$error++;
		}
		else{
			$description = $_POST['description'];
		}

		if($error==0){
			$sql = "INSERT INTO announcement (a_date, title, description) values('$a_date','$title','$description')";
			if(mysqli_query($conn,$sql)){
				header("Location:home.php"); 
				exit; 
			}
			else{
				echo "error";
			}
		}
		else{
			echo "incorrect input";
		}
	}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Add Announcmeent</title>
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
        #an{
        	position: absolute;
        	left: 28%;
        	top: 20%;
        }
	</style>
</head>
<body>
	<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
        
        <div id="title"><h2 align="center">Add Announcement</h2></div>
	<div id="an">
		<form method = "post">
			<table>
				<tr>
					<th>Date: </th>
					<td><input type="Date" name="a_date"></td>
				</tr>
				<tr>
					<td>Title: </td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<th>Description: </th>
					<td><textarea name = "description" rows="4" cols="24"></textarea></td>
				</tr>

			</table>
			<input type="submit" name="submit">
		</form>
	</div>

</body>
</html>