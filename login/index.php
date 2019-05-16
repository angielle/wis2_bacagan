<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">	
</head>
<body>
	<?php 		 
		$conn = new mysqli("localhost", 'root', '', 'wis2_bacagan');
		session_start();
 		$un = $_SESSION['un'];
	 	if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		
		$query = "SELECT tbl_users.user_index, username, concat(fname, ' ', mname, ' ', lname) as full, level_name, ifnull(degree,'N/A') as degree from tbl_personal_info join tbl_education on tbl_personal_info.educ_index = tbl_education.educ_index join tbl_users on tbl_users.user_index = tbl_personal_info.user_index join tbl_educ_level on  tbl_education.educ_level = tbl_educ_level.educ_level where tbl_users.user_index = '$un'";
		
		$result = mysqli_query($conn, $query);
	    while($row =  mysqli_fetch_array($result)) {
	    	echo '<h6> Full Name: '.$row['full'].'</h6>';
		    echo '<h6> Educational Attainment: '.$row['level_name'].'<h6>';
		     echo '<h6> Degree Finished: '.$row['degree'].'<h6>';
    	}

	    
	  	?>
</body>
</html>