<?php 

	if (isset($_GET['var'])){
		$e_book_id = $_GET['var'];
		//echo $_GET['var'];
	}
	else{
		echo "no book to edit";
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "infinity_library";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM book_information where book_id='$e_book_id'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
	    	$old_book_id = $row["book_id"];
	    	$old_book_name= $row["book_name"];
	    	$old_number_of_copy = $row["number_of_copy"];
	    	$old_number_of_booked = $row["number_of_booked"];
	    	$old_genre = $row["genre"];
	    	$old_author = $row["author"];
	    	$old_publisher = $row["publisher"];
	    	$old_publisher_information = $row["publisher_information"];
        	//echo "id: " . $row["book_id"]. " - Name: " . $row["book_name"]. " " . $row["genre"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}

mysqli_close($conn);

	

 ?>







<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
	<style type="text/css">
		.err_msg{
			color: red;
		}
	</style>
</head>
<body>

	<?php 
		$book_name_err = $number_of_copy_err = $genre_err = $author_err = $publisher_err = $publisher_err = $publisher_information_err = $picture_err = "";
		$book_name = '';
		$error_count = 0;
		if($_POST){
			if(empty($_POST["book_name"])){
				$book_name_err = "* Please enter book name";
				$error_count++;
			}
			else{
				$book_name = $_POST["book_name"];
			}
			if(empty($_POST["number_of_copy"])){
				$number_of_copy_err = "* Please enter number of book";
				$error_count++;
			}
			if($_POST["genre"]=="select"){
				$genre_err = "* Please select genre";
				$error_count++;
			}
			if(empty($_POST["author"])){
				$author_err = "* Please enter author name";
				$error_count++;
			}
			if(empty($_POST["publisher"])){
				$publisher_err = "* Please enter publisher name";
				$error_count++;
			}
			if(empty($_POST["publisher_information"])){
				$publisher_information_err = "* Please enter publisher information";
				$error_count++;
			}
			/*$check = getimagesize($_FILES["image"]["tmp_name"]);
	    	if($check !== false){
		        $image = $_FILES['image']['tmp_name'];
		        $imgContent = addslashes(file_get_contents($image));

		        
		         * Insert image data into database
		         
		        
		        //DB details
		        }*/
		        $name = $_FILES['file']['name'];
				 $target_dir = "upload/";
				 $target_file = $target_dir . basename($_FILES["file"]["name"]);
				 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);


		    if($error_count==0){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "infinity_library";
				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
				if(mysqli_connect_error()){
					die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
				}
				

				
				/*if ($conn->query($sqlq) === TRUE) {
				    echo "Table MyGuests created successfully" ."<br>";
				} else {
				    echo "Error creating table: " . $conn->error;
				}*/

				$sql = "UPDATE book_information set book_name = '".$_POST["book_name"]."', number_of_copy = '".$_POST["number_of_copy"]."', number_of_booked = '0', genre = '".$_POST["genre"]."', author = '".$_POST["author"]."', publisher = '".$_POST["publisher"]."', publisher_information = '".$_POST["publisher_information"]."', picture = '$name' WHERE book_id = '$old_book_id' ";
				

				if ($conn->query($sql) === TRUE) {
			    	echo "uPDATED";
				} else {
			    	echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();




				//header("location:mytest.php");
				//exit();
			}
		}
	 ?>

	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name: </td>
				<?php echo' <td><input type="text" name="book_name" value = "'.$old_book_name.'"> <span class="err_msg"><?php echo $book_name_err; ?></span> </td>' ?>

			</tr>
			<tr>
				<td>Number Of Copy: </td>
				<td><input type="text" name="number_of_copy" value=<?php echo $old_number_of_copy; ?>> <span class="err_msg"><?php echo $number_of_copy_err; ?></span> </td>
			</tr>
			<tr>
				<td>Genre: </td>
				<td><select name = "genre">
					<option value="select">Select</option>
					<option value="science_fiction">Science Fiction</option>
					<option value="mystery">Mystery</option>
					<option value="computer_science">Computer Science</option>
					<option value="business">Business</option>
					<option value="drama">Drama</option>
					<option value="law">Law</option>
					<option value="poetry">Poetry</option>
					<option value="dictionary">Dictionary</option>
					<option value="other">Other</option>
					
				</select>  <span class="err_msg"><?php echo $genre_err; ?></span>  </td>
			</tr>
			<tr>
				<td>Author: </td>
				<td><input type="text" name="author" value=<?php echo $old_author; ?>> <span class="err_msg"><?php echo $author_err; ?></span> </td>
			</tr>
			<tr>
				<td>Publisher: </td>
				<td><input type="text" name="publisher" value=<?php echo $old_publisher; ?>> <span class="err_msg"><?php echo $publisher_err; ?></span> </td>
			</tr>
			<tr>
				<td>Publisher Information: </td>
				<td><textarea name="publisher_information" rows="4" cols="24" ><?php echo $old_publisher_information; ?></textarea> <span class="err_msg"><?php echo $publisher_information_err; ?></span> </td>
			</tr>
			<tr>
				<td>Picture: </td>
				<td><input type="file" name="file"/> <span class="err_msg"><?php echo $picture_err; ?></span> </td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="submit"/></td>
			</tr>
		</table>
		
	</form>
	

</body>
</html>



































<!DOCTYPE html>
<html>
<head>
	<title>Edit Books</title>
</head>
<body>

</body>
</html>


