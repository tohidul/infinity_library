<!DOCTYPE html>
<html>
<head>
	<title>Add Books</title>
	<style type="text/css">
		.err_msg{
			color: red;
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
<div id="top">
		<div id="back"><a href="home.php" id="back_to_home">Back to Home</a></div>
		
		<div id="title"><h2>Add Book</h2></div>

	</div>
	<?php 
		$book_name_err = $number_of_copy_err = $genre_err = $author_err = $publisher_err = $publisher_err = $publisher_information_err = $picture_err = "";
		$book_name = '';
		$error_count = 0;
		if(isset($_POST["submit"])){
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
			/*if(empty($_POST["image"])){
				$picture_err = "* Please enter picture";
				$error_count++;
			}*/
			//$check = getimagesize($_FILES["image"]["tmp_name"]);
	    	//if($check !== false){
		        //$image = $_FILES['image']['tmp_name'];
		        //$imgContent = addslashes(file_get_contents($image));

		        $name = $_FILES['file']['name'];
				 $target_dir = "upload/";
				 $target_file = $target_dir . basename($_FILES["file"]["name"]);
				 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

				 // Select file type
				 

		        /*
		         * Insert image data into database
		         */
		        
		        //DB details
		        //}


		    if($error_count==0){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "infinity_library";
				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
				if(mysqli_connect_error()){
					die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
				}
				

				$sqlq = "CREATE TABLE book_information (
				book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				book_name VARCHAR(30) NOT NULL,
				number_of_copy INT(6) NOT NULL,
				number_of_booked INT(6) NOT NULL,
				genre VARCHAR(30) NOT NULL,
				author VARCHAR(30) NOT NULL,
				publisher VARCHAR(30) NOT NULL,
				publisher_information VARCHAR(60) NOT NULL,
				picture LONGBLOB NOT NULL
				)";

				/*if ($conn->query($sqlq) === TRUE) {
				    echo "Table bookinfo created successfully" ."<br>";
				} else {
				    echo "Error creating table: " . $conn->error;
				}*/

				$sql = "INSERT INTO book_information (book_name, number_of_copy, number_of_booked, genre, author, publisher, publisher_information, picture)
				VALUES ('".$_POST["book_name"]."', '".$_POST["number_of_copy"]."', '0', '".$_POST["genre"]."', '".$_POST["author"]."', '".$_POST["publisher"]."', '".$_POST["publisher_information"]."', '$name')";

				if ($conn->query($sql) === TRUE) {
			    	echo "New record created successfully";
				} else {
			    	echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();





				//header("location:mytest.php");
				//exit();
			}
	}

			/*else{
				$myvar = $_POST['image'];
				$check = getimagesize($_FILES["image"]["tmp_name"]);
    			if($check !== false){
				
					$image = $_FILES['image']['tmp_name'];
        			$imgContent = addslashes(file_get_contents($image));
        		}
			}*/


			
		
	 ?>

	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="book_name"> <span class="err_msg"><?php echo $book_name_err; ?></span> </td>

			</tr>
			<tr>
				<td>Number Of Copy: </td>
				<td><input type="text" name="number_of_copy"> <span class="err_msg"><?php echo $number_of_copy_err; ?></span> </td>
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
				<td><input type="text" name="author"> <span class="err_msg"><?php echo $author_err; ?></span> </td>
			</tr>
			<tr>
				<td>Publisher: </td>
				<td><input type="text" name="publisher"> <span class="err_msg"><?php echo $publisher_err; ?></span> </td>
			</tr>
			<tr>
				<td>Publisher Information: </td>
				<td><textarea name="publisher_information" rows="4" cols="24"></textarea> <span class="err_msg"><?php echo $publisher_information_err; ?></span> </td>
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