<!DOCTYPE html>
<html>
<head>
	<title>Announcement</title>
	<style type="text/css">
		#an_data{
			position: absolute;
			left: 26%;
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
	</style>
</head>
<body>

	<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
        
        <div id="title"><h2 align="center">Announcement</h2></div>
	
	
</body>
</html>

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

	$sql = "SELECT * from announcement";
	$result = mysqli_query($conn,$sql);
	echo "<div id='an_data'>";
	echo "<table>";
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<tr>
			<th>Date: </th>
			<td>".$row['a_date']."</td>
			</tr>";
			echo "<tr>
			<th>Title: </th>
			<td>".$row['title']."</td>
			</tr>";
			echo "<tr>
			<th>Description: </th>
			<td>".$row['description']."</td>
			</tr>";

		}
		echo "</table>";
		echo "</div>";
	}




?>

