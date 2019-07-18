<?php 
	$conn = new mysqli("localhost", 'root', '', 'company');
	session_start();

 	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if (isset($_POST['todo']) && $_POST['todo'] == 'getDept') {
		$dept_sql = "SELECT * FROM departments;";
		$dept_res = mysqli_query($conn, $dept_sql);
		$options = $options."<option value='all'>All</option>";

		while ($row = mysqli_fetch_assoc($dept_res)) {
			$options = $options."<option value='".$row['dept_no']."'>".$row['dept_name']."</option>";
			
		}
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getTitle') {
		$dept = $_POST['dept'];
		$options = $options."<option value='all'>All</option>";

		if ($dept == "all") {
			$title_sql = "SELECT DISTINCT title FROM titles;";
		} else {
			$title_sql = "SELECT DISTINCT title FROM titles INNER JOIN employees on employees.emp_no=titles.emp_no INNER JOIN dept_emp on dept_emp.emp_no=employees.emp_no WHERE dept_emp.dept_no='".$dept."';";
		}
		
		$title_res = mysqli_query($conn, $title_sql);
		
		while ($row = mysqli_fetch_assoc($title_res)) {
			$options = $options."<option value='".$row['title']."'>".$row['title']."</option>";
			
		}
		echo $options;
	}

	
?>