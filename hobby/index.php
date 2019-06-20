<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

	<style>
	* {
		margin: 10;
		font-family: 'Open Sans', sans-serif;
	}	
	</style>
</head>
<body>
	<?php
		$conn = new mysqli("localhost", 'root', '', 'wis2_bacagan');
		session_start();
 		$un = $_SESSION['un'];
	 	if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$query = "SELECT tbl_users.user_index, username, concat(fname, ' ', mname, ' ', lname) as full, tbl_education.educ_level, tbl_personal_info.educ_index, level_name, ifnull(degree,'N/A') as degree, tbl_education.educ_level from tbl_personal_info join tbl_education on tbl_personal_info.educ_index = tbl_education.educ_index join tbl_users on tbl_users.user_index = tbl_personal_info.user_index join tbl_educ_level on tbl_education.educ_level = tbl_educ_level.educ_level where tbl_users.user_index = '$un'";

		$res = mysqli_query($conn, $query);
		while($user_row =  mysqli_fetch_array($res)) {

		}
	?>


</body>
<script text="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<script>
</script>
</html>

