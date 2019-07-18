<?php 

	$conn = new mysqli("localhost", 'root', '', 'company');
	session_start();
 	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	
?>