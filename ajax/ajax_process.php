<?php
	$conn = mysqli_connect('localhost', 'root', '', 'wis2_bacagan');
	if (isset($_POST['todo']) && $_POST['todo'] == 'getEduc') {

		$qry = 'SELECT educ_level, level_name from tbl_educ_level;';
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['educ_level']."'>".$row['level_name']."</option>";
		}
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getDegree') {

		$EL = $_POST['educlevel'];
		$qry = "SELECT educ_index, ifnull(degree, 'N/A') degree from tbl_education where educ_level=$EL;";
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['educ_index']."'>".$row['degree']."</option>";
		}
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getJob') {

		$EL = $_POST['educlevel'];	
		$qry = "SELECT job_index, job_title from job_list join tbl_education on job_list.educ_index=tbl_education.educ_index join tbl_educ_level on tbl_educ_level.educ_level=tbl_education.educ_level where job_list.educ_index=$EL or tbl_education.educ_level<$EL;";
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['job_index']."'>".$row['job_title']."</option>";
		}
		echo $options;
	} else {
		header('location: index.php');
	}

?>