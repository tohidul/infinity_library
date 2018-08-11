
<!DOCTYPE html>
<html>
<head>
	<title>Revoke Membership</title>
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
		#revoke{
			position: absolute;
			top: 26%;
			left: 36%;
		}
	</style>
</head>
<body>
	<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
		
		<div id="title"><h2 align="center">Revoke Membership</h2></div>

</body>
</html>


<?php 

$server = "localhost";
$user = "root";
$password = "";
$db_name = "infinity_library";

$conn = mysqli_connect($server,$user,$password,$db_name);
if(!$conn){
	echo "error";
}

$sql = "SELECT * from library_user where validation='1'";
$result = mysqli_query($conn,$sql);

echo "<div id='revoke'>
<table>
<tr>
<th>User ID</th>
<th>User Name</th>
<th>Email</th>
<th>Phone</th>
<th></th>
</tr>";

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$r_user_id=$row['id'];
		echo "<tr>
		<td>".$row['id']."</td>
		<td>".$row['username']."</td>
		<td>".$row['email']."</td>
		<td>".$row['phone']."</td> <td>";
		echo '<a href="revoke.php?var='.$r_user_id.'">Revoke</a>';
		echo "</td>";
		echo "</tr>";
		

	}
	echo "</table>";
	echo "</div>";
}

?>