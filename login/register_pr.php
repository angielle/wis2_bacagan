<?php
	session_start();
	$_SESSION['error'] = '';
	$_SESSION['un'] = '';
	$conn = new mysqli("localhost", 'root', '', 'wis2_bacagan');

	function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
	}		

	if(!$conn) {
 		die ('Error in establishing connection to the server!');
 	} 

 	if (isset($_POST['sub'])) {

 		$un = $_POST['un'];
		$email = $_POST['email'];
		$pw1 = $_POST['pw1'];
		$pw2 = $_POST['pw2'];
		$fn = $_POST['fn'];
		$mn = $_POST['mn'];
		$ln = $_POST['ln'];


		$un_qry = "SELECT * FROM tbl_users WHERE username = '$un'";
		$un_res = mysqli_query($conn, $un_qry);

		if ($un == '' || $email == '' || $pw1 == '' || $pw2 == '' || $fn == '' || $mn == '' || $ln == '') {
			$_SESSION['error'] = 'Error! Missing text fields';
			header('location: register.php');

		} else {

			// Username validation
			if (mysqli_num_rows($un_res) == 1){
				$_SESSION['error'] = 'Error! Username exists';
				header('location: register.php');
			} else {
				// Password validation
				if ($pw1 == $pw2) {		
					$in_users_query = "INSERT INTO tbl_users SET username='$un', password=md5('$pw1')";
					// die($in_users_query);
					mysqli_query($conn, $in_users_query);
					$in_info_query = "INSERT INTO tbl_personal_info SET fname='$fn', mname='$mn', lname='$ln', email='$email'";
					mysqli_query($conn, $in_info_query);
					// die($in_info_query);
					header('location: index.php');
				} else {
					$_SESSION['error'] = 'Error! Password do not match';
					header('location: register.php');				
				}
			}
			
		}

 	} else {
		header('location: register.php');
		$_SESSION['error'] = 'Not set';
	}

?>
