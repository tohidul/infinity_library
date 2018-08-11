<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
	<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
		
		
	<a href=""></a>

	<?php  
		$search_err="";
		$flag = 0;
		if($_POST){
			if(empty($_POST["search_name"])){
				$search_err = "* enter a name to search";
			}
			else{
				$flag = 1;
			}
		}
	?>
	<form method="post">
		<div style="position: absolute; left:30%; top:14%;">
			<input type="text" name="search_name" size="44">
			<input type="submit" name="search" value="Search"><br>
			<?php echo $search_err; ?>

		</div>
		
	</form>

	<?php 
		if ($flag==1) {
			$search_var = $_POST["search_name"];
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "infinity_library";
				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
				if(mysqli_connect_error()){
					die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
				}
				$sql_query = "SELECT * FROM book_information WHERE book_name like '%$search_var%'";
				$result = $conn->query($sql_query);
				//$row = $result->fetch_assoc();
				//echo $row['book_name'];

				if ($result->num_rows > 0) {
					echo '<div style="position:absolute;top:30%; left:30%;">';
					echo "<table border='1'>";
				    		echo "<tr>";
				    			echo "<th>";
					    		echo "Book ID";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Book Name";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Author";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Genre";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Publisher";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Numer of Copy";
					    		echo "</th>";
					    		echo "<th>";
					    		echo "Edit/Delete";
					    		echo "</th>";
				    		echo "</tr>";
			    // output data of each row
			    	while($row = $result->fetch_assoc()) {
			    			$s_book_name = $row["book_name"];
			    			$s_book_id = $row["book_id"];
				    		echo "<tr>";
				    			echo "<td>";
					    		echo $row["book_id"];
					    		echo "</td>";
					    		echo "<td>";
					    		echo $row["book_name"];
					    		echo "</td>";
					    		echo "<td>";
					    		echo $row['author'];
					    		echo "</td>";
					    		echo "<td>";
					    		echo $row['genre'];;
					    		echo "</td>";
					    		echo "<td>";
					    		echo $row['publisher'];;
					    		echo "</td>";
					    		echo "<td>";
					    		echo $row['number_of_copy'];
					    		echo "</td>";
					    		echo "<td>";
					 			    		
					    		echo '<a href="edit_book.php?var= '.$s_book_id.'">edit</a>';
					    		echo "/";
					    		echo '<a href="delete_book.php?var= '.$s_book_id.'">delete</a>';
					    		echo'</td>';
				    		echo "</tr>";
			    		
			        	
			    	}
			    	echo "</table>";
			    	echo "</div>";
				} else {
			    	echo "0 results";
				}

		}
	?>

</body>
</html>