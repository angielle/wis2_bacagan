<?php 

	$conn = new mysqli("localhost", 'root', '', 'company');
	session_start();
 	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if (isset($_POST['nameInput']) && $_POST['todo'] == 'getResult') {

		$input = $_POST['nameInput'];

		$qry = "SELECT employees.emp_no as no, concat(first_name, ' ', last_name) as name, dept_name, title, concat('$', format(salary, '##,##')) as salary
				from employees 
		        join current_dept_emp on employees.emp_no=current_dept_emp.emp_no 
		        join departments on current_dept_emp.dept_no=departments.dept_no 
		        join salaries on salaries.emp_no=employees.emp_no 
		        join titles on employees.emp_no=titles.emp_no 
		        join (
					select emp_no, max(to_date) as latest_salary 
					from salaries
					group by emp_no
		        ) saltemp
		        on salaries.emp_no=saltemp.emp_no and salaries.to_date = saltemp.latest_salary 
		        join (
					select emp_no, max(to_date) as latest_title
					from titles
					group by emp_no
		        ) titletemp
		        on titles.emp_no=titletemp.emp_no and titles.to_date = titletemp.latest_title
		        where first_name like '%".$input."%' or last_name like '%".$input."%'
		        group by employees.emp_no 
		        order by employees.emp_no, salaries.to_date desc, titles.to_date desc 
		        limit 5";

		$res = mysqli_query($conn, $qry);

		$data = "<table class='table' border='1' width='100%'><tr><th>Employee</th><th>Department</th><th>Position</th><th>Latest Salary</th></tr>";

		while ($row = mysqli_fetch_assoc($res)) {
			$data = $data."<tr><td>".$row['name']."</td><td>".$row['dept_name']."</td><td>".$row['title']."</td><td>".$row['salary']."</td></tr>";
		}

		$data = $data."</table>";
		echo $data;		
	}
	
?>