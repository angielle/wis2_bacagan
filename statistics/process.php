<?php 

	
	if (isset($_POST['dept_no'])) {

		$conn = new mysqli("localhost", 'root', '', 'company');
		session_start();
	 	if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$dept_qry = "SELECT * from departments LIMIT 10;";
		$dept_res = mysqli_query($conn, $dept_qry);
		$dept_arr = array();

		while ($row = mysqli_fetch_array($result)) {
			$no = $row['dept_no'];
			$name = $row['dept_name']

			echo '<option value="'.$row->dept_no.'">'.$row->dept_name.'</option>';
		}
	}
	
	
?>