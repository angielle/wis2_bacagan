<?php
	session_start();
	$_SESSION['error'] = '';
	$_SESSION['un'] = '';
	$conn = new mysqli("localhost", 'root', '', 'wis2_bacagan');

	if(!$conn) {
 		die ('Error in establishing connection to the server!');
 	} 

 	if (isset($_POST['un']) && isset($_POST['sub'])) {
 		$un = $_POST['un'];
		$pw = $_POST['pw'];

		$un_qry = "SELECT user_index, username, password FROM tbl_users WHERE username = '$un'";
		$un_res = mysqli_query($conn, $un_qry);

		if (mysqli_num_rows($un_res) == 1){

			$pass_qry = "SELECT * FROM tbl_users WHERE username = '$un' AND password=md5('$pw')";
			$pass_res = mysqli_query($conn, $pass_qry);

			$result = mysqli_query($conn, $pass_qry);
			while($row =  mysqli_fetch_array($result)) {
		    	$_SESSION['un'] = $row['user_index'];
	    	}
	    	header('location: index.php');
		} else {
			header('location: login.php');
			$_SESSION['error'] = 'Not existing username';
		}
 	} else {
		header('location: login.php');
		$_SESSION['error'] = 'Not set';
	}

?>
