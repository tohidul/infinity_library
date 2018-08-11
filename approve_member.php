<!DOCTYPE html>
<html>
<head>
    <title>Approve Member</title>
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
        #p_table{
            position: absolute;
            left: 28%;
        }
    </style>
</head>
<body>
    <div id="top">
        <div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
        
        <div id="title"><h2 align="center">Pending User</h2></div>

    </div>

</body>
</html>

<?php

$user = "root";
$server = "localhost";
$password = "";
$db_name = "infinity_library";

$conn = mysqli_connect($server,$user,$password,$db_name);

if (!$conn) {
	echo "error";
}

$sql = "SELECT id, username, fname, lname, email, phone, dob FROM library_user where validation = '0' ";

$result = mysqli_query($conn,$sql);
echo "<div id='p_table'>";

echo "<table> <tr>
<th>User Name</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone</th>
<th>Date of Birth</th>
<th></th>
</tr>";

$no_pending="";

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    	$a_user_id = $row['id'];
    	echo "<tr>
    	<td>".$row['username']."</td>
    	<td>".$row['fname']."</td>
    	<td>".$row['lname']."</td>
    	<td>".$row['email']."</td>
    	<td>".$row['phone']."</td>
    	<td>".$row['dob']."</td>
    	<td>";
    	

    	echo '<a href="approve_member2.php?var= '.$a_user_id.'">Approve</a>';
    	echo "</td>
    	</tr>";
    }
    echo "</table>";
    echo $no_pending;

    echo "</div>";
}
else{
	$no_pending= "no pending user";
}

mysqli_close($conn);

?>