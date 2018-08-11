<?php
	session_start();
?>
<?php 
	session_unset(); 
	session_destroy();

 ?>

 <?php
 	header("Location:home.php"); 
	exit();
 ?>